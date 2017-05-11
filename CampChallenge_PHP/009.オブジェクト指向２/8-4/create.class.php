<?php

abstract class base {
  protected abstract function load();
  abstract public function show();
}

class Human extends base {
  private $table;
  private $human_db;

  public function load() {
    try {
      $this->table = 'human_db';
      $pdo_object = new PDO('mysql:host=localhost;dbname=station_info;charset=utf8','root', '');

      $sql = "SELECT * FROM .$this->table";
      $stmt = $pdo_object->prepare($sql);
      $stmt->execute();
      $this->human_db = $stmt->fetchall(PDO::FETCH_ASSOC);

      $pdo_object = null;

    } catch (PDOException $Exception) {
      die('エラーが発生しました:'.$Exception->getMessage());
    }
  }

  public function show(){
    foreach ($this->human_db as $key => $row) {
        print $row['id'] . "\t";
        print $row['name'] . "\t";
        print $row['age'] . "\t";
        print $row['country'] . "<br>";
      }
  }
}

class Station extends base {
  private $table = "station_db";

  public function load() {
    try {
      $this->table = 'station_db';

      $pdo_object = new PDO('mysql:host=localhost;dbname=station_info;charset=utf8','root', '');

      $sql = "SELECT * FROM $this->table";
      $stmt = $pdo_object->prepare($sql);
      $stmt->execute();
      $this->table = $stmt->fetchall(PDO::FETCH_ASSOC);
      $pdo_object = null;
    } catch (PDOException $Exception) {
      die('エラーが発生しました:'.$Exception->getMessage());
    }
  }

  public function show(){
    foreach ($this->table as $key => $row) {
        print $row['id'] . "\t";
        print $row['stationName'] . "<br>";
      }
  }
}

$human = new Human();
$human->load();
$human->show();

$human = new Station();
$human->load();
$human->show();

?>
