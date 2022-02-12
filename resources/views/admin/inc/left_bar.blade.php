  <!-- ########## START: LEFT PANEL ########## -->
  <div class="sl-logo"><a href=""><i class="icon ion-android-star-outline"></i> starlight</a></div>
    <div class="sl-sideleft">
      <div class="input-group input-group-search">
        <input type="search" name="search" class="form-control" placeholder="Search">
        <span class="input-group-btn">
          <button class="btn"><i class="fa fa-search"></i></button>
        </span><!-- input-group-btn -->
      </div><!-- input-group -->

      <label class="sidebar-label">Navigation</label>
      <div class="sl-sideleft-menu">

        <a href="{{url('/')}}" target="_blank" class="sl-menu-link @yield('/')">
            <div class="sl-menu-item">
              <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
              <span class="menu-item-label">Visit Website</span>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

        <a href="{{route('admin.dashboard')}}" class="sl-menu-link @yield('dashboard')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Dashboard</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

        <a href="{{route('sliders')}}" class="sl-menu-link @yield('sliders')" >
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Slider</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

        <a href="{{route('brands')}}" class="sl-menu-link @yield('brands')" >
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Brand</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

        <a href="#" class="sl-menu-link  @yield('categorys')">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label">Categoy</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

        <ul class="sl-menu-sub nav flex-column">

          <li class="nav-item"><a href="{{route('categorys')}}" class="nav-link @yield('add_category')">Add Catetory</a></li>
          <li class="nav-item"><a href="{{route('subcategorys')}}" class="nav-link @yield('sub_category')">Sub Category</a></li>
          <li class="nav-item"><a href="{{route('subsubcategorys')}}" class="nav-link @yield('sub_sub_categorys')">Sub Sub Category</a></li>

        </ul>



          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

        <a href="#" class="sl-menu-link  @yield('product')">
            <div class="sl-menu-item">
              <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
              <span class="menu-item-label">Product</span>
              <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->

          <ul class="sl-menu-sub nav flex-column">

            <li class="nav-item"><a href="{{route('add_product')}}" class="nav-link @yield('add_product')">Add Product</a></li>
            <li class="nav-item"><a href="{{route('product.manage')}}" class="nav-link @yield('manage_product')">Manage Product</a></li>

          </ul>



            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->


      </div><!-- sl-sideleft-menu -->

      <br>
    </div><!-- sl-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->
