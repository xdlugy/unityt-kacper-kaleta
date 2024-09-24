<?php
// Kacper Kaleta


require_once("Zoo.php");

class Zwierze {
    protected string $imie;
    protected string $zoo_code = '';
    protected int $sytosc;

    function getZoo() {
        global $lista_zoo;

        $zoo_code = $this->getZooCode();
        $zoo = array_filter($lista_zoo, function($object) use ($zoo_code) {
                return $object->getZooCode() === $this->getZooCode();
        });

        return $zoo[0];
    }

    function setImie($imie) {
        if(strlen($imie)===0) {
            throw new Exception('Imię nie może być puste.');
        }
        $this->imie = $imie;
    }

    function getImie() {
        return $this->imie;
    }


    function getZooCode() {
        return $this->zoo_code;
    }

    protected function setZooCode($zoo_code) {
        global $lista_zoo;

        if(empty($zoo_code)) {
            throw new Exception("Kod zoo nie może być pusty.");
        }

        $found_zoo = array_filter($lista_zoo, function($object) use ($zoo_code) {
            return $object->getZooCode() === $zoo_code;
        });

        if(empty($found_zoo)) {
            throw new Exception('Nie można przypisać zwierzęcia do brakującego Zoo.');
        }

        $this->zoo_code = $zoo_code;
    }


    function setSytosc($sytosc) {
        if($sytosc<1) {
            throw new Exception('Sytość nie może wynosić mniej niż 1.');
        }
        $this->sytosc = $sytosc;
    }

    function getSytosc() {
        return $this->sytosc;
    }


    function __construct($imie, $zoo_code, $sytosc)
    {
        $this->setImie($imie);
        $this->setZooCode($zoo_code);
        $this->setSytosc($sytosc);
    }

    function __toString()
    {
        return get_class($this)." ".$this->getImie()."\n";
    }

    private function iloscError() {
        throw new Exception('Ilość nie może być mniejsza niż 0.');
    }
}

?>