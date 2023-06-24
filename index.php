<?php include("db.php"); ?>

<?php include('Includes/header.php'); ?>

<main class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <!-- MENSAGES -->

            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="close" onclick="cerrar()" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
                sleep(3);
                session_unset();
            }
            ?>

            <!-- ADD TASK FORM -->
            <div class="card card-body">
                <div class="card-title">
                    <h3 class="text-info">Crear Registro</h3>
                </div>
                <form action="save.php" method="POST">
                    <div class="form">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Nombre" autofocus required>
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="number" name="price" class="form-control" placeholder="Precio" autofocus required>
                        </div>
                        <br>
                        <div class="form-group">
                            <textarea name="description" rows="2" class="form-control" placeholder="Descripción"></textarea>
                        </div>
                        <br>
                        <input type="submit" name="save" class="btn btn-success btn-block" value="Guardar">
                    </div>

                </form>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card-title">
                <h3 class="text-info">Lista de Productos</h3>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Descripcion</th>
                        <th>Fecha Agregado</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $query = "SELECT * FROM productos";
                    $result_products = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($result_products)) { ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $row['created_at']; ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php include('Includes/footer.php'); ?>
<script>
    function cerrar() {

        var x = document.querySelector('.alert');
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>