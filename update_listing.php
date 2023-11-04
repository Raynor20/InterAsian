<?php
// Connection to the database
$conn = mysqli_connect("localhost", "root", "", "interasian");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
   
    $listing_id = $_POST['listing_id'];
    $title = $_POST['title'];
    $location = $_POST['location'];
    $landarea = $_POST['landarea'];
    $floorarea = $_POST['floorarea'];
    $bedrooms = $_POST['bedrooms'];
    $bathrooms = $_POST['bathrooms'];
    $price = $_POST['price'];
    $description = $_POST['description'];

 
    $query = "UPDATE listings SET
              title = '$title',
              location = '$location',
              landarea = '$landarea',
              floorarea = '$floorarea',
              bedrooms = '$bedrooms',
              bathrooms = '$bathrooms',
              price = '$price',
              description = '$description'
              WHERE listing_id = $listing_id";

    $result = mysqli_query($conn, $query);

    if ($result) {
        
        header("Location: dashboard.php"); 
    } else {
        
        echo "Error updating the listing: " . mysqli_error($conn);
    }
} else {
   
    echo "Invalid or unauthorized request.";
}
?>
