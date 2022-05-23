<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- /Boostrap -->
</head>
<body>
    <div class="container">
        <div class="row my-5">
            <div class="col-md-6">
                <?php require('../controllers/login.php'); ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="form-group">
                        <label for="" class="label-control">Usuario <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Usuario" name="user" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="label-control">Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" placeholder="Contraseña" name="pass" required>
                    </div>
                    <button class="btn btn-primary my-2" name="ingresar">Ingresar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>