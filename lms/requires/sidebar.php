 <!-- Sidebar -->
 <ul class="sidebar navbar-nav ">
<div class="side">
  <!-- <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li> -->

      <?php
      
      $menu=$app_user->getMenu($_SESSION['user_id']);

      while($m = mysqli_fetch_array($menu)){
        echo '
        <li class="nav-item active">
        <a class="nav-link" href="'.$m['menu_url'].'">
          <i class="fas fa-fw '.$m['icon'].' "></i>
          <span>'.$m['menu_name'].'</span>
        </a>
      </li>
        ';
      }
      
      
      
      ?>

      

     
</div>
      
    </ul>