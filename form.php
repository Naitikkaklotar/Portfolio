<?php
  $name = $email = $message = "";
  
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "portfolio_db";
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  
  // Check connection
  if ($conn->connect_error) {
    echo '<script>alert("Connection failed: "'. $conn->connect_error.'");window.location = "http://localhost/project/";</script>';
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $message = $_REQUEST['message'];
    
    $sql = "INSERT INTO  tbl_contactus(name,emailId,message) VALUES ('$name', '$email', '$message')";
    try{
        if ($conn->query($sql)) {
            echo '<script>alert("record inserted successfully");window.location = "http://localhost/project/";</script>';
          } else {
            echo '<script>alert("Something is not right please check...");window.location = "http://localhost/project/";</script>';
        }
        $conn->close();
    }
    catch(Exception $ex){
        $conn->close();
        echo '<script>alert("'.$ex->getMessage().'");window.location = "http://localhost/project/";</script>';
    }
}
else{
    echo '<script>alert("Method is not proper please retry...");window.location = "http://localhost/project/";</script>';
  }

?>