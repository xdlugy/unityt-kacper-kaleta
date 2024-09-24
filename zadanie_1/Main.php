<?php
// Kacper Kaleta


require_once("Zoo.php");
require_once("Zwierze.php");

require_once("Rosliny.php");
require_once("Roslinozerny.php");

require_once("Mieso.php");
require_once("Miesozerny.php");

require_once("Wszystkozerny.php");

require_once("Futro.php");



class Tygrys extends Zwierze {
    use Miesozerny;
    use Futro;
}

class Slon extends Zwierze {
    use Roslinozerny;
}

class Nosorozec extends Zwierze {
    use Roslinozerny;
}

class Lis extends Zwierze {
    use Wszystkozerny;
    use Futro;
}

class Irbis extends Zwierze {
    use Miesozerny;
    use Futro;
}

class Krolik extends Zwierze {
    use Roslinozerny;
    use Futro;
}

$zoo = new Zoo('zha1', 5, 8);

$tygrys = new Tygrys('Tygrysek','zha1',3,9);

echo $tygrys;

$tygrys->jedzenie(5);
$tygrys->czesanie();


$slon = new Slon('Slonik', 'zha1', 3);
echo $slon;
$slon->jedzenie(2);

// Niedostępne:
// $slon->czesanie();

$lis = new Lis('Lisek', 'zha1', 8, 8);
echo $lis;

// Błąd:
// $lis->jedzenie();

$lis->jedzenieRoslin(1);
$lis->jedzenieMiesa(1);
$lis->czesanie();


die();

?>