<?php


namespace Poli\Tarjeta;

use PHPUnit\Framework\TestCase;

class TarjetaTest extends TestCase {

  public function testCargaSaldo() {
    $tarjeta = new Tarjetas("estudiante", "Medio boleto");
    $tarjeta->recargar(272);
    $this->assertEquals($tarjeta->saldo(), 320, "Cuando cargo 272 deberia tener finalmente 320");
  }


  public function testPagarViaje() {
	$bondi= new Colectivos("144");
	$tarje= new Tarjetas("estudiante", "Medio boleto");
	$tarje->recargar(272);
	$tarje->pagar($bondi,"18.52","15/09/2016");
	$this->assertEquals($tarje->saldo(), (320-4), "Cuando cargo 272 deberia tener finalmente 320 y paga 4 de pasaje");

  }

  public function testPagarViajeSinSaldo() {
	  $bondi= new Colectivos("122");
	  $tar = new Tarjetas ("estudiante", "Medio boleto");
	  $tar->pagar($bondi,"0.00","4/11/2016");
	  $tar->assertEquals($tar->saldo(),"Pierde 1 plus");

  }

  public function testTransbordo() {

  }

  public function testNoTransbordo() {

  }

}
