<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Tasca;
use Illuminate\Support\Facades\Date;

class TascaTest extends TestCase
{
    public function test_contractor_de_tasca()
    {
        $tasca = new Tasca("Tasca1", "Descripció de la tasca 1", date("2021-01-01"));
        $this->assertEquals("Tasca1", $tasca->getTitol());
        $this->assertEquals("Descripció de la tasca 1", $tasca->getDescriptio());

        $this->assertEquals("Pendent", $tasca->getEstat());
        $this->assertTrue($tasca->getEstat() == "Pendent");
    }
    public function test_canviarEstat_tasca()
    {
        $tasca = new Tasca("Tasca1", "Descripció de la tasca 1", date("2021-01-01"));
        $this->assertEquals("Pendent", $tasca->getEstat());
        $tasca->setEstat("Completada");
        $this->assertEquals("Completada", $tasca->getEstat());
    }

    public function test_toString_tasca()
    {
        $tasca = new Tasca("Tasca1", "Descripció de la tasca 1", date("2021-01-01"));
        $this->assertEquals("Tasca: Tasca1 Descripció: Descripció de la tasca 1 Data límit: 2021-01-01 Estat: Pendent", $tasca->__toString());
    }
}
