<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['adminid'] == 0)) {
    header('location:logout.php');
} else {

    ?>

    <?php
    if (isset($_GET['editid'])) {
        $gallery_id = $_GET['editid'];

        $fetch_record = "SELECT * from `gallery` where `gallery_id` = '$gallery_id'";
        $record_result = mysqli_query($con, $fetch_record);
        if ($record_result) {
            if (mysqli_num_rows($record_result) > 0) {
                ?>

                <!DOCTYPE html>

                <head>
                    <title>EAHP|| Add Gallery </title>

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
                                <div class="form-w3layouts">
                                    <!-- page start-->


                                    <div class="row">
                                        <div class="col-lg-12">
                                            <section class="panel">
                                                <header class="panel-heading">
                                                    Add Gallery
                                                    <span class="tools pull-right">
                                                        <a class="fa fa-chevron-down" href="javascript:;"></a>
                                                        <a class="fa fa-cog" href="javascript:;"></a>
                                                        <a class="fa fa-times" href="javascript:;"></a>
                                                    </span>
                                                </header>
                                                <div class="panel-body">
                                                    <div class="form">

                                                        <form class="cmxform form-horizontal " method="post"
                                                            action="gallery-updatedata.php" enctype="multipart/form-data">
                                                            <?php
                                                            while ($row = mysqli_fetch_assoc($record_result)) {
                                                                ?>
                                                                <div class="form-group ">
                                                                    <label for="adminname" class="control-label col-lg-3">Name</label>
                                                                    <div class="col-lg-6">
                                                                        <input class="form-control" id="galleryid" name="galleryid"
                                                                            type="hidden" required="true"
                                                                            value="<?php echo $row["gallery_id"] ?>">
                                                                        <input class=" form-control" id="name" name="name" type="text"
                                                                            required="true" value="<?php echo $row["gallery_name"] ?>">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group ">
                                                                    <label for="adminname" class="control-label col-lg-3">Image</label>
                                                                    <div class="col-lg-6">
                                                                        <input class="form-control" id="img" name="img" type="file"
                                                                            required="true" value="<?php echo $row["gallery_img"] ?>">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="col-lg-offset-3 col-lg-6">
                                                                        <p style="text-align: center;"> <input class="btn btn-primary"
                                                                                type="submit" name="galleryupdate" value="Update"></p>
                                                                        <?php
                                                            }
            }
        }
    }
    ?>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>

                                </section>
                            </div>
                        </div>
                        <!-- page end-->
                    </div>

                </section>
                <!-- footer -->
                <?php include_once('includes/footer.php'); ?>
                <!-- / footer -->
            </section>

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