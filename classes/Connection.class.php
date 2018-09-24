<?php

class Connection {

  //Singlton paretn koj instancira konekciju.

  private static  $server = "mysql:host=localhost;dbname=paragraf";
  private static  $user = "root";
  private static  $pass = "";
  private static  $connection = null;

  private function __construct(){}

  public static function make() {
      if(!self::$connection){
        try{

            self::$connection = new PDO(self::$server, self::$user, self::$pass);

          } catch (PDOExeption $e){

            die($e->getMessage());

          }
      }
      return self::$connection;
  }

}
