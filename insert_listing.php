<?php
//connection to the db
$conn = mysqli_connect("localhost", "root", "", "interasian");

if (isset($_POST["submit"])) {
    $title = $_POST["title"];
    $location = $_POST["location"];
    $landarea = $_POST["landarea"];
    $floorarea = $_POST["floorarea"];
    $bedrooms = $_POST["bedrooms"];
    $bathrooms = $_POST["bathrooms"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $targetDir = "uploads/";
    $filePaths = array(); 

    
    foreach ($_FILES["image"]["tmp_name"] as $key => $tmp_name) {
        $fileName = $_FILES["image"]["name"][$key];
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        
        $allowedTypes = array('jpg', 'jpeg', 'png');   //allowed file types
        if (in_array($fileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"][$key], $targetFilePath)) {
                // add file path to the array
                $filePaths[] = $targetFilePath;
            } else {
                echo "Error uploading the file.";
                exit; 
            }
        } else {
            echo "Invalid file format. Allowed formats: " . implode(', ', $allowedTypes);
            exit; 
        }
    }

    $imagePathsString = implode(',', $filePaths);

    $query = "INSERT INTO listings (title, location, landarea, floorarea, bedrooms, bathrooms, price, description, image)
        VALUES ('$title', '$location', '$landarea', '$floorarea', '$bedrooms', '$bathrooms', '$price', '$description', '$imagePathsString')";

    $res = mysqli_query($conn, $query);

    if ($res) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>