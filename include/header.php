<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="dash.php" class="logo d-flex align-items-center">
      <img src="http://localhost/Campus-Marketplace/Seller/assets/logo.jpg" alt="">
      <span class="d-none d-lg-block">Campus Store</span>
    </a>
  </div><!-- End Logo -->
  
  <form class="d-flex">
    <input class="form-control me-5" type="search" placeholder="Search for Product , Category .." aria-label="Search" style="width: 400px;">
    <button class="btn btn-outline-success" type="submit">Search</button>
  </form>

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center flex-wrap"> <!-- Added flex-wrap class -->
      <li class="nav-item">
        <a class="nav-link nav-icon" href="index2.php" ><i class="bi bi-person-fill"></i> Login</a>
        <ul class="dropdown-menu">
          <li><a href="#">New Registration</a></li>
          <li><a href="#"> <i class="bi bi-person-fill"></i> My Profile</a></li>
          <li><a href="#"> <i class="bi bi-box-seam-fill"></i> My Order</a></li>
        </ul>
      </li>
      <li class="nav-item"><a class="nav-link nav-icon" href="cart.php" > <i class="bi bi-bag-plus-fill"></i> Cart</a></li>

      <li class="nav-item"><a class="nav-link nav-icon" href="cart.php" > <i class="bi bi-arrow-clockwise"></i> Switch to Seller</a></li>
      
    </ul>
  </nav><!-- End Icons Navigation -->
</header><!-- End Header -->


<!-- CSS for the Dropdown -->
<style>
  .dropdown-menu {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    z-index: 1;
  }

  .nav-item:hover .dropdown-menu {
    display: block;
  }

  .dropdown-menu li {
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }

  .dropdown-menu li:hover {
    background-color: #f1f1f1;
  }
</style>
