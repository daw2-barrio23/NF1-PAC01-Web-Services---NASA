<?php
require("abstract.databoundobject.php");
require("class.pdofactory.php");

class Fireball extends DataBoundObject {

    public $fecha;
    public $energia;
    public $impacte;
    public $latitud;
    public $longitud;

    protected function DefineTableName() {
        return("fireballs");
    }

    protected function DefineRelationMap() {
        return(array(
            "fecha" => "fecha",
            "energia" => "energia",
            "impact_e" => "impacte",
            "latitud" => "latitud",
            "longitud" => "longitud"
        ));
    }

    protected function DefineAutoIncrementField() {
        return(null);
    }

}




$html = file_get_contents("https://ssd-api.jpl.nasa.gov/fireball.api");

$json = json_decode($html);

$strDSN = "pgsql:dbname=uf4;host=localhost;port=5432";
$objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root", array());
$objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


foreach ($json->data as $approach) {
    $fireball = new Fireball($objPDO);
    $fireball->fecha = $approach[0];
    $fireball->energia = $approach[1];
    $fireball->impacte = $approach[2];
    $fireball->latitud = $approach[3];
    $fireball->longitud = $approach[5];


    
    echo $fireball->fecha . "<br>";
    echo $fireball->energia . "<br>";
    echo $fireball->impacte . "<br>";
    echo $fireball->latitud . "<br>";
    echo $fireball->longitud . "<br>";
    echo "<br>";

   $fireball->setfecha($fireball->fecha)->setenergia($fireball->energia)->setimpacte($fireball->impacte)->setlatitud($fireball->latitud)->setlongitud($fireball->longitud);
   $fireball->save();


    
}

echo "Se han guardado los datos de la api correctamente";

?>