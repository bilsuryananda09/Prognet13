
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <div class="nav-link">
          <div class="user-wrapper">
            <div class="profile-image">
              <img src="StarAdmin/images/faces/face1.jpg" alt="profile image">
            </div>
            <div class="text-wrapper">
              <p class="profile-name">{{Auth::guard('admin')->user()->name}}</p>
              <div>
                <small class="designation text-muted">Admin</small>
                <span class="status-indicator online"></span>
              </div>
            </div>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/admin">
          <i class="menu-icon fa fa-desktop"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#products" aria-expanded="false" aria-controls="products">
          <i class="menu-icon fa fa-briefcase"></i>
          <span class="menu-title">Products</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="products">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="products">View Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="productcategories">Product Categories</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/ui-features/typography.html">Product Images</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#courier" aria-expanded="false" aria-controls="courier">
          <i class="menu-icon fa fa-car"></i>
          <span class="menu-title">Courier</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="courier">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="couriers">View Courier</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="couriers/create">Create Courier</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/forms/basic_elements.html">
          <i class="menu-icon mdi mdi-backup-restore"></i>
          <span class="menu-title">Form elements</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/charts/chartjs.html">
          <i class="menu-icon mdi mdi-chart-line"></i>
          <span class="menu-title">Charts</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/tables/basic-table.html">
          <i class="menu-icon mdi mdi-table"></i>
          <span class="menu-title">Tables</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/icons/font-awesome.html">
          <i class="menu-icon mdi mdi-sticker"></i>
          <span class="menu-title">Icons</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="menu-icon mdi mdi-restart"></i>
          <span class="menu-title">User Pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/samples/login.html"> Login </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/samples/register.html"> Register </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/samples/error-404.html"> 404 </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/samples/error-500.html"> 500 </a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </nav>
