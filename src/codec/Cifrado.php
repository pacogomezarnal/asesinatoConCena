<?php
namespace Geeks\codec;

class Cifrado{
    private $alfabetoBase=null;
    private $alfabetoCesar=null;

    private function crearAlfabeto($desplaza){
        //Alfabeto de la A a la Z
        for ($i=65; $i < 91 ; $i++) { 
            $this->alfabetoBase[]=chr($i);
        }
        //Alfabeto CESAR
        for ($i=65+$desplaza; $i < 91 ; $i++) { 
            $this->alfabetoCesar[]=chr($i);
        }
        for ($i=65; $i < 65+$desplaza ; $i++) { 
            $this->alfabetoCesar[]=chr($i);
        }
    }

    function codifica(){
        $this->crearAlfabeto(3);
    }

    function getAlfabetoOriginal(){
        return $this->alfabetoBase;
    }
    function getAlfabetoCesar(){
        return $this->alfabetoCesar;
    }
}