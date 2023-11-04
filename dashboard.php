<?php
session_start();
if (!(isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true && $_SESSION['user_role'] === 'admin')) {
    header("Location: index.php");
    exit();
}
include("database.php");
include("insert_listing.php");
include("delete_listing.php");
include("update_listing.php");

//for displaying num of listings sa table
$query = "SELECT COUNT(*) AS total_listings FROM listings";
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $totalListings = $row['total_listings'];
} else {
    $totalListings = 0; 
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-----CSS---->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href=".\css\styles.css">
</head>

<body>
    <!--------------------------NAVBAR------------------------>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="./assets/logo.png" alt="Logo" width="60" height="54" class="d-inline-block align-text-middle">
                Interasian Realty Services Inc.
            </a>
            <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse"
                type="button"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#services">Listings</a>
                    </li>
                    <li class="nav-item">
                        <?php
                        if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {
                            if ($_SESSION['user_role'] === 'admin') {
                                echo '<a class="nav-link" href="dashboard.php">Dashboard</a>';
                        } else {
                                echo '<a class="nav-link" href="#contact">Contact Us</a>';
                            }
                        } else{
                            echo '<a class="nav-link" href="#contact">Contact Us</a>';
                        }
                            ?>
                    </li>
                    <li class="nav-item">
                        <?php
                        if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {
                            echo '<a class="nav-link" href="logout.php">Logout</a>';
                            } else {
                                echo '<a class="nav-link" href="signin.php">Login</a>';
                            }
                            ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="dashboard section-padding mt-2" id="dashboard" style="max-width:80%; margin: 0 auto;">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-1 mt-2">
                    DASHBOARD
                </div>
                <div class="col-auto">
                    <!-------------- Button for create listing modal ------------>
                    <button type="button" class="btn btn-warning" onclick="openModal('exampleModal')">
                        Add New Record
                    </button>
                </div>

                <!----------------Begin Modal for Listing Insert---------------------- -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">INSERT NEW RECORD</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <form id="listingForm" action="insert_listing.php" method="post"
                                    enctype="multipart/form-data">
                                    <!----------------------BEGIN POST LISTING MODAL FORM--------------------->
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Title</span>
                                        <input type="text" class="form-control" id="title" name="title"
                                            aria-label="Title" aria-describedby="basic-addon1" required>
                                    </div>

                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Location</span>
                                        <input type="text" class="form-control" id="location" name="location"
                                            aria-label="Location" aria-describedby="basic-addon1" required>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="input-group mb-1">
                                                <span class="input-group-text" id="basic-addon1">Land
                                                    Area</span>
                                                <input type="text" class="form-control" aria-label="landarea"
                                                    id="landarea" name="landarea" aria-describedby="basic-addon1"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">Floor
                                                    Area</span>
                                                <input type="text" class="form-control" aria-label="floorarea"
                                                    id="floorarea" name="floorarea" aria-describedby="basic-addon1"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="input-group mb-1">
                                                <span class="input-group-text" id="basic-addon1"># of
                                                    Bedrooms</span>
                                                <input type="text" class="form-control" aria-label="bedrooms"
                                                    id="bedrooms" name="bedrooms" aria-describedby="basic-addon1"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"># of
                                                    Bathrooms</span>
                                                <input type="text" class="form-control" aria-label="bathrooms"
                                                    id="bathrooms" name="bathrooms" aria-describedby="basic-addon1"
                                                    required>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Price</span>
                                        <input type="text" class="form-control" id="price" name="price"
                                            aria-label="Amount (to the nearest peso)" required>
                                        <span class="input-group-text">.00</span>
                                    </div>

                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Description</span>
                                        <textarea class="form-control" aria-label="With textarea" id="description"
                                            name="description" required></textarea>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="inputGroupFile01">Upload</label>
                                        <input type="file" name="image[]" class="form-control" id="inputGroupFile01"
                                            multiple>
                                    </div>
                                    <!----------------------END POST LISTING MODAL FORM--------------------->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!----------------End Modal for Listing Insert---------------------- -->
            </div>
            <hr />
            <div class="row ms-1 mt-5">
                Site Listings
            </div>
            <div class="row ms-1">
                <div class="card mt-3" style="width: 20rem; background: #f1fbff;">
                    <div class="card-body">
                        <h5 class="card-title">Total Number of Listings</h5>
                        <p class="card-text">
                            <i class="bi bi-house-door"></i>
                            <?php echo $totalListings; ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row ms-1 mt-5">
                All Listings
            </div>
            <div class="row mt-3">
                <form class="d-flex" style="width: 60%;">
                    <input class="form-control me-2" type="search" placeholder="Search Listing" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </section>

    <section class="dashboard id="dashboard style="max-width:80%; margin: 0 auto;">
    <div class="container">
    <div class="row justify-content-between align-items-center">
        <table class="table">
            <thead>
                <tr>
                    <th scope="colo" style="width: 20%;"> Listing_ID </th>
                    <th scope="col" style="width: 20%;">Listing Name</th>
                    <th scope="col" style="width: 20%;">Listing Description</th>
                    <th scope="col" style="width: 20%;">Price</th>
                    <th scope="col" style="width: 20%;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM listings";
                $result = mysqli_query($conn, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>' . $row['listing_id']. '</td>';
                        echo '<td>' . $row['title'] . '</td>';
                        echo '<td class="text-truncate" style="max-width: 150px;">' . $row['description'] . '</td>';
                        echo '<td>' . $row['price'] . '</td>';
                        

                    
                    
                    echo '<td>
                    <!-- Button trigger modal -->
                    
                        <button class="btn btn-primary" data-toggle="modal" onclick="openEditModal(' . $row['listing_id'] . ')">Edit</button>
                        <a onClick="javascript: return confirm(\'Please confirm deletion\');" href="delete_listing.php?id=' . $row['listing_id'] . '" class="btn btn-danger">Delete</a>
                    </td>

                   
                    
                    ';                    
                        echo '</tr>';
                        echo '
                            <!-- Modal Edit -->
                            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                        <form>
                                            <div class="modal-body">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">Title</span>
                                                        <input type="text" class="form-control" id="editTitle" name="editTitle"
                                                            aria-label="title" aria-describedby="basic-addon1" required>
                                                    </div>

                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">Location</span>
                                                        <input type="text" class="form-control" id="editLocation" name="editLocation"
                                                            aria-label="location" aria-describedby="basic-addon1" required>
                                                    </div>
                                                            <div class="row">
                                                            <div class="col">
                                                                <div class="input-group mb-1">
                                                                    <span class="input-group-text" id="basic-addon1">Land
                                                                        Area</span>
                                                                    <input type="text" class="form-control" aria-label="landarea"
                                                                        id="editLandarea" name="editLandarea" aria-describedby="basic-addon1"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon1">Floor
                                                                        Area</span>
                                                                    <input type="text" class="form-control" aria-label="floorarea"
                                                                        id="editFloorarea" name="editFloorarea" aria-describedby="basic-addon1"
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="input-group mb-1">
                                                                    <span class="input-group-text" id="basic-addon1"># of
                                                                        Bedrooms</span>
                                                                    <input type="text" class="form-control" aria-label="bedrooms"
                                                                        id="editBedrooms" name="editBedrooms" aria-describedby="basic-addon1"
                                                                        required>
                                                                </div>
                                                        </div>
                                                        <div class="col">
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="basic-addon1"># of
                                                                        Bathrooms</span>
                                                                    <input type="text" class="form-control" aria-label="bathrooms"
                                                                        id="editBathrooms" name="editBathrooms" aria-describedby="basic-addon1"
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">Price</span>
                                                            <input type="text" class="form-control" id="editPrice" name="editPrice"
                                                                aria-label="Amount (to the nearest peso)" required>
                                                            <span class="input-group-text">.00</span>
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">Description</span>
                                                            <textarea class="form-control" aria-label="With textarea" id="editDescription"
                                                                name="editDescription" required></textarea>
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <label class="input-group-text" for="inputGroupFile01">Upload</label>
                                                            <input type="file" name="image[]" class="form-control" id="inputGroupFile01"
                                                                multiple>
                                                        </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <a href="update_listing.php"><button type="button" class="btn btn-primary">Save changes</button></a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        ';
                        
                    }
                } else {
                    echo '<tr><td colspan="4">No listings found.</td></tr>';
                }
                
                ?>

                
            </tbody>
        </table>
    </div>
   
</div>

    <!--------------------JavaScript Sources----------------->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
       
    </script>
    <script src=".\js\script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>