<?php
require '../config/databases.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Pets | List users</title>
</head>
<body>
    <center><h1>LIST USERS</h1></center>
    <table class="table table-striped">
        <tr>
            <th>Fullname</th>
            <th>Email</th>
            <th>Status</th>
            <th>Foto</th>
            <th>...</th>
        </tr>
        <?php
            $query_users = "
            SELECT  
                id,
                fullname,
                email,
                CASE
                     WHEN status = true THEN 'Active' ELSE 'Inactive'
                END as status
            FROM
                users
            ";
            $result = pg_query($conn, $query_users);
            while($row = pg_fetch_assoc($result)){
                echo "<tr>";
                    echo "<td>". $row['fullname'] ."</td>";
                    echo "<td>". $row['email'] ."</td>";
                    echo "<td>". $row['status'] ."</td>";
                    echo "<td><img src='icons/usuario.png' width='30'></td>";
                    echo "<td>
                        <a href='#'><img src='icons/editar.png' width='20'></a>
                        <a href='delete_users.php?delete_id=".$row['id']."'><img src='icons/borrar.png' width='20'></a>                    </td>";
                echo "</tr>";
            }
        ?>
    </table>     
</body>
</html>