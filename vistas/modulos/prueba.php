<div class="login-register" style="background-image:url(../assets/images/background/login-register.jpg);">
    <div class="login-box card">
        <div class="card-body">

            <?php
            $mystring = '["61","327"]';
            $findme   = '327';
            $pos = strpos($mystring, $findme);

            // Nótese el uso de ===. Puesto que == simple no funcionará como se espera
            // porque la posición de 'a' está en el 1° (primer) caracter.
            if ($pos === false) {
                echo "La cadena '$findme' no fue encontrada en la cadena '$mystring'";
            } else {
                echo "La cadena '$findme' fue encontrada en la cadena '$mystring'";
                echo " y existe en la posición $pos";
            }
            ?>
        </div>
    </div>
</div>


