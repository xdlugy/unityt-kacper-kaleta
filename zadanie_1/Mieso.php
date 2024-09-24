<?php
// Kacper Kaleta


require_once("Zoo.php");
require_once("Zwierze.php");

trait Mieso {
    private function miesoMagazynError() {
        throw new Exception('W magazynie nie ma wystarczającej ilości mięsa.');
    }

    private function zmniejszMieso($ilosc) {
    
        if($ilosc<0) {
            $this->iloscError();
        }
    
        if($this->getZoo()->getMieso()<$ilosc) {
            $this->miesoMagazynError();
        }
    
        $this->getZoo()->zmniejszMieso($ilosc);
        echo "Ilość mięsa: ".$this->getZoo()->getMieso()."\n";
    }

    function jedzenie($ilosc) {
        $this->sytosc+=$ilosc;
        echo $this->imie." najadł się do poziomu ".$this->sytosc."\n";
        $this->zmniejszMieso($ilosc);
    }
}

?>