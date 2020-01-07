<?php
  require_once 'models/Producto.php';
  class ProductoController{

      public function index(){
        
        //renderizar vista
        require_once 'views/producto/destacados.php';
      
      }

      public function crear(){
        Utils::isAdmin();
        require_once 'views/producto/crear.php';
      }

      public function save(){
        Utils::isAdmin();
 
        // Guardar el producto en bd
        if( isset($_POST) ){
          if( isset($_POST['nombre']) && strlen($_POST['nombre']) > 0 && isset($_POST['categoria']) && isset($_POST['precio']) && isset($_POST['stock']) ){
      
            //var_dump($_POST);
            
            $producto = new Producto();

            // CAMPOS OBLIGATORIOS
            $producto->setCategoria_id($_POST['categoria']);
            $producto->setNombre($_POST['nombre']);
            $producto->setPrecio($_POST['precio']);
            $producto->setStock($_POST['stock']);

            // CAMPOS NO OBLIGATORIOS:
            // DESCRIPCION
            $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : false;

            if( $descripcion )
              $producto->setDescripcion($_POST['descripcion']);

            // IMAGEN PRODUCTO
            // SI EXISTE EL $_FILE['imagen'] y ha sido validado haremos el setImagen
            if( isset($_FILES['imagen']) ){

              $file = $_FILES['imagen'];
              $file_name = $file['name'];
              $mime_type = $file['type'];

              $validated_type = ( $mime_type == 'image/jpg' || $mime_type == 'image/jpeg' || $mime_type == 'image/png' || $mime_type == 'image/gif' ) ? true : false;

              if( $validated_type ){

                if( !is_dir('uploads/images') ){
                  // Nota: el parámetro true es para crear directorios recursivos!!
                  mkdir( 'uploads/images', 0777, true );
                }

                move_uploaded_file( $file['tmp_name'], 'uploads/images/' . $file_name );

                $producto->setImagen($file_name);

              }else{
                $_SESSION['producto'] = 'failed';
              }

            }

            if( isset( $_GET['id'] ) ){
              $id = $_GET['id'];
              $producto->setId($id);
              $result_save = $producto->edit();
            }else{
              $result_save = $producto->save();
            }
            
            if( $result_save ){
              $_SESSION['producto'] = "completed";
            }else{
              $_SESSION['producto'] = "failed";
            }
          }else{
            $_SESSION['producto'] = "failed";
          }
        }else{
          $_SESSION['producto'] = "failed";
        }

        header("Location:" . BASE_URL. "producto/gestion");
    
      }

      public function gestion(){

        Utils::isAdmin();

        $producto = new Producto();
        $productos = $producto->getAll();

        require_once 'views/producto/gestion.php';

      }

      // public function editar(){

      //   Utils::isAdmin();

      //   if( isset( $_GET['id'] ) ){
          
      //     $editar = true;
      //     $id = $_GET['id'];

      //     $producto = new Producto();
      //     $producto->setId($id);

      //     $prod = $producto->getById();

      //     require_once 'views/producto/crear.php';

      //   }else{

      //     header("Location:" . BASE_URL . "producto/gestion");

      //   }

      // }

      public function eliminar(){

        Utils::isAdmin();
        //var_dump($_GET);

        if( isset( $_GET['id'] ) ){

          $id = $_GET['id'];

          $producto = new Producto();
          $producto->setId($id);

          $result_delete = $producto->delete();

          if( $result_delete ){
            $_SESSION['delete'] = "completed";
          }else{
            $_SESSION['delete'] = "failed";
          }

        }else{
          $_SESSION['delete'] = "failed";
        }

        header("Location:" . BASE_URL . "producto/gestion");

      }
    
    }

?>