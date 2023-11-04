<?php
session_start();
include("insert_listing.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Interasian Realty Services Inc</title>
    <!------ -----CSS files------------->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href=".\css\styles.css">
</head>

<body>
    <!--------------------------NAVBAR------------------------>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="./assets/logo.png" alt="Logo" width="60" height="54" class="d-inline-block align-text-middle">
                Interasian Realty Services Inc.
            </a>
            <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse"
                type="button"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Listings</a>
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
    <!--------------------------CAROUSEL------------------------>
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src=".\assets\carouselIMG1.jpg" class="d-block w-100" alt="..." style="transform: scale(1,1.7);">
                <div class="carousel-caption">
                    <h5>Your Dream House</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, nulla, tempore. Deserunt
                        excepturi quas vero.</p>
                    <p><a href="#about" class="btn btn-warning mt-3">Learn More</a></p>
                </div>
            </div>
            <div class="carousel-item">
                <img src=".\assets\carouselIMG2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <h5>Always Dedicated</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, nulla, tempore. Deserunt
                        excepturi quas vero.</p>
                    <p><a href="#" class="btn btn-warning mt-3">Learn More</a></p>
                </div>
            </div>
            <div class="carousel-item">
                <img src=".\assets\carouselIMG3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <h5>True Construction</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, nulla, tempore. Deserunt
                        excepturi quas vero.</p>
                    <p><a href="#" class="btn btn-warning mt-3">Learn More</a></p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!--------------------------ABOUT SECTION------------------------>
    <section class="about section-padding" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="about-img"><img alt="" class="img-fluid" src=".\assets\logo.png"></div>
                </div>
                <div class="col-lg-8 col-md-12 col-12 ps-lg-5 mt-md-5">
                    <div class="about-text" style="text-align:justify;">
                        <h2>We Provide the Best Quality<br>
                            Services Ever</h2>
                        <p>InterAsian Realty Services Incorporated is a Cebu-based group of licensed real estate brokers
                            and sales agents established in October of 2015. They provide a full array of real estate
                            and brokerage solutions including site selection, land acquisition, and selling of
                            investment property. The company is in need of a platform that they can post and display
                            their listings so that customers and interested clients will be able to conveniently browse
                            through their properties. The real estate brokers have specified that they want to be able
                            to post, edit, and delete listings as they please and that a contact form should be
                            available if customers were interested in inquiring about a particular property.</p><a
                            class="btn btn-warning" href="#">Learn
                            More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!---------------- listings section  -------------------->
    <section class="services section-padding" id="services">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center pb-5">
                        <h2>Listings</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur<br> adipisicing elit. Non, quo.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!---------- PHP Code for dynamic listing cards ---------------->
                <?php
            $query = "SELECT * FROM listings";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                $title = $row["title"];
                $location = $row["location"];
                $landarea = $row["landarea"];
                $floorarea = $row["floorarea"];
                $bedrooms = $row["bedrooms"];
                $bathrooms = $row["bathrooms"];
                $price = $row["price"];
                $description = $row["description"];
                $imagePaths = explode(',', $row["image"]);
                $firstImagePath = isset($imagePaths[0]) ? $imagePaths[0] : 'uploads/default.jpg'; 

                echo '
                <div class="col-12 col-md-12 col-lg-4 mb-5">
                    <div class="card text-center pb-2">
                        <div class="card-body">
                            <img src="' . $firstImagePath . '" alt="Listing Image" class="img-fluid mb-3" style="height: 250px; width: 380px;">
                            <h4 class="card-title" style="letter-spacing:-1px; font-family:arial;">' . $title . '</h4>
                            <p class="lead" style="letter-spacing:-1px; font-family:arial;">' . $location . '</p>
                            <button class="btn bg-warning text-dark" onclick="openModal(\'listing-' . $row["listing_id"] . '\')">Learn More</button>
                        </div>
                    </div>
                </div>
                ';
                //modal for more info
                echo '
                <!-- Modal for listing-' . $row["listing_id"] . ' -->
                <div class="modal fade" id="listing-' . $row["listing_id"] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" id="listingsmodal">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">' . $title . ' </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div id="carouselListing-' . $row["listing_id"] . '" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner" style="height: 250px;">
                                        ';
                foreach ($imagePaths as $index => $imagePath) {
                    $activeClass = ($index === 0) ? 'active' : '';
                    echo '
                                        <div class="carousel-item ' . $activeClass . '">
                                            <img src="' . $imagePath . '" class="d-block w-100" style="height: 250px; width: 100%; padding-bottom:20px;">
                                        </div>
                                        ';
                }
                echo '
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselListing-' . $row["listing_id"] . '" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselListing-' . $row["listing_id"] . '" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                                <p>' . $description . '</p>
                               <table>
                               <tr>
                                <td class="pe-5"><p><b>Location:</b> ' . $location . '</p></td>
                                <td><p><b>Land Area:</b> ' . $landarea . '</p></td>
                                </tr><tr>
                                <td><p><b>Floor Area:</b> ' . $floorarea . '</p></td>
                                <td><p><b>Bedrooms:</b> ' . $bedrooms . '</p></td>
                                </tr><tr>
                                <td><p><b>Bathrooms:</b> ' . $bathrooms . '</p></td>
                                <td><p><b>Price:</b> ₱' . $price . '.00</p></td>
                                </tr>
                                <tr>
                                <td><p>Contact us <a href="#contact">here</a> if interested!</p></td>
                                </tr>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <!-- Add other modal actions as needed -->
                            </div>
                        </div>
                    </div>
                </div>
                ';
            }
            mysqli_close($conn);
            ?>
            </div>
        </div>
    </section>
    <!-----------------Contact Section --------------->
    <section class="contact section-padding" id="contact">
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center pb-5">
                        <h2>Contact Us</h2>
                        <center>
                            <div class="divider"></div>
                        </center>
                        <p><i>Contact form is currently undergoing server maintenance.</i><br><br>
                            Feel free to contact us through these platforms!<br>
                            <b>Facebook Page:</b> <a href="https://www.facebook.com/cebuxrealty">InterAsian Realty
                                Services
                                Inc</a><br>
                            <b>Mobile Phone:</b> +63 967 243 9625
                        </p>
                    </div>
                </div>
            </div>
            <div class="row m-0">
                <div class="col-md-12 p-0 pt-4 pb-4">
                    <form action="" method="post" class="p-4 m-auto">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <input class="form-control" placeholder="Full Name (Temporarily Unavailable)"
                                        required="" type="text" disabled>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <input class="form-control" placeholder="Email (Temporarily Unavailable)"
                                        required="" type="email" disabled>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <textarea class="form-control" placeholder="Message (Temporarily Unavailable)"
                                        required="" rows="3" disabled></textarea>
                                </div>
                            </div>
                            <button class="btn btn-warning btn-lg btn-block mt-3" type="button" disabled>Send
                                Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!--------------------footer seciton ------------------->
    <footer class="bg-dark p-2 text-center">
        <div class="container">
            <p class="text-white">All Rights Reserved By INTERASIAN REALTY SERVICES INC.</p>
        </div>
    </footer>


    <!--------------------JavaScript----------------->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src=".\js\script.js"></script>
</body>

</html>