<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $first_name = $_POST['name'];
        $last_name = $_POST['lname'];
        $email=$_POST['email'];
        $country = $_POST['country'];
        $desc = $_POST['desc'];
        
      
      // Connecting to the Database
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "contact";

      // Create a connection
      $conn = mysqli_connect($servername, $username, $password, $database);
      
      // Die if connection was not successful
      if (!$conn){
          die("Sorry we failed to connect: ". mysqli_connect_error());
      }
      else{ 
        //echo "submitted";
      
        // Submit these to a database
        // Sql query to be executed 
        //$sql = "INSERT INTO `contactus` (`name`, `email`, `concern`, `dt`) VALUES ('$name', '$email', '$desc', current_timestamp())";
        $sql="INSERT INTO `contact` ( `first_name`, `last_name`, `email`, `country`, `description`) VALUES ( '$first_name', '$last_name', '$email', '$country', ' $desc');";
        $result = mysqli_query($conn, $sql);
        // Usage of WHERE Clause to fetch data from the database

 
        if($result){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Your entry has been submitted successfully to the server! .
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
       
        else{
            // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
      }
        

    }
  }

  

    
?>