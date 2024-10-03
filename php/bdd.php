<?php

$dsn = "";
$username = "";
$password = "";
/* 
$dsn = "mysql:dbname=lastfragment;host=localhost;charset=UTF8;";
$username = "root";
$password = ""; */

function executerSQL($sql){
    global $dsn;
    global $username;
    global $password;

    $pdo = new PDO($dsn, $username, $password);
    $result = $pdo->query($sql);

    if($result == false){
      var_dump($pdo->errorInfo());
      die('Erreur SQL');
    }
    
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function fetchEverything($table){
    //On récupère les variables précédentes
    global $dsn;
    global $username;
    global $password; 
    
    //On écrit la commande SQL
    $sql = "SELECT * FROM $table";

    //On ouvre notre base de données
    $pdo = new PDO($dsn, $username, $password);
    $result = $pdo->query($sql);

    if ($result == false){
      var_dump($pdo->errorInfo());
      die('Erreur SQL');
    }
    //On récupère tout
      $rows = $result->fetchAll(PDO::FETCH_ASSOC);
     return $rows; 
}   


function insert($table, $colonneNames, $values){
    try{

      //On récupère les variables précédentes

        global $dsn;
        global $username;
        global $password;
      //On ouvre notre base de donnée
        $connexion = new PDO($dsn, $username, $password);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // On écrit notre commande sql

        $sql = "INSERT INTO $table ($colonneNames) VALUES ($values)"; 

        // On execute le SQL
        $connexion->exec($sql);
        echo 'Nouvelle ligne créée';
        // On gère les erreurs
    } catch(PDOException $error){
        echo $sql."<br>".$error->getMessage();
    }
    $conn = null;
    
}

//On récupère toutes les informations d'une colonne dans un tableau
function fetchcolonne($colonne, $table){
  $everything = fetchEverything($table);
  $array = array();
  foreach($everything as $value){
      array_push($array, $value[$colonne]); 
  }
  return $array;
}

function delete($table, $id){

  try{
      global $dsn;
      global $username;
      global $password;

      $conn = new PDO($dsn, $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
      $sql = "DELETE FROM $table WHERE `id` = $id";
      $conn->exec($sql);
      echo 'Ligne supprimée';
  } catch(PDOException $e){
      echo $sql."<br>".$e->getMessage();
  }
  $conn = null;
  
}

function update($sql){
  try{
      global $dsn;
      global $username;
      global $password;

      $conn = new PDO($dsn, $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $conn->exec($sql);
      echo 'Ligne mis à jour';
  } catch(PDOException $e){
      echo $sql."<br>".$e->getMessage();
  }
  $conn = null;
}


function fetchRow($table, $id){
  global $dsn;
  global $username;
  global $password;

  $sql = "SELECT * FROM $table WHERE id = $id";

  $pdo = new PDO($dsn, $username, $password);
  $result = $pdo->query($sql);

  if($result == false){
    var_dump($pdo->errorInfo());
    die('Erreur SQL');
  }

  $rows = $result->fetchAll(PDO::FETCH_ASSOC);
  return $rows;
}
?>

