<?php

class QueryBuilder {

  // klasa koja dobija prilikom instanciranja objekat koji sluzi za konekciju i zatim resava upite.

  protected $pdo;

  public function __construct(PDO $pdo)
  {
    $this->pdo = $pdo;
  }

  public function fetchAll($table)
  {
    $query = $this->pdo->prepare("select * from `{$table}`");

    $query->execute();

    return $query->fetchAll(PDO::FETCH_OBJ);
  }

  public function selectWhere(string $table, string $field1, string $operator, string $field2)
 {
    $query = $this->pdo->prepare("select * from `{$table}` where `{$field1}` {$operator} '{$field2}'");

    $query->execute();

    return $query->fetchAll(PDO::FETCH_OBJ);
  }

  public function save(string $table, array $values)
  {
    $str = "INSERT INTO `{$table}` SET ";

    foreach($values as $key => $value) {
      $str .= "`" . $key . "`" . '=' . "'" . $value . "'" . ', ';
    }
    $str = rtrim($str, ', ');

    $query = $this->pdo->prepare($str);

    $query->execute();
  }

  public function saveForm(string $table, Form $form){
    $values = (array) $form;
    $this->save($table, $values);
  }
}
