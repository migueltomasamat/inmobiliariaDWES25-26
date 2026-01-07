<?php

namespace App\Faker;

use Faker\Provider\Base;

class InmobiliariaFakesProvider extends Base
{
    /**
     * Create a new class instance.
     */
    public function num_catastral(){
        return $this->generator->regexify('^\d{7}[A-Z]{7}\d{4}[A-Z]{2}$');
    }

    public function email_empleado(string $nombre){
        return $nombre."@inmobilariaDWES.es";
    }

}
