<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";
    $dbname = "saraha";
    $conn = new mysqli($servername, $username, $password,$dbname);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "SELECT ID, Email, Password FROM User";
  $result = $conn->query($sql);
  
   if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          echo "id: " . $row["ID"]." ".$row["Email"]. " " . $row["Password"]. "<br>";
      }
  	} else {
      echo "0 results";
  }

  
 ?>