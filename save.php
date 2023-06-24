<?php

include('db.php');

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $created = date("Y-m-d H:i:s");
    $query = "INSERT INTO productos(name, price, description, created_at) VALUES ('$name', '$price','$description', '$created')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query Failed.");
    }

    $_SESSION['message'] = 'Guardado Correctamente';
    $_SESSION['message_type'] = 'success';
    header('Location: index.php');
}
