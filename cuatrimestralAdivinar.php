<?php
interface Adivinador {
 public function sugerirNumeroSecreto();
 public function elNumeroEraMayor();
 public function elNumeroEraMenor();
}


class Principiante implements Adivinador {
 protected $minimo = 1;
 protected $maximo = 1000;
 protected $sugerencia = 0;
 public function sugerirNumeroSecreto() {
 $this->sugerencia = (int)rand($this->minimo, $this->maximo);
 return $this->sugerencia;
 }
 public function elNumeroEraMayor() {
 $this->minimo = $this->sugerencia;
 }
 public function elNumeroEraMenor() {
 $this->maximo = $this->sugerencia;
 }
}


class Juego {
 protected $ganador = '';
 protected $rondas = 0;
 public function jugar(Adivinador $jugador1, Adivinador $jugador2) {
 $this->rondas = 0;
 $this->ganador = '';
 $numSecreto = rand(1, 1000);
 while ($this->ganador == '') {
 $num1 = $jugador1->sugerirNumeroSecreto();
 $num2 = $jugador2->sugerirNumeroSecreto();
 if ($this->hayGanador($numSecreto, $num1, $num2) == false) {
 $this->informarDesvio($jugador1, $num1, $numSecreto);
 $this->informarDesvio($jugador2, $num2, $numSecreto);
 }
 $this->rondas++;
 }
 return $this->ganador;
 }
 protected function hayGanador($numSecreto, $num1, $num2) {
 if ($num1 == $numSecreto || $num2 == $numSecreto) {
 if ($num1 == $num2) {
 return $this->ganador = 'Ambos jugadores empataron.';
 }
 elseif ($num1 == $numSecreto) {
 return $this->ganador = 'Ganó el jugador 1.';
 }
 else {
 return $this->ganador = 'Ganó el jugador 2.';
 }
 return true; // Alguno de los jugadores acertó, devolvemos true.
 }
 return false; // Ningún jugador acertó, devolvemos false.
 }
 public function informarDesvio(Adivinador $jugador, $num, $numSecreto){
	if($num>$numSecreto){
	 $jugador->elNumeroEraMenor();
	}
	else{
	 $jugador->elNumeroEraMayor();
	}
 }
}
