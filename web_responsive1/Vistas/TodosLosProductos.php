
<?php
/*llamo al archivo productos */

require_once "funciones/Producto.php";
$productoSeleccionado = isset($_GET['numeroId']) ? $_GET['numeroId'] : false;
$catalogo = new Producto();
$numeroId = $catalogo->totalCatalogo($productoSeleccionado);

function recortar_palabras($parrafo, $cantidad) {
    $array = explode(" ", $parrafo);
    if (count($array)<=$cantidad)
    {
        $resultado = $parrafo;
    } else {
        array_splice($array, $cantidad);
        $resultado = implode(" ", $array)."...";
    }
    return $resultado;
}


/*muestra la información de todos producto en una página*/
?>
<h1 class="text-center text-primary p-4">Todos los articulos</h1>
<div class="row row-cols-1 row-cols-md-3 g-4">
    <?php if( count($numeroId) ) { ?>

        <?PHP foreach ($numeroId as $detalleProducto) { ?>
            <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card mb-3">
                <img src="img/<?= $detalleProducto->img; ?>" class="card-img-top" alt="img de <?= $detalleProducto->numeroId; ?> Vol.<?= $detalleProducto->volumen; ?> #<?= $detalleProducto->numeroId; ?>">
                <div class="card-body">
                    <!-- <p class="fs-6 m-0 fw-bold text-dark"><?= $detalleProducto->numeroId; ?><?= $detalleProducto->numeroId; ?></p> -->
                    <h2 class="card-title"><?= $detalleProducto->titulo; ?></h2>
                    <p class="card-text"><?= $detalleProducto->bajada_reducida(10); ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><span class="fw-bold">Marca:</span> <?= $detalleProducto->marca; ?></li>
                    <li class="list-group-item"><span class="fw-bold">Colores:</span> <?= $detalleProducto->colores; ?></li>
                    <li class="list-group-item"><span class="fw-bold">Conector:</span> <?= $detalleProducto->conector; ?></li>
                </ul>
                <div class="card-body">
                    <div class="fs-3 mb-3 fw-bold text-center text-info">$<?= $detalleProducto->precio_formateado() ?></div>
                    <a href="index.php?sec=detalleProducto&id=<?= $detalleProducto->id ?>" class="btn btn-primary w-100 fw-bold">Ver Detalles</a>
                </div>

            </div>
        </div>
        <?PHP } ?>
    
    <?php }else {?>   
        <h1 class="text-center" >No hay articulos disponibles</h1>
    <?php }?>

</div>