<?php
function formateaFechaBD($fecha) {
    return implode( "/", array_reverse(explode("-", $fecha)));
}


?>