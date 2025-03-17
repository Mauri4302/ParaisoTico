<?php

    function AbrirBaseDatos()
    {
        return mysqli_connect("127.0.0.1:3307", "root", "", "db_paraisoTico");
    }

    function CerrarBaseDatos($context)
    {
        mysqli_close($context);
    }

?>
