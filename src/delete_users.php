<?php
require '../config/databases.php';

if(isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $query_delete_user = "DELETE FROM users WHERE id = $delete_id";
    $result_delete = pg_query($conn, $query_delete_user);
    if($result_delete) {
        header("Location: list_users.php"); // Redirige a la página de listado de usuarios después de eliminar
        exit;
    } else {
        echo "Error al intentar borrar el usuario.";
    }
}