<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRACTICA</title>
</head>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body{
        background-color: rgb(15, 0, 34);
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        height: 100vh;
    }
    h1{
        color: white;
        font-weight: bolder;
        text-shadow: 0 0 15px white;
        text-align: center;
        text-transform: uppercase;
        margin-bottom: 3rem;
    }
    #form{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    #form > div{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        width: 80%;
        gap: 3rem;
    }
    #form >div>div{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0px 0px 20px black;
        background-color: rgb(35, 0, 82);
    }
    #form >div>div>label{
        color: white;
        font-weight: bolder;
        text-transform: uppercase;
        margin-bottom: 2rem;
        text-shadow: 0 0 15px white;
    }
    #form >div>div>input{
        background: transparent;
        border: 1px solid white;
        padding: 1rem 1.5rem;
        text-align: center;
        border-radius: 20px;
        color: white;
        font-weight: bolder;
    }
    .envio{
        background: transparent;
        border: none;
        padding: 1rem 1.5rem; 
        background-color: rgb(35, 0, 82);
        color: white;
        font-weight: bolder;
        border-radius: 20px;
        margin-top: 40px;
        box-shadow: 0px 0px 20px black;
        transition: all .4s ease;
    }
    .envio:hover{
        box-shadow: 0px 0px 20px rgba(255, 255, 255, 0.417);
        text-shadow: 0 0 15px white;
        /*background-color: rgb(172, 108, 255); */
    }
    h1, h2, h3, h4, p, a, input, label, tr{
        font-family: "system-ui";
    }
    .acierto{
        color: green;
        font-weight: bolder;
        text-shadow: 0 0 15px green;
        text-align: center;
        text-transform: uppercase;
    }
</style>
<body>
    <h1>LA MEGAPRÁTICA DE PHP</h1>
    <?php
        if (isset($_POST["submit"])) {
            // Almaceno todas las cadenas en un array

            $cadenas = [];
            for ($i=0; $i < 7; $i++) { 
                $cadenas[] = $_POST["text$i"];
            }

            //Momento comprobaciones
            echo "<table>";

            foreach($cadenas as $cad){
                echo "<tr><th>$cad</th>";

                //CADENA VACIA Explicación:
                //  - empty(): Comprueba si la cadena está vacía

                if(empty($cad)) echo "<td class=\"acierto\">VACÍO</td>";

                // UNA PALABRA Explicación:
                // - ^ indica el inicio de la cadena.
                // - \w coincide con cualquier carácter alfanumérico (letras y números) y guiones bajos.
                // - + indica que debe haber al menos un carácter alfanumérico.
                // - $ indica el final de la cadena.

                if(preg_match("'^\w+$'", $cad)) echo "<td class=\"acierto\">UNA PALABRA</td>";

                // 2 PALABRAS Explicación:
                // - ^ indica el inicio de la cadena.
                // - \w+ coincide con una o más letras, números o guiones bajos (esto representa la primera palabra).
                // - \s+ coincide con uno o más espacios en blanco (esto representa el espacio entre las palabras).
                // - \w+ coincide con una o más letras, números o guiones bajos (esto representa la segunda palabra).
                // - $ indica el final de la cadena. 

                if(preg_match("'^\w+\s+\w+$'", $cad)) echo "<td class=\"acierto\">DOS PALABRA</td>";

                // +2 PALABRAS Explicación:
                // - ^ indica el inicio de la cadena.
                // - (\w+\s*,\s*) es un grupo que coincide con:
                //      - \w+: una o más letras, números o guiones bajos (una palabra).
                //      - \s*: cero o más espacios en blanco.
                // - ,: una coma.
                // - \s*: cero o más espacios en blanco.
                // - {2,} indica que el patrón anterior debe repetirse al menos 2 veces (esto suma un total de 3 palabras).
                // - \w+$ asegura que la cadena termine con otra palabra (la tercera palabra).
                // - $ indica el final de la cadena.

                if(preg_match("'^(\w+\s*,\s*){2,}\w+$'", $cad)) echo "<td class=\"acierto\">MAS PALABRAS</td>";

                // NUMERO DECIMAL EN CADENA Explicación:
                // \d+: coincide con uno o más dígitos (números).
                // \.: coincide con un punto decimal. (El punto debe ser escapado con \ porque en las expresiones regulares, el punto tiene un significado especial).
                // \d+: coincide con uno o más dígitos (números) después del punto decimal.
                
                if(preg_match("'\d+\.\d+'", $cad)) echo "<td class=\"acierto\">NUMERO DECIMAL</td>";

                //CADENA CON UN UNICO NUMERO IMPAR Explicación:
                // ^: Indica el inicio de la cadena.
                // (?!.*\d*[13579].*\d*[13579]): Esta parte utiliza una afirmación negativa para asegurarse de que no haya más de un dígito impar en la cadena.
                // .*: Coincide con cualquier carácter (cero o más veces).
                // \d*[13579]: Coincide con cualquier número de dígitos seguido de un dígito impar.
                // .*: Coincide nuevamente con cualquier carácter.
                // .*: Coincide con cualquier carácter (cero o más veces) antes del número impar.
                // \b[13579]\b: Coincide exactamente con un dígito impar (1, 3, 5, 7 o 9) en una palabra completa, usando \b para asegurar que sea un límite de palabra.
                // .*$: Coincide con cualquier carácter (cero o más veces) hasta el final de la cadena.

                if(preg_match("'^(?!.*\b\d*[13579]\b.*\b\d*[13579]\b).*?\b\d*[13579]\b$'", $cad)) echo "<td class=\"acierto\">NUMERO DECIMAL</td>";

                echo "</tr>";
            }

            echo "</table>";
        }else{
    ?>
        <!-- CREAMOS EL FORMULARIO -->
        <form id="form" action="procesamiento.php" method="post" enctype="multipart/form-data">
            <div>
            <?php
                for ($i=0; $i < 7; $i++) { 
                    echo "<div>";
                    echo "<label for=\"text$i\">Introduce la cadena $i:</label>";
                    echo "<input type=\"text\" name=\"text$i\" placeholder=\"Introduce una cadena\">";
                    echo "</div>";
                }
            ?>
            </div>
            <input class="envio" type="submit" value="Enviar todo" name="submit">
        </form>
    <?php
        }
    ?>
</body>
</html>