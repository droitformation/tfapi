<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HelperTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testValidateAndTransformDateTest()
    {
        $fetch  = new \App\Droit\Bger\Utility\Fetch();
        $date   = '161021';
        $expect = '2016-10-21';

        $this->assertSame($expect,$fetch->validateAndTransformDate($date));
    }
}
