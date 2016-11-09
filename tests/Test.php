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
	
 public function testnMedio() {
	$bondi= new Colectivos("144");
	$tarje= new Tarjetas("estudiante", "Medio boleto");
	$tarje->recargar(272);
	$tarje->pagar($bondi,"18.52","lunes","15/09/2016");
	$this->assertEquals($tarje->saldo(), 316, "Cuando cargo 272 deberia tener finalmente 320 y paga 4 de pasaje");
	 /*$this->assertEquals($tarje->boleto->darmonto(), 4,"Paga 4 de pasaje");*/


}
	public function testColectivo() {	
   	$tarje= new Tarjetas("estudiante", "Medio");
	$tarje->recargar(288);
	$bondi= new Colectivos("144");
	$tarje->pagar($bondi,"18.52","martes","15/09/2016");  
	$this->assertEquals($tarje->boleto->dartransporte(),"144", "Utiliza el colectivo 144");
	$this->assertEquals($tarje->boleto->darhora(),"18.52", "Lo uso a las 18.52");
	$this->assertEquals($tarje->boleto->darmonto(),"4", "Pago un monto de 4 pesos");
	$this->assertEquals($tarje->boleto->darfecha(),"martes", "Utiliza el colectivo el dia martes");
	$this->assertEquals($tarje->boleto->darsaldo(),284, "la tarjeta tiene un saldo de 284");
	$this->assertEquals($tarje->boleto->dartipoviaje(),"Medio", "el viaje es del tipo estudiante");
   }
}
