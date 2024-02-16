
<?php
    class Producto{
        public $id;
        private $tipo;
        public $titulo;
        public $marca;
        public $colores;
        public $descripcion;
        public $img;
        public $precio;

    /*El método "get_tipo()" devuelve el valor de la propiedad privada "tipo".  */
    public function get_tipo() {
        echo $this->tipo;
    }
    /*El método "set_tipo($tipo)" establece el valor de la propiedad "tipo"
    si el parámetro es mayor que 3 "true". 
    Si no es así, no establece el valor de "tipo" y devuelve "false". */
    public function set_tipo($tipo) : bool {
        if( strlen($tipo) > 3 ){
            $this->tipo = $tipo;
            return true;
        }else{
            return false;
        }
    }


    /*devuelve el array que contiene todos los productos en el catálogo en el JSON.*/

    public function totalCatalogo() : array {
        $catalogo = [];
        $JSON = file_get_contents("listaProductos/productos.json");
        $JSONData = json_decode($JSON);
        foreach( $JSONData as $value ) {            
            $detalleProcucto = new self();
            $detalleProcucto->id = $value->id;
            $detalleProcucto->tipo = $value->tipo;
            $detalleProcucto->titulo = $value->titulo;
            $detalleProcucto->conector = $value->conector;
            $detalleProcucto->marca = $value->marca;
            $detalleProcucto->colores = $value->colores;
            $detalleProcucto->descripcion = $value->descripcion;
            $detalleProcucto->img = $value->img;
            $detalleProcucto->precio = $value->precio;   
            
            $catalogo[] = $detalleProcucto;
        }
        return $catalogo;
    }
/*"$resultado" lo utilizo para almacenar los productos que corresponden al tipo. */
    public function catalogo_por_tipo(string $tipo) : array {
        $resultado = [];
        $catalogo = $this->totalCatalogo();
/*"foreach" recorre los productos del catálogo completo.
 Para cada producto, si la propiedad "tipo" se agrega el producto al array "$resultado". */
        foreach($catalogo as $p) {
            if($p->tipo == $tipo) {
                $resultado[] = $p;
            }
        }
        return $resultado;  
    }
/* "totalCatalogo()" para obtener el catálogo completo de productos.
 "foreach" que recorre cada uno de los productos del catálogo, comprueba si el valor de la propiedad "id"
 Si no se encuentra ningún producto con el ID devuelve "null". */
    public function productosId(int $idProducto) {

        $catalogo = $this->totalCatalogo();
        foreach( $catalogo as $p ){
            if( $p->id == $idProducto ) {
                return $p;
            }
        }
        return null;
    }   
/*"number_format()" para dar formato al precio decimales, puntos,. 
 formateo el precio mediante "$this->precio". */
    public function precio_formateado() : string {
            return number_format($this->precio, 2, ",", ".");
        }

/*número máximo de palabras que se permiten en la descripción del producto */
    public function bajada_reducida(int $cantidad = 10) : string {

        $texto = $this->descripcion;
        $array = explode(" ", $texto);
        $resultado = "";

        if(count($array) <= $cantidad) {
            $resultado = $texto;
        } else {
            array_splice($array, $cantidad);
            $resultado = implode(" ", $array)."....";
        }
        return $resultado;
    }    
};
