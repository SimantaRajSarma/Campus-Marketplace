<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="images/logocec.png" />
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Campus Marketplace</title>

<!-- Favicons -->
<link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
<style>

.carousel-inner img {
    max-height: 500px; /* Adjust the height as needed */
    width: auto;
}

</style>
</head>

<body>
  

<?php

include('include/header.php');
?>


<br>

<section class="sec1"   >
    
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" >
    <div class="carousel-indicators" >
        <?php
            include('include/connection.php');

            $sql = "SELECT * FROM carousel_images";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $counter = 0;
                while($row = $result->fetch_assoc()) {
                    $activeClass = ($counter == 0) ? 'active' : '';
                    echo '<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="' . $counter . '" class="' . $activeClass . '" aria-label="Slide ' . ($counter + 1) . '"></button>';
                    $counter++;
                }
            }

            $conn->close();
        ?>
    </div>


    <div class="carousel-inner">
        <?php
            include('include/connection.php');

            $sql = "SELECT * FROM carousel_images";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $counter = 0;
                while($row = $result->fetch_assoc()) {
                    $activeClass = ($counter == 0) ? 'active' : '';
                    echo '<div class="carousel-item ' . $activeClass . '">';
                    echo '<img src="' . $row["image_source"] . '" class="d-block w-100" alt="..." >';
                    echo '</div>';
                    $counter++;
                }
            }

            $conn->close();
        ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


    

</section>
<br>
<section>
    <!-- Category Section -->
    <div class="card">
        <div class="card-body">
            <br><br>
            <div class="category-section row">
                <?php
                include('include/connection.php');

                $sql = "SELECT * FROM categories";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        ?>
                        <!-- Category -->
                        <div class="category col-md-3 text-center">
                            <img src="<?php echo $row["img_url"]; ?>" width="150px" alt="<?php echo $row["category_name"]; ?>" class="img-fluid rounded-circle">
                            <h5 class="card-title text-center"><?php echo $row["category_name"]; ?></h5>
                        </div>
                        <?php
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
            </div>
        </div>
    </div>
</section>

<br>


<section>

<h1 class="text-center">Our Products</h1>
<br>

<div class="container">
  <div class="row">
  <?php
include('include/connection.php');

$sql = "SELECT items.*, GROUP_CONCAT(item_images.image_url) AS image_urls
        FROM items
        JOIN item_images ON items.item_id = item_images.item_id
        GROUP BY items.item_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $image_urls = explode(',', $row['image_urls']);
        ?>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <?php if (count($image_urls) > 1) { ?>
                    <div id="carousel<?php echo $row['item_id']; ?>" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php
                            foreach ($image_urls as $key => $image_url) {
                                $active_class = ($key == 0) ? 'active' : '';
                                ?>
                                <div class="carousel-item <?php echo $active_class; ?>">
                                    <img class="d-block w-100" src="Seller/assets/products_images/<?php echo $image_url; ?>" alt="Slide <?php echo $key + 1; ?>">
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel<?php echo $row['item_id']; ?>" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carousel<?php echo $row['item_id']; ?>" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                <?php } else { ?>
                    <img class="card-img-top" src="<?php echo $image_urls[0]; ?>" alt="" >
                <?php } ?>
                <div class="card-body">
                    <h4 class="card-title"><?php echo $row["title"]; ?></h4>
                    <p class="card-text"><?php echo $row["description"]; ?></p>
                </div>
                <div class="card-footer">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-primary">Buy Now</button>
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <button type="button" class="btn btn-success">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
} else {
    echo "0 results";
}
$conn->close();
?>

    
    <!-- Repeat the above code for each product -->
    
  </div>
</div>

        </section>




  <!-- Vendor JS Files -->

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
