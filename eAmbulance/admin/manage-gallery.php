<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['adminid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_GET['del'])) {
        $rid = $_GET['del'];
        $query = mysqli_query($con, "delete from gallery  where gallery_id='$rid'");
        echo "<script>alert('Data Deleted');</script>";
    }

    ?>

    <!DOCTYPE html>

    <head>
        <title>EAHP|| Manage Gallery </title>
        <script
            type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- bootstrap-css -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- //bootstrap-css -->
        <!-- Custom CSS -->
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <link href="css/style-responsive.css" rel="stylesheet" />
        <!-- font CSS -->
        <link
            href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
            rel='stylesheet' type='text/css'>
        <!-- font-awesome icons -->
        <link rel="stylesheet" href="css/font.css" type="text/css" />
        <link href="css/font-awesome.css" rel="stylesheet">
        <!-- //font-awesome icons -->
        <script src="js/jquery2.0.3.min.js"></script>
    </head>

    <body>
        <section id="container">
            <!--header start-->
            <?php include_once('includes/header.php'); ?>
            <!--header end-->
            <!--sidebar start-->
            <?php include_once('includes/sidebar.php'); ?>
            <!--sidebar end-->
            <!--main content start-->
            <section id="main-content">
                <section class="wrapper">
                    <div class="table-agile-info">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Manage Gallery
                            </div>
                            <div>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th data-breakpoints="xs">Gallery Name</th>                        
                                            <th>Gallery Image</th>
                                            <th data-breakpoints="xs">Action</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $ret = mysqli_query($con, "select * from gallery");
                                    $cnt = 1;
                                    while ($row = mysqli_fetch_array($ret)) {

                                        ?>
                                        <tbody>
                                            <tr data-expanded="true">
                                    
                                                <td><?php echo $row['gallery_name']; ?></td>
                                                <td> <img src="<?php echo '../assets/img/gallery-img/' . $row["gallery_img"] ?>"
                                                height="60px" width="80px" alt="img"></td>
                                                <td><a title="Edit" href="edit-gallery.php?editid=<?php echo $row['gallery_id']; ?>"
                                                        class="btn btn-primary px-1">Edit</a>
                                                    <a title="Delete" href="manage-gallery.php?del=<?php echo $row['gallery_id']; ?>"
                                                        class="btn btn-danger px-1">Delete</a>
                                            </tr>
                                            <?php
                                            $cnt = $cnt + 1;
                                    } ?>
                                    </tbody>
                                </table>



                            </div>
                        </div>
                    </div>
                </section>
                <!-- footer -->
                <?php include_once('includes/footer.php'); ?>
                <!-- / footer -->
            </section>

            <!--main content end-->
        </section>
        <script src="js/bootstrap.js"></script>
        <script src="js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="js/scripts.js"></script>
        <script src="js/jquery.slimscroll.js"></script>
        <script src="js/jquery.nicescroll.js"></script>
        <script src="js/jquery.scrollTo.js"></script>
    </body>

    </html>
<?php } ?>