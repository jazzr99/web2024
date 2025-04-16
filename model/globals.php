<?php
  $host="localhost";
  $username="root";
  $password="";
  $db="systemdbsupply";


  
  function connectdb()
  {
	  $conn=mysqli_connect( $GLOBALS["host"],$GLOBALS["username"], $GLOBALS["password"], $GLOBALS["db"]);
	  mysqli_query($conn,"set names 'utf8'");
	  
	  return $conn;
	  
  }
	  
	



  
?>