<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <script src="https://kit.fontawesome.com/dca352768f.js" crossorigin="anonymous"></script>

    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- /Boostrap -->
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#"><i class="fas fa-car me-2"></i>Control vehiculos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex align-self-auto">
                    <li class="nav-item">
                        <a class="nav-link active fw-bold m-1 text-dark" aria-current="page" href="">Inicio</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row my-5">
            <div class="col-md-6">
                <h1 class="text-center fw-bold">Login</h1>
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
                    <div class="text-center my-2">
                        <button type="submit" class="btn btn-primary my-2" name="ingresar">Ingresar</button>
                    </div>                
                </form>
            </div>
            <div class="col-md-6">
                <h1 class="text-center fw-bold">Registro</h1>
                <?php require('../controllers/usuario.php'); ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="form-group">
                        <label for="usuario" class="label-control">Usuario <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="usuario" placeholder="Usuario" name="user" required>
                    </div>
                    <div class="form-group">
                        <label for="pass" class="label-control">Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="pass" placeholder="Contraseña" name="pass" required>
                    </div>
                    <div class="form-group my-2">
                        <label for="rol" class="label-control">Rol <span class="text-danger">*</span></label><br>
                        <input name="rol" checked id="option1" class="form-check-input me-2 mt-2" type="radio" value="1" aria-label="Radio button for following text input">Comprador <br>
                        <input name="rol" id="option2" class="form-check-input me-2 mt-2" type="radio" value="2" aria-label="Radio button for following text input">Vendedor <br>
                        <input name="rol" id="option3" class="form-check-input me-2 mt-2" type="radio" value="3" aria-label="Radio button for following text input">Ambos <br>
                    </div>
                    <div class="form-group" style="display: none;" id="admin">
                        <label for="passA" class="label-control">Contraseña de administrador <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="passA" placeholder="Contraseña" name="passAdmin">
                    </div>
                    <div class="text-center my-2">
                        <button class="btn btn-success my-2" type="submit" name="btnInsertUsuario">Registrarme</button>
                    </div>                
                </form>
            </div>
        </div>
    </div>
    <?php 
        include('footer.php'); 
        include('link-js.php'); 
    ?>
    <script src="js/validacion.js"></script>
</body>
</html>