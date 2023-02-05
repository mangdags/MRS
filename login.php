<?php
    include('connection.php');//get configuration file
    ob_start();
    session_start();
    $session=session_id();
    $con = openConnection();
    
?>
<?php 
    function checkifexist($fieldvalue){
        global $con;
        $query="SELECT ad_email FROM his_admin WHERE ad_email='{$fieldvalue}'";
        $result = mysqli_query($con, $query);
        $num_rows = mysqli_num_rows($result);
        return $num_rows;
    }
     //Get User By ID
    function getclientid($ad_email){
        global $con;
        $query="SELECT * FROM his_admin WHERE ad_email='{$ad_email}'";
        $result = mysqli_query($con, $query);
        $result_set=mysqli_fetch_array($result);
        return $result_set;
    }
    //Confirm Login
    function confirm_login($ad_email,$ad_pwd){
        global $con;
        $query="SELECT * FROM his_admin WHERE ad_email='{$ad_email}' AND ad_pwd='{$ad_pwd}'";
        $result = mysqli_query($con, $query);
        $num_rows = mysqli_num_rows($result);
        return $num_rows;
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $ad_email = $_POST['ad_email'];
        $ad_pwd = sha1(md5($_POST['ad_pwd']));
        //Check Email If Exist
        $checkemail = checkifexist($ad_email);
        if ($checkemail == 1){
            $confirm = confirm_login($ad_email,$ad_pwd);
            if($confirm == 1){
                $getuser = getclientid($ad_email);
                $_SESSION['ad_id']= $getuser['ad_id'];
                $_SESSION['status'] = $getuser['status'];
                $_SESSION['uname'] = $getuser['ad_email'];
                echo $_SESSION['status'];
                if ($getuser['status']=="1") {
                    header("location:backend/admin/his_admin_dashboard.php");
                }
                elseif($getuser['status']=="2") {
                     header("Location: backend/doctor/his_admin_dashboard.php");
                }
                elseif($getuser['status']=="3") {
                     header("Location: backend/nurse/his_admin_dashboard.php");
                }
                elseif($getuser['status']=="4") {
                     header("Location: backend/MEDICAL-RECORDS/his_admin_dashboard.php");
                }
                elseif($getuser['status']=="5") {
                     header("Location: backend/LABORATORY/his_admin_dashboard.php");
                }
                elseif($getuser['status']=="6") {
                     header("Location: backend/FD/his_admin_dashboard.php");
                }
                elseif($getuser['status']=="8") {
                     header("Location: backend/IT/his_admin_dashboard.php");
                }
            } 
            else{
                $err = "Access Denied Please Check Your Credentials";
            }
        } else {
            $err = "Access Denied Please Check Your Credentials";
        }
    }
?>
<!--End Login-->
<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8" />
        <title>MEDICAL RECORD SYSTEM</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="" name="MartDevelopers" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="backend/admin/assets/images/favicon.ico">

        <!-- App css -->
        <link href="backend/admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="backend/admin/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="backend/admin/assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <!--Load Sweet Alert Javascript-->
        
        <script src="backend/admin/assets/js/swal.js"></script>
        <!--Inject SWAL-->
        <?php if(isset($success)) {?>
        <!--This code for injecting an alert-->
                <script>
                            setTimeout(function () 
                            { 
                                swal("Success","<?php echo $success;?>","success");
                            },
                                100);
                </script>

        <?php } ?>

        <?php if(isset($err)) {?>
        <!--This code for injecting an alert-->
                <script>
                            setTimeout(function () 
                            { 
                                swal("Failed","<?php echo $err;?>","Failed");
                            },
                                100);
                </script>

        <?php } ?>



    </head>

    <body class="authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <a href="index.php">
                                        <span>MEDICAL RECORD SYSTEM</span>                                    </a>
                                    <p class="text-muted mb-4 mt-3">Enter your email address and password to access admin panel.</p>
                                </div>

                                <form method='post' >

                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Email address</label>
                                        <input class="form-control" name="ad_email" type="email" id="emailaddress" required="" placeholder="Enter your email">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input class="form-control" name="ad_pwd" type="password" required="" id="password" placeholder="Enter your password">
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> Log In </button>
                                    </div>

                                </form>

                                <!--
                                For Now Lets Disable This 
                                This feature will be implemented on later versions
                                <div class="text-center">
                                    <h5 class="mt-3 text-muted">Sign in with</h5>
                                    <ul class="social-list list-inline mt-3 mb-0">
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github-circle"></i></a>
                                        </li>
                                    </ul>
                                </div> 
                                -->

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p> <a href="his_admin_pwd_reset.php" class="text-white-50 ml-1">Forgot your password?</a></p>
                               <!-- <p class="text-white-50">Don't have an account? <a href="his_admin_register.php" class="text-white ml-1"><b>Sign Up</b></a></p>-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <?php include ("backend/admin/assets/inc/footer1.php");?>

        <!-- Vendor js -->
        <script src="backend/admin/assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="backend/admin/assets/js/app.min.js"></script>
        
    </body>

</html>