<?php
require 'config/carrito.php';
$db = new Database();
$con = $db->connect();

$sql = $con->prepare("SELECT idproducto, NombreProduct, Precio FROM producto WHERE Cantidad_En_Stock = 1");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sharing Technology Company - Página Principal </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">
    <link href="css/estilos.css" rel="stylesheet">
</head>

<body>
  <header data-bs-theme="dark">
    <div class="collapse text-bg-dark" id="navbarHeader">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-md-7 py-4">
            <h4>About</h4>
            <p class="text-body-secondary">Somos una empresa apasionada por la innovación y la calidad, nos esforzamos por brindarte la mejor experiencia de compra en línea. Estamos constantemente buscando las últimas innovaciones y tendencias tecnológicas para asegurarnos de que siempre tengas acceso a lo mejor del mercado.</p>
          </div>
          <div class="col-sm-4 offset-md-1 py-4">
            <h4>Contact</h4>
            <ul class="list-unstyled">
              <li><a href="#" class="text-white">Twitter</a></li>
              <li><a href="#" class="text-white">Facebook</a></li>
              <li><a href="#" class="text-white">Instagram</a></li>
              <li><a href="#" class="text-white">Support@SharingTechnology.co</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
      <div class="container">
        <a href="#" class="navbar-brand ">
          <img src="images/logo.png" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24">
          <strong>Inicio</strong>
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarHeader">
          
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                  <a href="#" class="nav-link active">Catalogo</a>
              </li>
          </ul>
          <a href="Carrito.php" class="btn btn-primary">Carrito</a> 
      </div>
      </div>
    </div>
  </header>

    <main>
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach($resultado as $row){ ?>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="images/<?php echo $row['idproducto']; ?>/producto1.png" class="card-img-top" alt="Imagen del producto">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['NombreProduct']; ?></h5>
                            <p class="card-text">$ <?php echo $row['Precio']; ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-primary">Detalles</a>
                                </div>
                                <a href="#" class="btn btn-success">Agregar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
    crossorigin="anonymous"></script>
</body>

</html>
