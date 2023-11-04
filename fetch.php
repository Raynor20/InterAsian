<?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "interasian");  
 if(isset($_POST["listing_id"]))  
 {  
      $query = "SELECT * FROM listings WHERE listing_id  = '".$_POST["listing_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>
 