<?php

    include 'conexion_be.php';

    $nombre_completo= $_POST['nombre_completo'];
    $correo= $_POST['correo'];
    $usuario= $_POST['usuario'];
    $contrasena= $_POST['contrasena'];

    $query = "INSERT INTO usuarios(nombre_completo, correo, usuario, contrasena)
              VALUES('$nombre_completo', '$correo', '$usuario', '$contrasena')";

    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo'");

    if(mysqli_num_rows($verificar_correo) > 0){
        echo'
            <script>
                alert("Este correo ya se encuentra registrado, intente con otro");
                window.location = "../index.php";
            </script>
        ';
        exit();
    }
    
    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo'
            <script>
                alert("Usuario almacenado de manera exitosa");
                window.location = "../index.php";
            </script>
        ';
    }else{
        echo'
            <script>
                alert("Inténtelo nuevamente...");
                window.location = "../index.php";
            </script>
        ';
    }   
?>