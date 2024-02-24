
<?php
// session_start();

// if (!isset($_SESSION["admin_id"])) {
//     header("location:index.php");
//     exit();
// }

?>

<?php
include("include/connection.php");
// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get form data
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $category = $_POST['category'];

    $seller_id = 1;

    // File upload handling
$uploadDir = 'assets/products_images/'; // upload directory (Note the trailing slash)
$uploadedFiles = [];
$errors = [];

if (!empty($_FILES['images']['name'][0])) {
    // Loop through each file
    foreach ($_FILES['images']['name'] as $key => $value) {
        $fileName = uniqid() . '_' . mt_rand(1000, 9999) . '_' . basename($_FILES['images']['name'][$key]);
        $targetFilePath = $uploadDir . $fileName;

        // Check if file already exists
        if (file_exists($targetFilePath)) {
            $errors[] = "File {$fileName} already exists.";
        } else {
            // Upload file
            if (move_uploaded_file($_FILES['images']['tmp_name'][$key], $targetFilePath)) {
                $uploadedFiles[] = $fileName;
            } else {
                $errors[] = "Failed to upload file {$fileName}.";
            }
        }
    }
} else {
    $errors[] = 'Please select at least one image.';
}


    // Check if there are any errors
    if (empty($errors)) {
        // Insert product details into the database
        $stmt = $conn->prepare("INSERT INTO items (seller_id, title, description, price, category_id, status, created_at) 
                                  VALUES (?, ?, ?, ?, ?, 'available', NOW())");
        $stmt->bind_param("issdi", $seller_id, $product_name, $description, $price, $category);

        if ($stmt->execute()) {
            // Insert item images into the item_images table
            $item_id = $conn->insert_id;
            foreach ($uploadedFiles as $file) {
                $stmt = $conn->prepare("INSERT INTO item_images (item_id, image_url) VALUES (?, ?)");
                $stmt->bind_param("is", $item_id, $file);
                $stmt->execute();
            }

            // Display success message
            $alertMessage = 'Product added successfully.';
            $alertClass = 'alert-success';
        } else {
            // Display error message
            $alertMessage = 'Error: Unable to add product.';
            $alertClass = 'alert-danger';
        }
    } else {
        // Display error messages
        $alertMessage = implode('<br>', $errors);
        $alertClass = 'alert-danger';
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title></title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <script type="text/javascript" src="../lib/jquery.js"></script>
    <script type="text/javascript" src="../lib/main.js"></script>
  
</head>
<body>
<?php include('include/header.php');  ?>

  
<main id="main" class="main">



<!-- Include the HTML template -->
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Add Product</h5>
                    <?php if (isset($alertMessage)): ?>
                        <div class="alert <?php echo $alertClass; ?> alert-dismissible fade show" role="alert">
                            <?php echo $alertMessage; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?> 
                    <!-- Vertical Form -->
                    <form class="row g-3" method="post" enctype="multipart/form-data" action="">
                        <div class="col-6">
                            <label for="product_name" class="form-label fw-bold">Product Name :</label>
                            <input type="text" class="form-control" name="product_name" placeholder="Enter Product Name" required>
                        </div>
                        <div class="col-6">
                            <label for="price" class="form-label fw-bold">Price:</label>
                            <input class="form-control" type="number" name="price" min="0" step="0.01" required>
                        </div>
                        <div class="col-6">
                            <label for="description" class="form-label fw-bold">Description :</label>
                            <textarea rows="3" class="form-control" name="description" required></textarea>
                        </div>
                        <div class="col-6">
                            <label for="price" class="form-label fw-bold">Category:</label>
                            <select name="category" class="form-control" required>
                                <option selected disabled>Choose..</option>
                                <!-- Fetch categories from the database and populate the dropdown -->
                                <?php
                                // Fetch categories from the database
                                $sql = "SELECT * FROM categories";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value=\"{$row['category_id']}\">{$row['category_name']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="images" class="form-label fw-bold">Images <span class="text-danger">(Select Multiple)</span> :</label>
                            <input type="file" class="form-control" name="images[]" multiple accept="image/*" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-lg btn-primary">Submit</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

</main><!-- End #main -->


  <?php include('include/footer.php');  ?>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

   <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/sweetalert2/sweetalert2.all.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
