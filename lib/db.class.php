<?php

class DB{
  protected $connection;

  public function __construct($host, $user, $password, $db_name){
      $this->connection = new mysqli($host, $user, $password, $db_name);

      if (mysqli_connect_error() ) {
        throw new Exception('Не могу соединиться с базой');
      }

  }

  public function query($sql){
    if(!$this->connection){
      return false;
    }

    $result = $this->connection->query($sql);

      if(mysqli_error($this->connection) ){
        echo "Ууупс..что то случилось ";
      //print_r(mysqli_error($this->connection)); //режим ошибок DB
      }

      if(is_bool($result) ){
        return $result;
      }

      $data = array();
      while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
      }
      return $data;
  }

  public function escape($str){
    return mysqli_escape_string($this->connection, $str);
  }

}


 ?>
