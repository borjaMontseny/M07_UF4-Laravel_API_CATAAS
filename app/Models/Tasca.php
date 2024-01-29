<?php

namespace App\Models;

use Illuminate\Support\Facades\Date;

class Tasca
{
    private String $titol;
    private String $descripcio;
    private String $dataLimit;
    private String $estat;

    public function __construct(
        String $titol,
        String $descripcio,
        String $dataLimit
    ) {
        $this->titol = $titol;
        $this->descripcio = $descripcio;
        $this->dataLimit = $dataLimit;
        $this->estat = "Pendent";
    }

    public function getTitol(): String
    {
        return $this->titol;
    }
    public function getDescriptio(): String
    {
        return $this->descripcio;
    }
    public function getDataLimit(): String
    {
        return $this->dataLimit;
    }
    public function getEstat(): String
    {
        return $this->estat;
    }
    public function setEstat(String $estat)
    {
        $this->estat = $estat;
    }

    public function __toString(): String
    {
        return "Tasca: " . $this->titol .
            " Descripció: " . $this->descripcio .
            " Data límit: " . $this->dataLimit .
            " Estat: " . $this->estat;
    }
}
