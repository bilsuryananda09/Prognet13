
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <div class="nav-link">
          <div class="user-wrapper">
            <div class="profile-image">
              <img src="/StarAdmin/images/faces/face1.jpg" alt="profile image">
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
              <a class="nav-link" href="/admin/products">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin/productcategories">Product Categories</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin/productimages">Product Images</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="/admin/couriers">
            <i class="menu-icon fa fa-car"></i>
            <span class="menu-title">Courier</span>
          </a>
        </li>
    </ul>
  </nav>
