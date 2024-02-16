<?PHP 
$seccion = $_GET['sec'] ?? "Inicio";

$whiteList = [
    "Inicio" => [
        "titulo" => "Inicio",
    ],
    "TodosLosProductos" => [
        "titulo" => "Catalogo",
    ],
    "Productos" => [
        "titulo" => "Ofertas",
    ],
    "Formulario" => [
        "titulo" => "Contactanos",
    ],
    "Nosotros" => [
        "titulo" => "Nosotros",
    ],
    "detalleProducto" => [
        "titulo" => "Detalle de producto",
    ],
    "Alumna" => [
        "titulo" => "Alumna"
    ],
];

$vista = "404";
$titulo = "404";

if(array_key_exists($seccion, $whiteList)) {
    $vista = $seccion;
    $titulo = $whiteList[$seccion]["titulo"];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ucwords(str_replace("_", " ", $titulo))  ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="./CSS/estilos.css" rel="stylesheet">
    <link rel="stylesheet" href="./CSS/bootstrap.min.css">
    
</head>
<body>
    <!--Cargo los archivos vistas, si no existe tira error 404-->
    <?php require_once "./Nav/Nav.php" ?>
    <main class="container">
        <?PHP
            file_exists("Vistas/$vista.php")
                ? require "Vistas/$vista.php" : require "Vistas/404.php"
        ?> 
    </main>
    <footer class="bg-primary text-light text-center fs-6 mb-0">
    
              <p>&copy 2023 ♦ Cynthia Aguirre ♦ Parcial NºI</p>

    </footer>
</body>
</html>