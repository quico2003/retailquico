<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Psr\Log\LoggerInterface;
use App\Service\ServeiDadesSeccio;
class IniciController extends AbstractController{

    private $logger;
    private $dadesSeccions;
   

    public function __construct(LoggerInterface $logger,ServeiDadesSeccio $dadesSeccions) {
        $this->logger = $logger;
        $this->dadesSeccions = $dadesSeccions;
    }

    #[Route('/', name: 'inici')]
    public function inici() {
        $data_hora = new \DateTime();
        $this->logger->info("Acces el " . $data_hora->format("d/m/y H:i:s"));
        return $this->render('base.html.twig');
    }   


    #[Route('/inici', name:'inici1')]
    public function SeccionInici(){
        return $this->render('inici.html.twig', array('arraySeccions' => $this->dadesSeccions-> get()));
    }

}


?>