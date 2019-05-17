<?php
require('cuatrimestralAdivinar.php');

$partida = new Juego;
$jug1=0;
$jug2=0;
for($i=0;$i<15;$i++){
 $tomi = new Principiante;
 $cami = new Principiante;
 $ronda = $partida->jugar($tomi,$cami);
 if('Ganó el jugador 1.'==$ronda)
  $jug1++;
 elseif('Ganó el jugador 2.'==$ronda)
	$jug2++;}

  if ($jug1>$jug2) echo "El jugador que mas rondas gano es el jugador 1 con ". $jug1 ."rondas ganadas";
  if ($jug1<$jug2) echo "El jugador que mas rondas gano es el jugador 2 con ". $jug2 ."rondas ganadas";
  else echo "empataron";
?>
