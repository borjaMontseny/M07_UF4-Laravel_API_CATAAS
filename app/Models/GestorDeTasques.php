<?php

namespace App\Models;

use Illuminate\Support\Facades\Date;
use Exception;

/**
 * 
 */
class GestorDeTasques
{
    private array $tasques;

    public function __construct()
    {
        $this->tasques = [];
    }

    /** 
     * 
     * @param String $titol
     * @param String $descripcio
     * @param String $dataLimit
     */
    public function afegirTasca(
        String $titol,
        String $descripcio,
        String $dataLimit
    ) {
        $tasca = new Tasca($titol, $descripcio, $dataLimit);
        $this->tasques[] = $tasca;
    }

    /**
     * Elimina una tasca del gestor de tasques, si aquesta tasca no existeix llança una excepció
     * @param String $titol El titol no es case sensitive
     * @throws TascaNotExistException si no existeix cap tasca amb el títol especificat
     * @return void
     */
    public function eliminarTasca(String $titol)
    {

        $isDeleted = false;
        foreach ($this->tasques as $key => $tasca) {
            if (strtolower($tasca->getTitol()) == strtolower($titol)) {
                unset($this->tasques[$key]);
                $isDeleted = true;
            }
        }
        if (!$isDeleted)
            throw new TascaNotExistException("No existeix cap tasca amb aquest títol");
    }

    public function actualitzarEstatTasca(String $titol, String $estat)
    {
        foreach ($this->tasques as $tasca) {
            if ($tasca->getTitol() == $titol)
                $tasca->setEstat($estat);
        }
    }

    public function llistarTasques(): array
    {
        return $this->tasques;
    }
}

class TascaNotExistException extends Exception
{
    public function __construct($message)
    {
        parent::__construct($message);
    }
}
