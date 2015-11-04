<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="">
    <?php
    header("Content-Type: application/vnd.ms-excel");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("content-disposition: attachment;filename=bd_autos_remate.xls");

    set_time_limit(0);
    
    $url = 'http://resource.t13.cl/extra/consulta-patente/json/%s.json';
    $letras = str_split('BCDFGHJKLMNPQRSTVWXYZ');
    $letras_old = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ');
    $numeros = str_split('0123456789');

echo "</head>";
echo "<body>";
    echo "<table>";
        echo "<thead>";
            echo "<th>PATENTE</th>";
            echo "<th>MARCA</th>";
            echo "<th>MODELO</th>";
            echo "<th>COLOR</th>";
            echo "<th>FECHA REMATE</th>";
        echo "</thead>";

        //Patentes dos letras y cuatro numeros.
        foreach ($letras_old as $a1) {
            foreach ($letras_old as $a2) {
                foreach ($numeros as $a3) {
                    foreach ($numeros as $a4) {
                        foreach ($numeros as $n1) {
                            foreach ($numeros as $n2) {

                                $patente = $a1.$a2.$a3.$a4.$n1.$n2;

                                $response = @file_get_contents(
                                    sprintf($url, $patente)
                                );

                                if ($response) {

                                    $response = json_decode($response);
                                    
                                    echo "<tbody>";
                                    echo "<tr>";
                                        echo "<td>{$response->{'Patente'}}</td>";
                                        echo "<td>{$response->{'Marca'}}</td>";
                                        echo "<td>{$response->{'Modelo'}}</td>";
                                        echo "<td>{$response->{'Color'}}</td>";
                                        echo "<td>{$response->{'FechaRemate'}}</td>";
                                    echo "</tr>";
                                    echo "</tbody>";

        							//var_dump($response);

                                }

                                flush();
                                ob_flush();

                            }
                        }
                    }
                }
            }
        }

        //Patentes cuatro letras y dos numeros.
        foreach ($letras as $a1) {
            foreach ($letras as $a2) {
                foreach ($letras as $a3) {
                    foreach ($letras as $a4) {
                        foreach ($numeros as $n1) {
                            foreach ($numeros as $n2) {

                                $patente = $a1.$a2.$a3.$a4.$n1.$n2;

                                $response = @file_get_contents(
                                    sprintf($url, $patente)
                                );

                                if ($response) {

                                    $response = json_decode($response);
                                    
                                    echo "<tbody>";
                                    echo "<tr>";
                                        echo "<td>{$response->{'Patente'}}</td>";
                                        echo "<td>{$response->{'Marca'}}</td>";
                                        echo "<td>{$response->{'Modelo'}}</td>";
                                        echo "<td>{$response->{'Color'}}</td>";
                                        echo "<td>{$response->{'FechaRemate'}}</td>";
                                    echo "</tr>";
                                    echo "</tbody>";

                                    //var_dump($response);

                                }

                                flush();
                                ob_flush();

                            }
                        }
                    }
                }
            }
        }
    echo "</table>";
?>    
</body>
</html>
