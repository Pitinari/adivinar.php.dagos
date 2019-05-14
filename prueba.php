<?php
require('cuatrimestralAdivinar.php');

$partida = new Juego;

for($i=0;$i<15;$i++){
 $tomi = new Principiante;
 $cami = new Principiante;
 $odioTodo = $partida->jugar($tomi,$cami);
 if(strpos('Ganó el jugador 1.',$odioTodo)>0)
	echo "gano el jug 1\n";
 if(strpos('Ganó el jugador 2.',$odioTodo)>0)
	echo "gano el jug 2\n";
 else
	echo "empataron\n";}
?>
