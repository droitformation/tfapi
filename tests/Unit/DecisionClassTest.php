<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Goutte\Client;

class DecisionClassTest extends TestCase
{

    public function testMakeUrlToArret()
    {
        $decision = new \App\Droit\Bger\Utility\Decision();

        $decision->setDecision(['decision_at'=> '2016-09-15', 'numero' => '5A_1016/2015']);

        $result = $decision->makeUrl();
        $expect = 'http://relevancy.bger.ch/php/aza/http/index.php?highlight_docid=aza://aza://15-09-2016-5A_1016-2015&lang=fr&zoom=&type=show_document';

        $this->assertSame($expect,$result);
    }
}
