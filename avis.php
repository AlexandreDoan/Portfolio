<?php

$servname = 'sio-hautil.eu';
$dbname = 'doana';
$username = 'doana';
$password = 'doana';

try{
    
  $dbco = new PDO("mysql:host=$servname; dbname=$dbname", $username, $password);
  $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $email = $_POST["email"];
      $name = $_POST["name"];
      $message = $_POST["avis"];

      // var_dump($email,$name,$message);

      $sql = "insert into avis (nom,email,avis) values ('$name','$email','$message')";

      $dbco->exec($sql);
      print "Bonjour " . $name . " !, Votre adresse e-mail est " . $email . ". Voici votre avis : " . $message;

  }
} catch
(PDOException $e) {
  echo "Erreur : " . $e->getMessage();
}
?>