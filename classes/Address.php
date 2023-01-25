<?php

namespace Classes;

class Address
{
    private $rua;
    private $numero;
    private $bairro;

    /**
     * @param $rua
     * @param $numero
     * @param $bairro
     */
    public function __construct($rua, $numero, $bairro = null)
    {
        $this->rua = $rua;
        $this->numero = $numero;
        $this->bairro = $bairro;
    }

    public function __clone(): void
    {
        $this->rua = null;
        $this->numero = null;
        echo "<p class='trigger success'>Clone realizado!</p>";
    }

//    public function __destruct()
//    {
//        var_dump($this);
//        echo "<p class='trigger error'>O Objeto {$this->rua} foi eliminado</p>";
//    }


    /**
     * @return mixed
     */
    public function getRua()
    {
        return $this->rua;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @return mixed
     */
    public function getBairro()
    {
        return $this->bairro;
    }



}