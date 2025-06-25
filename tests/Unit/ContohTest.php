<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ContohTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    /** @test */
    public function penjumlahan_bekerja_dengan_benar()
    {
        $hasil = 2 + 3;
        $this->assertEquals(5, $hasil);
    }
}
