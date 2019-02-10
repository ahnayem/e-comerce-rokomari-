<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        
        <div class="info">
          <p><?php echo $user_name ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <!-- <li class="header"></li> -->
        <!-- Optionally, you can add icons to the links -->

        <li class="active"><a href="index"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

        <?php  

            if ($user_role == 1) {
              

        ?>

        <!-- <li><a href="notice"><i class="fa fa-tag"></i> <span>Notice</span></a></li> -->

        <li class="treeview">
          <a href="#"><i class="fa fa-book"></i> <span>Books</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="book">All Books</a></li>
            <li><a href="book_add">Add Book</a></li>
          </ul>
        </li>
        <li><a href="category"><i class="fa fa-tag"></i> <span>Category</span></a></li>
        <li><a href="publication"><i class="fa fa-newspaper-o"></i> <span>Publication</span></a></li>
        <li><a href="author"><i class="fa fa-user-secret"></i> <span>Author</span></a></li>
        <li><a href="order"><i class="fa fa-truck"></i> <span>Order</span></a></li>
        <li><a href="slider"><i class="fa fa-sliders"></i> <span>Slider</span></a></li>
        <li><a href="users"><i class="fa fa-users"></i> <span>All Users</span></a></li>


        <?php  
            }elseif($user_role == 2) {
              

        ?>


        <li><a href="order"><i class="fa fa-first-order"></i> <span>Order</span></a></li>

        <?php } ?>


      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>