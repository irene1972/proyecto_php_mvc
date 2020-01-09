<?php

  class Pedido{

    private $id;
    private $usuario_id;
    private $provincia;
    private $localidad;
    private $direccion;
    private $coste;
    private $estado;
    private $fecha;
    private $hora;

    private $db;

    public function __construct(){
      $this->db = Database::connect();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getUsuario_id()
    {
        return $this->usuario_id;
    }

    public function setUsuario_id($usuario_id)
    {
        $this->usuario_id = $usuario_id;
    }

    public function getProvincia()
    {
        return $this->provincia;
    }

    public function setProvincia($provincia)
    {
        $this->provincia = $this->db->real_escape_string($provincia);
    }

    public function getLocalidad()
    {
        return $this->localidad;
    }

    public function setLocalidad($localidad)
    {
        $this->localidad = $this->db->real_escape_string($localidad);
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $this->db->real_escape_string($direccion);
    }

    public function getCoste()
    {
        return $this->coste;
    }

    public function setCoste($coste)
    {
        $this->coste = $coste;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function getHora()
    {
        return $this->hora;
    }

    public function setHora($hora)
    {
        $this->hora = $hora;
    }

    public function getAll(){
      $pedidos = $this->db->query("SELECT * FROM pedidos ORDER BY id DESC;");
      return $pedidos;
    }

    public function getAllAndUsersNames(){

      $sql = "SELECT pe.*, us.nombre, us.apellidos " .
            " FROM pedidos pe " .
            " INNER JOIN usuarios us ON pe.usuario_id=us.id " . 
            " ORDER BY pe.id DESC;";

      $pedidos = $this->db->query($sql);
      return $pedidos;

    }

    public function getById(){
        $pedidos = $this->db->query("SELECT * FROM pedidos WHERE id = {$this->getId()};");
        return $pedidos->fetch_object();
    }

    public function getOneByUser(){
      
      $sql = "SELECT pe.id as num_pedido, pe.coste as coste  " 
              . " FROM pedidos pe "
              . " WHERE pe.usuario_id = {$this->getUsuario_id()} " 
              . " ORDER BY pe.id DESC " 
              . " LIMIT 1;";
      
      $pedido = $this->db->query($sql);
      
      return $pedido->fetch_object();

    }
    
    public function getAllByUser(){
      
      $sql = "SELECT pe.*  " 
              . " FROM pedidos pe "
              . " WHERE pe.usuario_id = {$this->getUsuario_id()} " 
              . " ORDER BY pe.id DESC;";
      
      $pedidos = $this->db->query($sql);
      
      return $pedidos;

    }

    public function getProductosByPedido(){
      $sql = "SELECT lp.producto_id, lp.unidades, pr.* "
                . " FROM lineas_pedidos lp "
                . " INNER JOIN productos pr ON pr.id=lp.producto_id "
                . " WHERE lp.pedido_id = {$this->getId()};";

      $productos = $this->db->query($sql);
      return $productos;
      
    }

    public function save(){
      
      $sql="INSERT INTO pedidos ( id, usuario_id, provincia, localidad, direccion, coste, estado, fecha, hora ) 
                VALUES ( NULL, 
                        '{$this->getUsuario_id()}', 
                        '{$this->getProvincia()}', 
                        '{$this->getLocalidad()}', 
                        '{$this->getDireccion()}', 
                        '{$this->getCoste()}', 
                        'confirm',  
                        CURDATE(), 
                        CURTIME() 
                        );";

      $save = $this->db->query($sql);

      $result = false;
  
      if( $save ){
        $result = true;
      }
      
      return $result;
  
    }

    public function save_linea( $carrito ){

      $sql = "SELECT LAST_INSERT_ID() AS 'pedido';";
      $query = $this->db->query($sql);
      $pedido_id = $query->fetch_object()->pedido;

      foreach( $carrito as $elemento ){

          $unidades = $elemento['unidades'];
          $prod_id = $elemento['producto']->id;

          // Actualizar la tabla lineas_pedidos
          $insert="INSERT INTO lineas_pedidos VALUES ( NULL, {$pedido_id}, {$prod_id}, {$unidades} )";
          $save = $query = $this->db->query($insert);

          
          // Restar del stock los productos
          $update_stock = "UPDATE productos SET stock = ((SELECT stock FROM productos WHERE id = {$prod_id}) - {$unidades}) WHERE id = {$prod_id};";
          $update = $query = $this->db->query($update_stock);

        }

        $result = false;
  
        if( $save && $update ){
          $result = true;
        }
        
        return $result;
  
    }

    public function updateStatusById(){
      
      $sql = "UPDATE pedidos SET estado = '{$this->getEstado()}' ";
      $sql .= " WHERE id = {$this->getId()};";
      $save = $this->db->query($sql);

      $result=false;
      
      if( $save ){
        $result = true;
      }

      return $result;

    }

  }

?>