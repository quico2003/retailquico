<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Service\ServeiDadesSeccio;


class SeccioController extends AbstractController{

    private $dadesSeccions;
    public function __construct(ServeiDadesSeccio $dadesSeccions){
        $this->dadesSeccions = $dadesSeccions;
    }


    #[Route('/seccio1', name: 'dates_seccio1')]
    public function seccio1() {
        return $this->render('dades_seccio.html.twig', array('arraySeccions' => $this->dadesSeccions->get()));
    }

    #[Route('/seccio1/detall/{codi<\d+>?1}', name: 'detall')]
    public function detall(int $codi){

        $longitudArray = count($this->dadesSeccions->get());

        if ($codi >= 0 && $codi <= $longitudArray) {
            $resultat = array_filter($this->dadesSeccions->get(), function($seccio) use ($codi){
                return $seccio["codi"] == $codi;
            });
    
            if (count($resultat)>0) {
                return $this -> render('detall.html.twig', array('seccio' => array_shift($resultat)));
            }
        }else{

            return new Response("<h1>Codigo seccion no encotrado</h1>");

        }
        
        
        
    }

    #[Route('/seccio/{codi<\d+>?1}', name: 'dades_seccio')]
public function seccio($codi)
{
    $resultat = array_filter($this->arraySeccions, function ($seccio) use ($codi) {
        return $seccio["codi"] == $codi;
    });

    if (count($resultat) > 0) {
        $resultat = array_shift($resultat);

        // Formatear los artículos
        $articlesHtml = "<ul>";
        foreach ($resultat["articles"] as $article) {
            $articlesHtml .= "<li>$article</li>";
        }
        $articlesHtml .= "</ul>";

        // Generar la respuesta completa
        $resposta = "<ul>
                        <li><strong>Nombre:</strong> {$resultat["nom"]}</li>
                        <li><strong>Descripción:</strong> {$resultat["descripcio"]}</li>
                        <li><strong>Artículos:</strong> $articlesHtml</li>
                     </ul>";

        return new Response("<html><body>$resposta</body></html>");
    } else {
        return new Response("<html><body>Sección no encontrada</body></html>");
    }
}

}

?>