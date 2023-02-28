<?php

namespace app\models;

class Cuenta_opciones
{
    public $name;
    
    public function __construct($name)
    {
        $this->name = $name;
    }
    
    public function getName()
    {
        return $this->name;
    }
}
?>