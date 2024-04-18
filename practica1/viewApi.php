<html>
    <style>
        table{
            border: 1px solid black;
        }
        thead{
            background-color:#FF0;
        }
        td{
            border: 1px solid black;
            background-color: #FFFFFF; 
        }
        *{
            margin-left: auto;
            margin-right: auto;
        }
        

    </style>
</html>



<?php


$conexion = pg_connect("host=localhost dbname=uf4 user=postgres password=root");
$query="SELECT * FROM fireballs";
$resultado=pg_query($conexion,$query);


echo "<table>";
echo "<thead>";
echo "<tr>";
        echo "<th>Fecha</th>";
        echo "<th>Energia</th>";
        echo "<th>Impact_E</th>";
        echo "<th>Latitud</th>";
        echo "<th>Longitud</th>";
echo "<tr>";
echo "</thead>";
while($obj=pg_fetch_object($resultado)){
    echo "<tr>";
        echo "<td>$obj->fecha</td>";
        echo "<td>$obj->energia</td>";
        echo "<td>$obj->impact_e</td>";
        echo "<td>$obj->latitud</td>";
        echo "<td>$obj->longitud</td>";

}










?>