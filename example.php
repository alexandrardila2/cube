<?php

while($line = fgets($_fp)) {
   $l .= $line;
}

$cp = new Process($l);
$cp->start();
$cp->s->print2();

?>