<?php

namespace Tests\Unit;

use App\Models\GestorDeTasques;
use App\Models\Tasca;
use PHPUnit\Framework\TestCase;
use Exception;

class GestorDeTasquesTest extends TestCase
{
    public function test_construct_gestorDeTasques()
    {
        $gestorDeTasques = new GestorDeTasques();
        $this->assertEquals([], $gestorDeTasques->llistarTasques());
        $this->assertEmpty($gestorDeTasques->llistarTasques());
    }
    public function test_llitat_not_empty_gestorDeTasques()
    {
        $gestorDeTasques = new GestorDeTasques();
        $gestorDeTasques->afegirTasca("Tasca1", "Descripció", "2021-01-01");
        $this->assertNotEquals([], $gestorDeTasques->llistarTasques());
        $this->assertNotEmpty($gestorDeTasques->llistarTasques());
    }
    public function test_validar_afegirTasca_gestorDeTasques()
    {
        $gestorDeTasques = new GestorDeTasques();
        $gestorDeTasques->afegirTasca("Tasca1", "Descripció", "2021-01-01");
        $this->assertEquals(1, count($gestorDeTasques->llistarTasques()));

        $array = [];
        $array[] = new Tasca("Tasca1", "Descripció", "2021-01-01");
        $this->assertEquals($array, $gestorDeTasques->llistarTasques());
    }

    public function test_eliminarTasca_noKeySensitive_gestorDeTasques(){
        $gestorDeTasques = new GestorDeTasques();
        $gestorDeTasques->afegirTasca("Tasca1", "Descripció", "2021-01-01");
        $gestorDeTasques->afegirTasca("TASCA2", "Descripció", "2021-01-01");
    
        $this->assertEquals(2, count($gestorDeTasques->llistarTasques()));
        $gestorDeTasques->eliminarTasca("tasca2");
        $this->assertEquals(1, count($gestorDeTasques->llistarTasques()));
    }

    public function test_eliminarTasca_notExist_gestorDeTasques(){
        $gestorDeTasques = new GestorDeTasques();
        $gestorDeTasques->afegirTasca("Tasca1", "Descripció", "2021-01-01");
        $gestorDeTasques->afegirTasca("Tasca2", "Descripció", "2021-01-01");
    
        $this->assertEquals(2, count($gestorDeTasques->llistarTasques()));
        try{
            $gestorDeTasques->eliminarTasca("Tasca3");
            $this->fail("No ha saltat l'excepció");
        }catch(Exception $e){
            $this->assertEquals("No existeix cap tasca amb aquest títol", $e->getMessage());
        }
    }
    public function test_actualitzarEstat_gestorDeTasques(){
        $gestorDeTasques = new GestorDeTasques();
        $gestorDeTasques->afegirTasca("Tasca1", "Descripció", "2021-01-01");
        $gestorDeTasques->afegirTasca("Tasca2", "Descripció", "2021-01-01");
    
        $this->assertEquals(2, count($gestorDeTasques->llistarTasques()));
        $gestorDeTasques->actualitzarEstatTasca("Tasca1", "Completada");
        $this->assertEquals("Completada", $gestorDeTasques->llistarTasques()[0]->getEstat());
        $this->assertEquals("Pendent", $gestorDeTasques->llistarTasques()[1]->getEstat());

    }
    public function test_actualitzarEstat_tascaNoExisteix_gestorDeTasques(){
        $gestorDeTasques = new GestorDeTasques();
        $gestorDeTasques->afegirTasca("Tasca1", "Descripció", "2021-01-01");
        $gestorDeTasques->afegirTasca("Tasca2", "Descripció", "2021-01-01");
    
        $this->assertEquals(2, count($gestorDeTasques->llistarTasques()));
        $gestorDeTasques->actualitzarEstatTasca("Tasca3", "Completada");
        $this->assertEquals("Pendent", $gestorDeTasques->llistarTasques()[0]->getEstat());
        $this->assertEquals("Pendent", $gestorDeTasques->llistarTasques()[1]->getEstat());
    }
}