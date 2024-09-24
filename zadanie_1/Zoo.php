<?php
// Kacper Kaleta


$lista_zoo = array();

class Zoo {
    private string $zoo_code = '';
    private int $rosliny;
    private int $mieso;
    private array $zwierzeta;

    public object $zoo;


    private function setZooCode($zoo_code) {
        if(empty($zoo_code)) {
            throw new Exception("Kod zoo nie może być pusty.");
        }
        $this->zoo_code = $zoo_code;
    }

    function getZooCode() {
        return $this->zoo_code;
    }


    private function setRosliny($ilosc) {
        if($ilosc<0) {
            throw new Exception('Ilość roślin nie może być mniejsza niż 0.');
        }
        $this->rosliny = $ilosc;
    }

    function getRosliny() {
        return $this->rosliny;
    }

    function dostawaRoslin($ilosc) {
        if($ilosc<1){
            throw new Exception('Ilość nie może być mniejsza od 1.');
        }
        $this->rosliny+=$ilosc;
    }

    function zmniejszRosliny($ilosc) {
        if($ilosc<1) {
            throw new Exception("Ilość mięsa nie może być mniejsza od 0.");
        }
        $this->rosliny -= $ilosc;
    }
    

    private function setMieso($ilosc) {
        if($ilosc<0) {
            throw new Exception('Ilość mięsa nie może być mniejsza niż 0.');
        }
        $this->mieso = $ilosc;
    }

    function getMieso() {
        return $this->mieso;
    }

    function dostawaMiesa($ilosc) {
        if($ilosc<1){
            throw new Exception('Ilość nie może być mniejsza od 1.');
        }
        $this->mieso+=$ilosc;
    }

    function zmniejszMieso($ilosc) {
        if($ilosc<1) {
            throw new Exception("Ilość mięsa nie może być mniejsza od 0.");
        }
        $this->mieso -= $ilosc;
    }


    function __construct($zoo_code, $rosliny, $mieso)
    {
        global $lista_zoo;

        $this->setZooCode($zoo_code);
        $this->setRosliny($rosliny);
        $this->setMieso($mieso);

        array_push($lista_zoo, $this);
    }


    function dodajZwierze($zwierze) {
        if($zwierze instanceof Zwierze) {
            if($zwierze->getZooCode()==$this->getZooCode()) {
                array_push($this->zwierzeta, $zwierze);
            }
            else {
                throw new Exception("Zwierzę nie należy do tego Zoo.");
            }
        }
        else {
            throw new Exception("Podany argument nie jest Zwierzęciem.");
        }
    }
}

?>