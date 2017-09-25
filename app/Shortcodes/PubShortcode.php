<?php
use \Corcel\Shortcode;

class PubShortcode implements \Corcel\Shortcode
{
    /**
     * @param ShortcodeInterface $shortcode
     * @return string
     */
    public function render(ShortcodeInterface $shortcode)
    {
        return sprintf(
            'html-for-shortcode-%s-%s',
            $shortcode->getName(),
            $shortcode->getParameter('one')
        );
    }
}