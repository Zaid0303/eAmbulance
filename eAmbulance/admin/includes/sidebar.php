<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');


?>
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                
                <?php
                // Admin can see everything
                if ($_SESSION['role'] == 'admin') {
                ?>
                <li>
                    <a class="active" href="dashboard.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Ambulance</span>
                    </a>
                    <ul class="sub">
                        <li><a href="add-ambulance.php">Add Ambulance</a></li>
                        <li><a href="manage-ambulance.php">Manage Ambulance</a></li>
                    </ul>
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-files-o"></i>
                        <span>Ambulance Request</span>
                    </a>
                    <ul class="sub">
                        <li><a href="new-ambulance-request.php">New Request</a></li>
                        <li><a href="assign-ambulance-request.php">Assigned Request</a></li>
                        <li><a href="rejected-ambulance-request.php">Rejected Request</a></li>
                        <li><a href="ontheway-ambulance-request.php">On The Way</a></li>
                        <li><a href="pickup-ambulance-request.php">Pickup</a></li>
                        <li><a href="reached-ambulance-request.php">Reached Hospital</a></li>
                        <li><a href="all-amublance-request.php">All Requests</a></li>
                    </ul>
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-list-alt"></i>
                        <span>Category</span>
                    </a>
                    <ul class="sub">
                        <li><a href="add-category.php"><i class="fa fa-plus-circle"></i> Add Category</a></li>
                        <li><a href="manage-category.php"><i class="fa fa-tasks"></i> Manage Category</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-image"></i>
                        <span>Gallery</span>
                    </a>
                    <ul class="sub">
                        <li><a href="add-gallery.php"><i class="fa fa-plus-circle"></i> Add Gallery</a></li>
                        <li><a href="manage-gallery.php"><i class="fa fa-tasks"></i> Manage Gallery</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-cogs"></i>
                        <span>Service</span>
                    </a>

                    <ul class="sub">
                        <li><a href="add-service.php"><i class="fa fa-plus-circle"></i> Add Service</a></li>
                        <li><a href="manage-service.php"><i class="fa fa-tasks"></i> Manage Service</a></li>
                    </ul>
                </li>


                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-file"></i>
                        <span>Pages</span>
                    </a>
                    <ul class="sub">
                        <li><a href="about-us.php">About us</a></li>
                        <li><a href="contact-us.php">Contact us</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="ambulance-request-report.php">
                        <i class="fa fa-files-o"></i>
                        <span>B/D Reports of Request</span>
                    </a>
                </li>
                
                <li>
                    <a href="search.php">
                        <i class="fa fa-search"></i>
                        <span>Search Request</span>
                    </a>
                </li>

                <?php
                // Driver can only see Dashboard and Ambulance Request sections
                } elseif ($_SESSION['role'] == 'driver') {
                ?>
                
                <li>
                    <a class="active" href="dashboard.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-files-o"></i>
                        <span>Ambulance Request</span>
                    </a>
                    <ul class="sub">
                        <li><a href="new-ambulance-request.php">New Request</a></li>
                        <li><a href="assign-ambulance-request.php">Assigned Request</a></li>
                        <li><a href="rejected-ambulance-request.php">Rejected Request</a></li>
                        <li><a href="ontheway-ambulance-request.php">On The Way</a></li>
                        <li><a href="pickup-ambulance-request.php">Pickup</a></li>
                        <li><a href="reached-ambulance-request.php">Reached Hospital</a></li>
                        <li><a href="all-amublance-request.php">All Requests</a></li>
                    </ul>
                </li>
                
                <?php
                }
                ?>
            </ul>
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
