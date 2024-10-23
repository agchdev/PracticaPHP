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

    /* ESTILOS DEL FORMULARIO */

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
    #form > div:nth-child(2){
        gap: 0;
        width: 20%;
        margin-top: 3rem;
    }
    .cajaInput{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0px 0px 20px black;
        background-color: rgb(35, 0, 82);  
    }
    .labelForm{
        color: white;
        font-weight: bolder;
        text-transform: uppercase;
        margin-bottom: 2rem;
        text-shadow: 0 0 15px white;
    }
    .inputForm{
        max-width: 100%;
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
        box-shadow: 0px 0px 0px black;
        transition: all .4s ease;
    }
    .envio:hover{
        transform: translateY(-10px);
        box-shadow: 0px 10px 20px black;
    }
    h1, h2, h3, h4, p, a, input, label, tr{
        font-family: "system-ui";
    }

    /* ESTILOS DEL PROCESAMIENTO */
    table{
        border-collapse: collapse;
        box-shadow: 0px 0px 10px #230052;
        border-radius: 30px;
        overflow: hidden;
    }
    td{
        padding: 1.5rem 2rem;
        border: 1px solid #230052;
    }
    th{
        border: 1px solid #230052;
        padding: 1.5rem 2rem;
        color: white;
        font-weight: bolder;
        text-shadow: 0 0 15px rgba(255, 255, 255, 0.511);
        text-align: center;
        text-transform: uppercase;
    }
    .acierto{
        color: green;
        font-weight: bolder;
        text-shadow: 0 0 15px green;
        text-align: center;
        text-transform: uppercase;
    }

    /* ESTILOS INPUT RADIO */

    .radio-input{
        margin-top: 20px;
    }
    .input {
        -webkit-appearance: none;
        display: block;
        width: 24px;
        height: 24px;
        border-radius: 12px;
        cursor: pointer;
        vertical-align: middle;
        box-shadow: hsla(0,0%,100%,.15) 0 1px 1px, inset hsla(0,0%,0%,.5) 0 0 0 1px;
        background-color: hsla(0,0%,0%,.2);
        background-image: -webkit-radial-gradient( hsla(200,100%,90%,1) 0%, hsla(200,100%,70%,1) 15%, hsla(200,100%,60%,.3) 28%, hsla(200,100%,30%,0) 70% );
        background-repeat: no-repeat;
        -webkit-transition: background-position .15s cubic-bezier(.8, 0, 1, 1),
        -webkit-transform .25s cubic-bezier(.8, 0, 1, 1);
        outline: none;
    }

    .input:checked {
        -webkit-transition: background-position .2s .15s cubic-bezier(0, 0, .2, 1),
        -webkit-transform .25s cubic-bezier(0, 0, .2, 1);
    }

    .input:active {
        -webkit-transform: scale(1.5);
        -webkit-transition: -webkit-transform .1s cubic-bezier(0, 0, .2, 1);
    }



    /* Direcciones izquierda y derecha del radio */

    .input:active {
        background-position: -24px 0 ;
    }
    .input{
        background-position: 24px 0 ;
    }

    .input:checked {
        background-position: 0 0;
    }   

    .input:checked ~ .input,
    .input:checked ~ .input:active {
        background-position: 24px 0;
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
                    echo "<div class=\"cajaInput\">";
                    echo "<label class=\"labelForm\" for=\"text$i\">Introduce la cadena $i:</label>";
                    echo "<input class=\"inputForm\" type=\"text\" name=\"text$i\" placeholder=\"Introduce una cadena\">";
                    ?>
                    <div class="radio-input">
                        <input name="radio" type="radio" class="input">
                    </div>
                    <?php
                    echo "</div>";
                }
            ?>
            </div>
            <div class="cajaInput">
                <label class="labelForm" for="img">Introduce una imagen:</label>
                <input class="inputForm" type="file" name="img">
            </div>
            <div>

            </div>
            <input class="envio" type="submit" value="Enviar todo" name="submit">
        </form>
    <?php
        }
    ?>
</body>
</html>