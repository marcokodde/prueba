<?php
include("db.php");
$name = '';
$price = '';
$description = '';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM productos WHERE id=$id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $name = $row['name'];
        $price = $row['price'];
        $description = $row['description'];
    }
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $price = $row['price'];
    $description = $_POST['description'];

    $query = "UPDATE productos set name = '$name', price = '$price', description = '$description' WHERE id=$id";
    mysqli_query($conn, $query);
    $_SESSION['message'] = 'Actualizado con Exito';
    $_SESSION['message_type'] = 'warning';
    header('Location: index.php');
}

?>
<?php include('Includes/header.php'); ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <div class="card-title">
                    <h3 class="text-info">Actualizar Registro</h3>
                </div>
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <br>
                    <div class="form-group">
                        <input name="name" type="text" class="form-control" value="<?php echo $name; ?>" placeholder="Update Nombre">
                    </div>
                    <br>
                    <div class="form-group">
                        <input name="price" type="number" class="form-control" value="<?php echo $price; ?>" placeholder="Update Precio">
                    </div>
                    <br>
                    <div class="form-group">
                        <textarea name="description" class="form-control" cols="20" rows="5"><?php echo $description; ?></textarea>
                    </div>
                    <br>
                    <button class="btn btn-success" name="update">
                        Actualizar
                    </button>
                    <a href="index.php" class="btn btn-danger" name="update">
                        Cancelar </a>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('Includes/footer.php'); ?>