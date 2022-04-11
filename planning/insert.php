<?php
  
  // servername => localhost
  // username => root
  // password => empty
  // database name => staff
  $conn = mysqli_connect("localhost", "root", "", "testing");
    
  // Check connection
  if($conn === false){
      die("ERROR: Could not connect. " 
          . mysqli_connect_error());
  }
    
  // Taking all 5 values from the form data(input)
  $first_name =  $_REQUEST['first_name'];
  $last_name = $_REQUEST['last_name'];
  $gender =  $_REQUEST['start_time'];
  $address = $_REQUEST['end_time'];

    
  // Performing insert query execution
  // here our table name is college
  $sql = "INSERT INTO test  VALUES ('$first_name', 
      '$last_name','$gender','$address')";
    
  if(mysqli_query($conn, $sql)){
      echo "<h3>data stored in a database successfully." 
          . " Please browse your localhost php my admin" 
          . " to view the updated data</h3>"; 

      echo nl2br("\n$first_name\n $last_name\n "
          . "$gender\n $address");
  } else{
      echo "ERROR: Hush! Sorry $sql. " 
          . mysqli_error($conn);
  }
    
  // Close connection
  mysqli_close($conn);
  ?>