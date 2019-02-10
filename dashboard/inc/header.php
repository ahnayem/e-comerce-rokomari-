  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>R</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>ROKOMARI</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <li>
            
              <a href="../index"> <i class="fa fa-user-secret"></i> Go To Live Site</a>
          </li>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
                
                <?php 
                  if (empty($user_image)) {
                    

                ?>

                <img src="assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  
                <?php 
                  }else{

                  
                ?>

                <img src="uploads/profile/<?php echo($user_image) ?>" class="img-circle user-image" alt="User Image">

                <?php 
                  }
                ?>

              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $user_name ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                
                <?php 
                  if (empty($user_image)) {
                    

                ?>

                <img src="assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                  
                <?php 
                  }else{

                  
                ?>

                <img src="uploads/profile/<?php echo($user_image) ?>" class="img-circle" alt="User Image">

                <?php 
                  }
                ?>

                <p>
                  <?php echo $user_name ?>
                  <small>Joining Date : <?php echo $user_joining_date ?></small>
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="signout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>


          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>

        </ul>
      </div>
    </nav>
  </header>