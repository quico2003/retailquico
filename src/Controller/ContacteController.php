<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContacteController extends AbstractController{

    private $contactes = array(

        array("codi" => 1, "nom" => "Salvador Sala",
        "telefon" => "634567891", "email" => "Salvasala@Simarro.org"),
        array("codi" => 1, "nom" => "Salvador Sala",
        "telefon" => "634567891", "email" => "Salvasala@Simarro.org"),
        array("codi" => 2, "nom" => "Francisco paolo",
        "telefon" => "123456789", "email" => "franpaolo@Simarro.org"),
        array("codi" => 3, "nom" => "Sergio maroto",
        "telefon" => "987654321", "email" => "Sermaroto@Simarro.org"),
        array("codi" => 4, "nom" => "Pepe repe",
        "telefon" => "345786215", "email" => "peperepe@Simarro.org")
    );

    #[Route('/contacte/{codi<\d+>?1}', name:'fitxa_contacte')]
    public function fitxa($codi) {
        
        $resultat = array_filter($this->contactes, function($contacte) use ($codi){
            return $contacte["codi"] == $codi;
        });

        if(count($resultat)>0){
            return $this->render('fitxa_contacte.html.twig', array('contacte' => array_shift($resultat)));
            
        }else{
            return $this->render('fitxa_contacte.html.twig', array('contacte' => NULL));
        }
    }

    #[Route('/contacte/{text}' ,name:'buscar_contacte')]
    public function buscar($text){
        $resultat = array_filter($this->contactes,
        function($contacte) use ($text){
            return strpos($contacte["nom"], $text ) !== FALSE;
        });
        
        return $this->render('llista_contactes.html.twig', array('contactes' => $resultat));
    }
    
}
?>