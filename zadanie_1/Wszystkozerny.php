<?php
// Kacper Kaleta


require_once("Rosliny.php");
require_once("Mieso.php");

trait Wszystkozerny {
    use Rosliny, Mieso;

    function jedzenie() {
        throw new Exception("Należy wskazać typ jedzenia.");
    }

    function jedzenieRoslin($ilosc) {
        $this->sytosc+=$ilosc;
        echo $this->imie." najadł się do poziomu ".$this->sytosc."\n";
        $this->zmniejszRosliny($ilosc);
    }

    function jedzenieMiesa($ilosc) {
        $this->sytosc+=$ilosc;
        echo $this->imie." najadł się do poziomu ".$this->sytosc."\n";
        $this->zmniejszMieso($ilosc);
    }
}

?>