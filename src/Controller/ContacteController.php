<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContacteController{

    private $contactes = array(

        array("codi" => 1, "nom" => "Salvador Sala",
        "telefon" => "634567891", "email" => "Salvasala@Simarro.org"),
        array("codi" => 2, "nom" => "Francisco paolo",
        "telefon" => "123456789", "email" => "franpaolo@Simarro.org"),
        array("codi" => 3, "nom" => "Sergio maroto",
        "telefon" => "987654321", "email" => "Sermaroto@Simarro.org"),
        array("codi" => 4, "nom" => "Pepe repe",
        "telefon" => "345786215", "email" => "peperepe@Simarro.org"),
    );

    #[Route('/contacte/{codi<\d+>?1}', name:'fitxa_contacte')]
    public function fitxa($codi) {
        
        $resultat = array_filter($this->contactes, function($contacte) use ($codi){
            return $contacte["codi"] == $codi;
        });

        $resposta = "";

        if(count($resultat)>0){
            
            $resultat = array_shift($resultat);
            $resposta .= "<ul><li>" . $resultat["nom"] . "</li>" .
            "<li>" . $resultat["telefon"] . "</li>" . 
            "<li>" . $resultat["email"] . "</li></ul>";
            return new Response("<html> <body>$resposta</body></html>");
        }else{
            return new Response("contacte no trobat");
        }
    }

    #[Route('/contacte/{text}' ,name:'buscar_contacte')]
    public function buscar($text){
        $resultat = array_filter($this->contactes,
        function($contacte) use ($text){
            return strpos($contacte["nom"], $text ) !== FALSE;
        });
        $resposta = "";

        if (count($resultat) > 0) {
            foreach ($resultat as $contacte) {
                $resposta .= "<ul><li>" . $contacte["nom"] . "</li>" .
            "<li>" . $contacte["telefon"] . "</li>" . 
            "<li>" . $contacte["email"] . "</li></ul>";
            return new Response("<html> <body>$resposta</body></html>");
            }
        }else{
            return new Response("contacte no trobat");
        }
    }
    
}
?>