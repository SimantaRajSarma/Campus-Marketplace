<?php

$servername="localhost";

$username="root";

$password="";

$dbname="campus_marketplace";

$conn=mysqli_connect($servername,$username,$password,$dbname);

if($conn)

{

    echo"";

}

else

{

    die("error in connection".mysqli_connect_error());

}



?>



