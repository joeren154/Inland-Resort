<?php
    try {
       
        $username="root";
        $password="";
        $charset = 'utf8mb4';
        $db="mysql:host=localhost;dbname=db_inland;charset=$charset";
        // $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $conn=new PDO($db, $username, $password, $options);
    } catch (PDOException $error) {
        echo $error->getMessage();
		die();
    }


//For Map
    function get_db(){
      try{

        $username="root";
        $password="";
        $charset = 'utf8mb4';
        $db="mysql:host=localhost;dbname=db_inland;charset=$charset";
        // $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $conn=new PDO($db, $username, $password, $options);

        return $conn;

      }catch(PDOExecption $e){
        echo 'Connection Failed: ' . $e->getMessage();
      }
    }

    function get_map_data(){
      try{
        $db=get_db();
        $stmt = $db->query("SELECT name, lat, lon, address FROM tb_location");
        $data = $stmt->fetchAll();
        return json_encode($data);
      }catch(PDOExecption $e){
        return 'Error: ' . $e->getMessage();
      }
    }  
?>