<?php

// session_start();
// if (!isset($_SESSION["username"])) {
//     header("location:login");
//     exit();
// }
?>
<?php 

	include("include/connection.php");


	$product_id=@$_GET['id'];


	$query="DELETE FROM items WHERE item_id='$product_id'";


	$data=mysqli_query($conn,$query);


        if($data)


        {


          echo "<script>alert('Product Deleted Successfully'); window.location.href = 'manage_product.php';</script>";


        }


        else


        {


             echo"<script>alert('error')</script>";


        }


?>