<?php
include('includes/config.php');
session_start();
error_reporting(0);

  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Online Temple Seva| | Darshan History</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Lora:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<script src="js/jquery.min.js"></script>
</head>
<body>
<?php include_once('includes/header.php');?>
	<!-- study -->
	<div class="contact">
    <div class="container">
        <h2>contact</h2>

                    <div class="contact-head text-center">
                        <p>Contact Details </p>
                    </div>      
                    <!----- contact-grids ----->        
                    <div class="contact-grids">
                        <div class="col-md-5">
                            <?php

$ret=mysqli_query($con,"select * from tblpage where PageType='contactus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                            <h3>Address</h3>
                                <div class="address">
                                    <p><?php  echo $row['PageDescription'];?>.</p> 
                                   
                                  
                                    <p>Phone : +<?php  echo $row['MobileNumber'];?></p> 
                                 
                                    <p>E-mail : <?php  echo $row['Email'];?></p>
                                </div>
                        </div><?php } ?>
                        <div class="col-md-7">
                            <div class="contact-map">
                               <img src="images/im.jpg" width="500" height="400">
                            </div>
                        </div>
                            <div class="clearfix"> </div>
                      
                    </div>
                    <!----- contact-grids ----->
            
        </div>
    </div>
	<!-- study -->
				
	<?php include_once('includes/footer.php');?>
</body>
</html>