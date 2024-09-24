<?php
// Kacper Kaleta


require_once("Zoo.php");
require_once("Zwierze.php");

trait Rosliny {
    private function roslinyMagazynError() {
        throw new Exception('W magazynie nie ma wystarczającej ilości roślin.');

    }
    
    private function zmniejszRosliny($ilosc) {
        if($ilosc<0) {
            $this->iloscError();
        }
    
        if($this->getZoo()->getRosliny()<$ilosc) {
            $this->roslinyMagazynError();
        }
    
        $this->getZoo()->zmniejszRosliny($ilosc);
        echo "Ilość roślin: ".$this->getZoo()->getRosliny()."\n";
    }

    function jedzenie($ilosc) {
        $this->sytosc+=$ilosc;
        echo $this->imie." najadł się do poziomu ".$this->sytosc."\n";
        $this->zmniejszRosliny($ilosc);
    }
}

?>