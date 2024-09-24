<?php
// Kacper Kaleta


require_once("Zwierze.php");

trait Futro {
    protected int $prezentacja;

    function setPrezentacja($prezentacja) {
        if($prezentacja<1 || $prezentacja>10) {
            throw new Exception('Niepoprawna prezentacja z przedziału innego niż 1-10.');
        }
        $this->prezentacja = $prezentacja;
    }

    function getPrezentacja() {
        return $this->prezentacja;
    }

    function __construct($imie, $zoo_code, $sytosc, $prezentacja)
    {
        $this->setImie($imie);
        $this->setZooCode($zoo_code);
        $this->setSytosc($sytosc);
        $this->setPrezentacja($prezentacja);
    }

    function czesanie() {
        if($this->getPrezentacja()==10) {
            echo "Prezentacja jest na poziomie 10! \n";
            return;
        }
        $this->setPrezentacja($this->getPrezentacja()+1);
        echo "Pora na czesanie! Prezentacja wzrosła do ".$this->prezentacja."\n";
    }
}

?>