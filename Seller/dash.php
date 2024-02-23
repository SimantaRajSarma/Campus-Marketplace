
<?php
session_start();
include("include/connection.php");

if (!isset($_SESSION["admin_id"])) {
    header("location:index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Campus Marketplace</title>
  <meta name="robots" content="noindex, nofollow">
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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

</head>

<body>
<?php
include('include/header.php');
?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Customer <span>| Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people-fill"></i>
                    </div>
                    <div class="ps-3">
                      <!-- Assuming your HTML structure -->
<h6>
<?php

// Fetch total number of medicines from the 'medicine' table
$sql = "SELECT COUNT(*) AS total_users FROM users"; // Replace 'medicine' with your actual table name
$result = $conn->query($sql);

if ($result->num_rows > 0) {
$row = $result->fetch_assoc();
$total_students = $row["total_users"];
echo $total_students;
} else {
echo "0"; // If there are no medicines in the table
}

?>
</h6>

                      
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

           


              <!-- Revenue Card -->
              <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">


                <div class="card-body">
                  <h5 class="card-title">Product <span>| Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-question-circle-fill"></i>
                    </div>
                    <div class="ps-3">
                    <h6>

                    <?php

// Fetch total number of medicines from the 'medicine' table
$sql = "SELECT COUNT(*) AS total_product FROM items"; // Replace 'medicine' with your actual table name
$result = $conn->query($sql);

if ($result->num_rows > 0) {
$row = $result->fetch_assoc();
$total_inquiries = $row["total_product"];
echo $total_inquiries;
} else {
echo "0"; // If there are no medicines in the table
}

?>
</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->


            
              <!-- Revenue Card -->
              <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">


                <div class="card-body">
                  <h5 class="card-title">Seller<span> | Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-journal-album"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
    0
 </h6>


                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            

            





            








          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">


        <!-- Total Sales -->
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Gyandeep</h5>

        <div class="activity">
           
        Choosing Coachdrpd opens doors to a wider range of possibilities and enhances one's ability to navigate the complexities.Answer in Life what is Next.
        1.For Complete Holistic Development of a Child
2.Get Education in a single Platform.
3.Academic Education is essential for
# Personal growth, # Development and # Acquiring the knowledge and
4.Skills needed for various opportunities in life. # It empowers individuals, #Fosters critical thinking, and # contributes to societal progress.
        </div>
    </div>
</div><!-- End Total Sales -->



        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->
<?php

include('include/footer.php');
?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>