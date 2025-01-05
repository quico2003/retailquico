<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SeccioController {

    private $arraySeccions = array(
        array("codi" => 1, "nom" => "Roba",
        "descripcio" => "Articles de roba masculina i femenina", "articles" => array("Camisa", "Pantalons", "Jersey", "Jaqueta")),
        array("codi" => 2, "nom" => "Video Consoles",
        "descripcio" => "Consoles de diferents tipus de modalitat", "articles" => array("Ps5", "Ps4", "Wii", "Nintendo")),
        array("codi" => 3, "nom" => "Menjar",
        "descripcio" => "Aliments en general", "articles" => array("Barritas", "Pasta", "Fruta", "Conservas")),
        array("codi" => 4, "nom" => "Calzat",
        "descripcio" => "calzat deportiu i casual", "articles" => array("Nike", "Adidas", "New Balans", "Off-Wite")),
    );

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