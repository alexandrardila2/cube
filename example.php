<?php

while($line = fgets($_fp)) {
   $l .= $line;
}


$cp = new Process($l);
$cp->start();

$pp = new Print2();
$pp->show($cp->a);

?>