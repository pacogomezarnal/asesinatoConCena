<?php
namespace Geeks\codec;

class Cifrado{
    private $alfabetoBase=null;
    private $alfabetoCesar=null;

    private function crearAlfabeto($desplaza){
        for ($i=65; $i < 91 ; $i++) { 
            $this->alfabetoBase[]=chr($i);
        }
    }

    function codifica(){
        $this->crearAlfabeto(3);
    }

    function getAlfabetoOriginal(){
        return $this->alfabetoBase;
    }
}