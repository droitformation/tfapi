<?php

namespace App\Droit\Bger\Utility;

use Goutte\Client;

class Fetch {

    protected $clean;
	protected $html;
	protected $urlList;
    protected $url;
    protected $keys;
    protected $dispatch;

	function __construct() 
    {
	    $this->clean    = new \App\Droit\Bger\Utility\Clean();
        $this->dispatch = new \App\Droit\Bger\Utility\Dispatch();

		$this->html  = new Client();

        //  Hackery to allow HTTPS
        $guzzleclient = new \GuzzleHttp\Client([
            'timeout' => 60,
            'verify' => false,
        ]);

        // Hackery to allow HTTPS
        $this->html->setClient($guzzleclient);

        $this->keys     = collect(['numero','categorie','subcategorie','publication_at','decision_at']);
		$this->urlList  = 'http://relevancy.bger.ch/AZA/liste/fr/';
        $this->url      = 'http://relevancy.bger.ch/php/aza/http/index.php?lang=fr&zoom=&type=show_document&highlight_docid=aza%3A%2F%2F';
	}

    /* ========================================
       GRAB LIST FROM TF WEBSITE
    ==========================================*/
	public function getList()
    {
        $crawler = $this->html->request('GET', $this->urlList);

        $content = $crawler->filter('a')->each(function ($node) {
            $value = str_replace('.htm', '', $node->attr('href'));
            $date  = strlen($value) ? \Carbon\Carbon::createFromFormat('ymd', $value)->toDateString() : null;
            return isset($date) ? $date : false;
        });

        return collect($content);
	}

    public function makeUrl($date,$numero)
    {
        $date   = $this->clean->convertDate($date, 'Y-m-d', 'd-m-Y');
        $numero = str_replace('/','-', $numero);

        return $this->url.$date.'-'.$numero;
    }

	/* ========================================
	   GRAB ARRET FROM TF WEBSITE
	==========================================*/
    
	public function getArret($data)
	{
        $url = $this->makeUrl($data['decision_at'],$data['numero']);

        $crawler = $this->html->request('GET', $url);

        // Get title of page
        $content['title'] = $crawler->filter('title')->each(function ($node) {
            return $node->text();
        });

        // Get the content
        $content['content'] = $crawler->filter('div[class=content]')->each(function ($node) {
            return $this->clean->cleanText($node->html(), $repto = NULL);
        });

        if(!empty($content['content'])) {
            // delete http://relevancy.bger.ch comment
            if(isset($content['content'][1])) unset($content['content'][1]);
            $content['content'] = isset($content['content'][0]) ? $content['content'][0] : '';
        }

        if(!empty($content['title'])) {
            $content['title'] = isset($content['title'][0]) ? '<h1>'.$content['title'][0].'</h1>' : '';
        }

        return $content;
	}

    /**
     * Decision array
     *
     * [numero] => 2C_348/2015
     * [categorie] => Energie *
     * [subcategorie] => Verzugszinsen auf der Rückerstattung für in den Jahren 2009 und 2010 geleistete SDL-Akontozahlungen
     * [publication_at] => 2016-10-20
     * [decision_at] => 2016-05-23
     * 
     * @param  array
     * @return array
     */
    public function prepareArret($decision)
    {
        $arret = $this->getArret($decision);
        $url   = $this->makeUrl($decision['decision_at'],$decision['numero']);

        $categorie = $this->clean->cleanString($decision['categorie']);

        $publish   = $this->dispatch->isPublication($decision['categorie']);
        $language  = $this->dispatch->isLangugage($categorie);
        $categorie = $this->dispatch->findCategory($categorie);

        $arret = [
            'publication_at' => isset($decision['publication_at']) ? $decision['publication_at'] : '',
            'decision_at'    => isset($decision['decision_at']) ? $decision['decision_at'] : '',
            'categorie_id'   => $categorie->id,
            'remarque'       => isset($decision['subcategorie']) ? $decision['subcategorie'] : '',
            'link'           => $url,
            'numero'         => isset($decision['numero']) ? $decision['numero'] : '',
            'texte'          => $arret['title'].$arret['content'],
            'langue'         => $language,
            'publish'        => $publish,
            'updated'        => null
        ];

       return $arret;
    }
    
 	public function getListDecisions($date)
    {
        // Get html from page
        $crawler = $this->html->request('GET', $this->urlList.$date.'.htm');

        // Parse table get each td inner text
        $content = $crawler->filter('TABLE')->each(function ($node) {
            return $node->filter('TR')->each(function ($node) {
                return $node->filter('TD')->each(function ($child) {
                    return $child->text();
                });
            });
        });

        // Get only second not empty table array
        if(isset($content[1]) && !empty($content[1])){

            $data = array_filter($content[1]);

            // make sure the number of arrays are even
            if((count($data) % 2) != 0){
                throw new \App\Exceptions\ProblemFetchException('Un even number of array from date tables: Fetch.php, line 152. Date: '.$date.'');
            }

            $content = collect($data)
                ->chunk(2) // take array two by two
                ->map(function ($values){
                    return $values->map(function ($items) {
                        return collect($items)->map(function ($item, $key) {
                            return $this->clean->removeWhitespace($item);
                        })->reject(function ($item, $key) {
                            return empty($item);
                        });
                    })->flatten(); // clean everything and remove empty
                })->map(function ($values) use ($date) {

                    $values = $values->splice(0,4);

                    // be sure to have 4 items  in case there is no subcategorie
                    if($values->count() != 4) $values->push('-');

                    $publication_at = $this->validateAndTransformDate($date,'ymd');
                    $decision_at    = $this->validateAndTransformDate($values->shift(),'d.m.Y');

                    // add decision date
                    $values->push($publication_at);
                    $values->push($decision_at);

                    return $this->keys->combine($values)->toArray();

                })->reject(function($arret){
                    // Reject if dates are not valid dates
                    $result = !dateIsValid($arret['publication_at'],'Y-m-d') || !dateIsValid($arret['decision_at'],'Y-m-d');

                    // Log if any date is invalid
                    if($result){ \Log::info('Arret fetched with invalid date '.$arret['numero']);  }

                    return $result;
                });

            return $content;
        }

        return false;
	}

    public function validateAndTransformDate($date,$format)
    {
        return dateIsValid($date,$format) ? $this->clean->convertDate($date, $format, 'Y-m-d') : null;
	}

}