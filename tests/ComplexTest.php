<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ComplexTest extends TestCase {

    public function testComplexIndex() {
        $this->visit('/jk-sofiya')
            ->see('ЖК София');
    }

    public function testComplexHouse() {

    }
}
