<?php
session_start();
require_once 'config.php';



class DB
{

  public static function connect($value='')
  {
    // create a new PDO connection
    $pdo = new PDO('mysql:host=localhost:3307;dbname=mydatabase2;dbuser= ;dbpass=');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
  }

  public static function run($sql, $args = NULL) {
    if (!$args) 
    {
      return DB::connect()->query($sql);
    }
    $stmt = DB::connect()->prepare($sql);
    try {
      $stmt->execute($args);
      return $stmt;
    }
    catch (PDOException $e){
      echo $e->getMessage();
      die();
    }   
  }

}
?>
<?php 


$connection = mysqli_connect("localhost:3307","root","","mydatabase2");


if(!$connection)
{
	echo "Database connection failed...";
}

$retrieve = mysqli_query($connection, "SELECT * FROM itemorderlist ");
$row= mysqli_fetch_array($retrieve);



?>


