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

    private function codificaCesar($nombre){
        $nombreCodificado="";
        //Recorro todo el string
        for ($i=0; $i < strlen($nombre) ; $i++) { 
            $letra=substr($nombre, $i, 1);
            $pos = array_search($letra, $this->alfabetoBase);
            $nombreCodificado=$nombreCodificado.$this->alfabetoCesar[$pos];
        }
        return $nombreCodificado;
    }

    function codifica($nombre){
        $this->crearAlfabeto(3);
        $nombreCodificado=$this->codificaCesar(strtoupper($nombre));
    }

    function getAlfabetoOriginal(){
        return $this->alfabetoBase;
    }
    function getAlfabetoCesar(){
        return $this->alfabetoCesar;
    }
}