
<?php
/*llamo al archivo productos */
require_once "funciones/Producto.php";
$productoSeleccionado = isset($_GET['id']) ? $_GET['id'] : false;

$catalogo = new Producto();

$detalleProducto = $catalogo->productosId($productoSeleccionado);

/* imprime en mayúsculas la letra del $texto que está en la posición $count */
function miEcho( string $texto, int $count) : void {
    echo strtoupper($texto[$count]);
}


/*muestra la información detallada de un producto en una página*/
?>

<div class="row">
<?PHP if (isset($detalleProducto)) { ?>
    <div class="col p-5">
            <div class="card">
                <div class="row m-0">
                    <div class="col-md-5">
                        <img src="img/<?= $detalleProducto->img; ?>" class="img-fluid rounded-start border-end" alt="img de <?= $detalleProducto->numeroId; ?> Vol.<?= $detalleProducto->volumen; ?> #<?= $detalleProducto->numeroId; ?>">
                    </div>
                    <div class="col-md-7 d-flex flex-column p-3">
                        <div class="card-body flex-grow-0 fs-5">
                            <h2 class="card-title fs-1 mb-5"><?= $detalleProducto->titulo; ?></h2>
                            <p class="card-text"><?= $detalleProducto->descripcion ?></p>
                        </div>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item fs-5"><span class="fw-bold">Marca:</span> <?= $detalleProducto->marca; ?></li>
                            <li class="list-group-item fs-5"><span class="fw-bold">Colores:</span> <?= $detalleProducto->colores; ?></li>
                            <li class="list-group-item fs-5"><span class="fw-bold">Conector:</span> <?= $detalleProducto->conector; ?></li>
                        </ul>

                        <div class="card-body flex-grow-0 mt-auto">
                            <div class="fs-3 mb-3 fw-bold text-center text-info">$<?= $detalleProducto->precio_formateado(); ?></div>
                            <a href="#" class="btn btn-dark w-100 fw-bold">Comprar</a>
                        </div>
                    </div>
                </div>
            </div>


         </div>

<?PHP } else { ?>
    <div class="col">
        <h2 class="text-center text-primary text-primary m-5">No se encontró el producto deseado.</h2>
    </div>
<?PHP } ?>
</div>