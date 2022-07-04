<?php 
$page = end(explode("/",$_SERVER["PHP_SELF"]));
?>

<div class="div-only-mobile"></div>

<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse <?=$page=='vcfbuilder.php' || $page=='walletbuilder.php'?'':'vh-100';?>" style="background-color:blueviolet;">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item ms-3">
            <a class="nav-link ps-3 <?=$page=='dashboard.php'?'active':'';?>" aria-current="page" href="dashboard.php" style="color:white;">
            <i class="fas fa-home"></i>
              Dashboard
            </a>
          </li>
          <hr id="sidebar-separator">
          <li class="nav-item ms-3 mb-1">
            <a class="nav-link ps-3 <?=$page=='vcfbuilder.php'?'active':'';?>" href="vcfbuilder.php">
              <span data-feather="file"></span>
              VCF Builder
            </a>
          </li>
          <li class="nav-item ms-3 mb-1">
            <a class="nav-link ps-3 <?=$page=='walletbuilder.php'?'active':'';?>" href="walletbuilder.php">
              Wallet Builder
            </a>
          </li>
          <li class="nav-item ms-3 mb-1">
            <a class="nav-link ps-3 <?=$page=='page3.php'?'active':'';?>" href="page3.php">
              Page 3
            </a>
          </li>
          <hr id="sidebar-separator">
          <li class="nav-item ms-3 mb-1">
            <a class="nav-link ps-3" href="logout.php">
              <i class="fas fa-sign-out-alt"></i>
              Logout
            </a>
          </li>
        </ul>
    </ul>
      </div>
    </nav>