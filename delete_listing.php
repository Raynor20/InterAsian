<?php
// Connection to the database
$conn = mysqli_connect("localhost", "root", "", "interasian");

if (isset($_GET["id"])) {
    $listing_id = $_GET["id"];
    
    
    $check_query = "SELECT * FROM listings WHERE listing_id = $listing_id";
    $check_result = mysqli_query($conn, $check_query);
    
    if ($check_result && mysqli_num_rows($check_result) > 0) {
        
        $delete_query = "DELETE FROM listings WHERE listing_id = $listing_id";
        $delete_result = mysqli_query($conn, $delete_query);
        
        if ($delete_result) {
            // Deletion was successful
            header("Location: dashboard.php");
            exit;
        } else {
            
            echo "Error: " . mysqli_error($conn);
        }
    } else {
       
        echo "Listing not found.";
    }
} else {
   
    echo "Invalid request. Listing ID not provided.";
}
?>
