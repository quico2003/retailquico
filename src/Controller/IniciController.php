<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response as Res;
use Symfony\Component\Routing\Annotation\Route;
class InicioController {

    #[Route('/', name:'inici')]
    public function inici(){
        return new Res("Projecte Gestio Retail de 2n DAW.");
    }

}


?>