 <!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="s-dash.php" class="logo d-flex align-items-center">
    <img src="assets/logo.png" alt="">
    <span class="d-none d-lg-block">Campus Marketplace</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->



<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

    <li class="nav-item d-block d-lg-none">
      <a class="nav-link nav-icon search-bar-toggle " href="#">
        <i class="bi bi-search"></i>
      </a>
    </li><!-- End Search Icon-->

    <li class="nav-item dropdown">

      <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-bell"></i>
        <span class="badge bg-primary badge-number">0</span>
      </a>
      <!-- End Notification Icon -->

      <!-- End Notification Dropdown Items -->

    </li><!-- End Notification Nav -->

    <li class="nav-item dropdown">

      <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-chat-left-text"></i>
        <span class="badge bg-success badge-number">0</span>
      </a><!-- End Messages Icon -->

      <!-- End Messages Dropdown Items -->

    </li><!-- End Messages Nav -->

    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <img src="assets/logo.jpg" alt="Profile" class="rounded-circle bg-dark">
       
        <span class="d-none d-md-block dropdown-toggle ps-2">CM</span>

      </a><!-- End Profile Iamge Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6>Campus Marketplace</h6>
          <span>Seller</span>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <i class="bi bi-person"></i>
            <span>My Profile</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <i class="bi bi-gear"></i>
            <span>Account Settings</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <i class="bi bi-question-circle"></i>
            <span>Need Help?</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="logout.php">
            <i class="bi bi-box-arrow-right"></i>
            <span>Sign Out</span>
          </a>
        </li>

      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->


</header><!-- End Header -->


<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="dash.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      
      <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
            <i class="fa-solid fa-box"></i><span>Product Management</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                
                  <li class="nav-item">
            <a class="nav-link collapsed" href="add_product.php">
            <i class="bi bi-circle"></i>
              <span>Add Product</span>
            </a>
          </li><!-- End Register Page Nav -->
          
                
                  <li class="nav-item">
            <a class="nav-link collapsed" href="manage_product.php">
            <i class="bi bi-circle"></i>
              <span>Manage Product</span>
            </a>
          </li><!-- End Register Page Nav -->
               
                </ul>
                </li>

                <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav34" data-bs-toggle="collapse" href="#">
            <i class="fa-solid fa-box-open"></i><span>Manage Orders</span><i class="fa-solid fa-lock ms-auto"></i></i>
            </a>
            <ul id="components-nav2" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                
                  <li class="nav-item">
            <a class="nav-link collapsed" href="new_orders.php">
            <i class="bi bi-circle"></i>
              <span>New Orders</span>
            </a>
          </li><!-- End Register Page Nav -->
          
                
                  <li class="nav-item">
            <a class="nav-link collapsed" href="completed_orders.php">
            <i class="bi bi-circle"></i>
              <span>Completed Orders</span>
            </a>
          </li><!-- End Register Page Nav -->
               
                </ul>
                </li>
     
                <li class="nav-item">
            <a class="nav-link collapsed" href="#">
            <i class="fa-solid fa-star"></i>
              <span>View Reviews</span>
              <i class="fa-solid fa-lock ms-auto"></i>
            </a>
          </li>


      <li class="nav-item">
            <a class="nav-link collapsed" href="#">
            <i class="fa-solid fa-right-from-bracket"></i>
              <span>Change Password</span>
              <i class="fa-solid fa-lock ms-auto"></i>
            </a>
          </li>

      <li class="nav-item">
            <a class="nav-link collapsed" href="#">
            <i class="bi bi-box-arrow-left"></i>
              <span>Log Out</span>
              <i class="fa-solid fa-lock ms-auto"></i>
            </a>
          </li>
      <!-- End Profile Page Nav -->
</ul>
  </aside><!-- End Sidebar-->