<?php
namespace App\Service;

class ServeiDadesSeccio{
    private $arraySeccions = array(
        array("codi" => 1, "nom" => "Roba",
        "descripcio" => "Articles de roba masculina i femenina","imatge" => "kaira/images/logo1.png", "articles" => array("Camisa", "Pantalons", "Jersey", "Jaqueta")),
        array("codi" => 2, "nom" => "Video Consoles",
        "descripcio" => "Consoles de diferents tipus de modalitat","imatge" => "kaira/images/logo2.png", "articles" => array("Ps5", "Ps4", "Wii", "Nintendo")),
        array("codi" => 3, "nom" => "Menjar",
        "descripcio" => "Aliments en general","imatge" => "kaira/images/logo3.png", "articles" => array("Barritas", "Pasta", "Fruta", "Conservas")),
        array("codi" => 4, "nom" => "Calzat",
        "descripcio" => "calzat deportiu i casual","imatge" => "kaira/images/logo4.png", "articles" => array("Nike", "Adidas", "New Balans", "Off-Wite")),
    );

    public function get(){
        return $this->arraySeccions;
    }
}
?>