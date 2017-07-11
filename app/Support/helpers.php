<?php

/**
 * Created by PhpStorm.
 * User: cindyleschaud
 * Date: 11.07.17
 * Time: 11:23
 */

function dateIsValid($date,$format)
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
}