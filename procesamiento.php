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
        color: white;
    }
    body{
        background-color: rgb(15, 0, 34);
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    h1{
        color: white;
        font-weight: bolder;
        text-shadow: 0 0 15px white;
        text-align: center;
        text-transform: uppercase;
        margin: 3rem 0;
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
        margin-bottom: 40px;
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
    }
    .acierto{
        color: green;
        font-weight: bolder;
        text-shadow: 0 0 15px green;
        text-align: center;
        text-transform: uppercase;
    }
    .error{
        color: red;
        font-weight: bolder;
        text-shadow: 0 0 15px red;
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

    /* ESTILOS IMAGEN DEL USUARIO */
    .imagenUsu{
        margin-top: 2rem;
        width: 30%;
    }
    .imagenUsu > img{
        max-width: 100%;
        border-radius: 2rem;
        border: 10px solid #230052;
        filter: drop-shadow(0px 0px 10px #8e38ff56);
    }
</style>
<body>
    <h1>LA MEGAPRÁTICA DE PHP</h1>
<?php ob_start();
        if (isset($_POST["submit"])) {

            if(empty($rad = $_POST["radio"])){
                ?>
                <!-- NO ME FUNCIONA EL HEADER :( -->
                <script> location.replace("procesamiento.php?err=3"); </script>
                <?php
            }

            //CONTROL DE IMAGEN

            //Creo un array con todos los tipos de imagenes que permito
            $tiposImagenes = ["jpeg", "png", "gif", "webp", "svg"];

            //Extraigo solo el tipo de formato
            if(empty($_FILES["img"]["tmp_name"])){ //Compruebo que me pasa una imagen
                // header("Location: procesamiento.php?err=3");
            ?>
            <!-- NO ME FUNCIONA EL HEADER :( -->
            <script> location.replace("procesamiento.php?err=1"); </script>
            <?php
            }else{
                $tipo = $_FILES["img"]["type"]; //Saco el tipo de archivo
                $aux = explode("/", $tipo); // Separo el formato de imagen
                $tipoArchivo = $aux[1]; // Almaceno solo la parte del tipo de imagen
                $erroArchi = true; // Para decir si es un archivo con un formato no disponible

                foreach($tiposImagenes as $el){  //Recorro los tipos de imágenes
                    if($el == $tipoArchivo){ // Compruebo que coincide con algun tipo de archivo
                        $erroArchi = false; // Ya no hay error
                        break; // Sal del bucle una vez que encuentre un tipo válido
                    }
                }
                if($erroArchi){
                    // header("Location: procesamiento.php?err=3");
                    ?>
                    <!-- NO ME FUNCIONA EL HEADER :( -->
                    <script> location.replace("procesamiento.php?err=2"); </script>
                    <?php
                }
            }


            // Almaceno todas las cadenas en un array

            $cadenas = [];
            
            for ($i=0; $i < 7; $i++) { 
                $cadenas[] = $_POST["text$i"];
            }

            //Momento comprobaciones
            echo "<table>";

            foreach($cadenas as $cad){
                $formatoDesc = true;
                echo "<tr><th>$cad</th>";

                //CADENA VACIA Explicación:
                //  - empty(): Comprueba si la cadena está vacía

                if(empty($cad)){
                    echo "<td class=\"acierto\">VACÍO</td>";
                    $formatoDesc = false;
                };

                // UNA PALABRA Explicación:
                // - \s* permite espacios
                // - ^ indica el inicio de la cadena.
                // - [a-zA-Z] coincide con cualquier carácter (letras).
                // - + indica que debe haber al menos un carácter alfanumérico.
                // - $ indica el final de la cadena.

                if(preg_match("'^\s*([a-zA-Z]+)\s*$'", $cad)){
                    echo "<td class=\"acierto\">UNA PALABRA</td>";
                    $formatoDesc = false;
                }

                // 2 PALABRAS Explicación:
                // - ^ indica el inicio de la cadena.
                // - \w+ coincide con una o más letras, números o guiones bajos (esto representa la primera palabra).
                // - \s+ coincide con uno o más espacios en blanco (esto representa el espacio entre las palabras).
                // - \w+ coincide con una o más letras, números o guiones bajos (esto representa la segunda palabra).
                // - $ indica el final de la cadena. 

                if(preg_match("'^\s*([a-zA-Z]+)\s+([a-zA-Z]+)\s*$'", $cad)){
                    echo "<td class=\"acierto\">DOS PALABRA</td>";
                    $formatoDesc = false;
                }

                // +2 PALABRAS Explicación:
                // - ^ indica el inicio de la cadena.
                // - (\w+\s*,\s*) es un grupo que coincide con:
                //      - \w+: una o más letras, números o guiones bajos (una palabra).
                //      - \s*: cero o más espacios en blanco.
                // - ,: una coma.
                // - \s*: cero o más espacios en blanco.
                // - {2,} indica que el patrón anterior debe repetirse al menos 2 veces (esto suma un total de 3 palabras).
                // - (\s*\w+\s*)% asegura que la cadena termine con otra palabra (la tercera palabra) con espacios por ambos lados.
                // - $ indica el final de la cadena.

                if(preg_match("'^(\s*\w+\s*,){2,}(\s*\w+\s*)$'", $cad)){
                    echo "<td class=\"acierto\">MAS PALABRAS</td>";
                    $formatoDesc = false;
                }

                // NUMERO DECIMAL EN CADENA Explicación:
                // \d+: coincide con uno o más dígitos (números).
                // \.: coincide con un punto decimal. (El punto debe ser escapado con \ porque en las expresiones regulares, el punto tiene un significado especial).
                // \d+: coincide con uno o más dígitos (números) después del punto decimal.
                
                if(preg_match("'\d+\.\d+'", $cad)){
                    echo "<td class=\"acierto\">NUMERO DECIMAL</td>";
                    $formatoDesc = false;
                }

                //CADENA CON UN UNICO NUMERO IMPAR Explicación:
                // [0-9]*[13579] Que contenga un numero de da igual cuantos digitos 

                if(preg_match("'(?=.[0-9])\d*[13579]$'", $cad)){
                    echo "<td class=\"acierto\">NUMERO IMPAR</td>";
                    $formatoDesc = false;
                }

                //NUMERO DE TELEFONO Explicación:

                // ^\+ — El número debe empezar con el signo +.
                // (\d{2}) — Dos dígitos para el prefijo.
                // \s? — Espacio opcional después del prefijo.
                // (6|7|8|9) — El primer dígito del número debe ser 6, 7, 8 o 9.
                // \d{8} — Ocho dígitos adicionales para completar el número.
                // $ — Fin de la cadena.

                if(preg_match("'^\+(\d{2})\s?(6|7|8|9)\d{8}$'", $cad)){
                    echo "<td class=\"acierto\">NUMERO DE TELÉFONO</td>";
                    $formatoDesc = false;
                }

                //DNI Explicación:

                // ^[0-9]{8} La cadena debe empezar por una cadena de 8 numeros de entre el 0 y el 9
                // [A-Z] La cadena a continuación debe contener un carácter mayúscula
                // $ — Fin de la cadena.

                if(preg_match("'^[0-9]{8}[A-Z]$'", $cad)) {
                    echo "<td class=\"acierto\">NUMERO DE DNI</td>";
                    $formatoDesc = false;
                }

                // Contraseña (al menos seis caracteres, debe contener
                // a. Debe tener entre 8 y 20 caracteres.
                // b. Debe contener al menos 2 números (no tienen que ser
                // consecutivos).
                // c. Debe contener al menos 1 letra mayúscula y 3 caracteres
                // especiales (no consecutivos)

                if(preg_match("'^(?=(.*[0-9]){2,})(?=.*[A-Z])(?=(.*[\W_]){3,}).{8,20}$'", $cad)){
                    echo "<td class=\"acierto\">CONRTASEÑA</td>";
                    $formatoDesc = false;
                }

                if($formatoDesc == true) echo "<td class=\"acierto\">FORMATO DESCONOCIDO</td>";



                echo "</tr>";
            }

            echo "</table>";

            $ruta = "./img/"; //Creamos la ruta

            if(!file_exists($ruta)){ // Comprobamos si existe la ruta
                mkdir($ruta); // Se crea en caso de que no exista
            }

            $origen = $_FILES["img"]["tmp_name"]; // Guardamos la ruta temporal de la imagen
            
            $nuevoNom = $_POST[$rad].".".$tipoArchivo; // Saco que vale esa posicion del select
            $destino = $ruta.$nuevoNom; // Creo la ruta de guardado con el nuevo nombre

            move_uploaded_file($origen, $destino); // Lo desplazo a la nueva ruta


            echo "<div class=\"imagenUsu\">
                    <img src=\"$destino\">
                  </div>";
        }else{
            if(isset($_GET["err"])){
                if($_GET["err"] == 3) echo "<p class=\"error\" style=\"margin-bottom: 2rem;\">Tienes que seleccionar una palabra</p>";
            }
    ?>
        <!-- CREAMOS EL FORMULARIO -->
        <form id="form" action="procesamiento.php" method="post" enctype="multipart/form-data">
            <div>
            <?php
                for ($i=0; $i < 7; $i++) { 
                    echo "<div class=\"cajaInput\">";
                    echo "<label class=\"labelForm\" for=\"text$i\">Introduce la cadena $i:</label>";
                    echo "<input class=\"inputForm\" type=\"text\" name=\"text$i\" placeholder=\"Introduce una cadena\">";
                    echo "  <div class=\"radio-input\">
                                <input name=\"radio\" type=\"radio\" class=\"input\" value=\"text$i\">
                            </div>"
                    ?>
                    
                    <?php
                    echo "</div>";
                }
            ?>
            </div>
            <div class="cajaInput">
                <?php
                if(isset($_GET["err"])){
                    if($_GET["err"] == 1) echo "<p class=\"error\">No dejes este campo vacío</p>";
                    if($_GET["err"] == 2) echo "<p class=\"error\">Formato no válido</p>";
                }
                ?>
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