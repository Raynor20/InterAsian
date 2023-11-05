<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "interasian");

if (isset($_POST["submit"])) {
    $id = $_POST["listing_id"]; 
    $title = $_POST["editTitle"];
    $location = $_POST["editLocation"];
    $landarea = $_POST["editLandarea"];
    $floorarea = $_POST["editFloorarea"];
    $bedrooms = $_POST["editBedrooms"];
    $bathrooms = $_POST["editBathrooms"];
    $price = $_POST["editPrice"];
    $description = $_POST["editDescription"];
    $targetDir = "uploads/";
    $filePaths = array();

    // Handling image upload
    if (!empty($_FILES["image"]["name"][0])) {
        foreach ($_FILES["image"]["tmp_name"] as $key => $tmp_name) {
            $fileName = $_FILES["image"]["name"][$key];
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

            $allowedTypes = array('jpg', 'jpeg', 'png'); // Allowed file types
            if (in_array($fileType, $allowedTypes)) {
                if (move_uploaded_file($_FILES["image"]["tmp_name"][$key], $targetFilePath)) {
                    // Add file path to the array
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
        $updateQuery = "UPDATE listings SET title = '$title', location = '$location', landarea = '$landarea', floorarea = '$floorarea', bedrooms = '$bedrooms', bathrooms = '$bathrooms', price = '$price', description = '$description', image = '$imagePathsString' WHERE listing_id = $id";
    } else {
        // If no new image is uploaded, update without modifying the image field
        $updateQuery = "UPDATE listings SET title = '$title', location = '$location', landarea = '$landarea', floorarea = '$floorarea', bedrooms = '$bedrooms', bathrooms = '$bathrooms', price = '$price', description = '$description' WHERE listing_id = $id";
    }

    $res = mysqli_query($conn, $updateQuery);

    if ($res) {
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
