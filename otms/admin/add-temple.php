<?php
session_start();
include_once('includes/config.php');

if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $tname = $_POST['tname'];
        $tlocation = $_POST['tlocation'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $country = $_POST['country'];
        $description = $_POST['description']; // No need to sanitize here if using prepared statements
        $image1 = $_FILES["image1"]["name"];
        $image2 = $_FILES["image2"]["name"];
        $image3 = $_FILES["image3"]["name"];
        
        // Check if all required fields are provided before proceeding with the database operation
        
        // Your database connection
        $con = mysqli_connect("localhost", "root", "", "otms");
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }

        // Prepare and bind the SQL statement
        $stmt = $con->prepare("INSERT INTO tbltemple (TempleName, TempleLocation, City, State, Country, Description, TempleImage1, TempleImage2, TempleImage3) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss", $tname, $tlocation, $city, $state, $country, $description, $image1, $image2, $image3);

        // Move uploaded files and execute the statement
        if ($stmt->execute()) {
            // Files moved successfully, redirect or show success message
            echo "<script>alert('Temple detail has been added successfully');</script>";
            echo "<script>window.location.href='manage-temple.php'</script>";
        } else {
            // Error occurred, handle accordingly
            echo "Error: " . $stmt->error;
        }

        // Close the statement and database connection
        $stmt->close();
        $con->close();
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
 
  <title>Online Temple Seva|| Add Temple</title>
  <!-- base:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller d-flex">
    <!-- partial:partials/_sidebar.html -->
    
    <?php include_once('includes/sidebar.php');?>
    
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_navbar.html -->
     <?php include_once('includes/header.php');?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Temple</h4>
                 
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                      <label for="exampleInputUsername1">Name of Temple</label>
                      <input type="text" class="form-control" name="tname" id="tname" value="" required='true' />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Location</label>
                      <input type="text" class="form-control" name="tlocation" id="tlocation" value="" required='true' />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">City</label>
                      <input type="text"  class="form-control" id="city" name="city" value="" required='true'/>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">State</label>
                      <input type="text" class="form-control" id="state" name="state" class="form-control" value="" required='true' />
                    </div>
                   <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Country</label>
                      <input type="text" class="form-control" id="country" name="country" value="" required='true' />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Description</label>
                      <textarea type="text" class="form-control" id="description" name="description" value="" required='true' ></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Temple Featured Image</label>
                      <input type="file" class="form-control" id="image1" name="image1" value="" required='true' />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Temple Image2</label>
                      <input type="file" class="form-control" id="image2" name="image2" value="" required='true' />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Featured Image3</label>
                      <input type="file" class="form-control" id="image3" name="image3" value="" required='true' />
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                   
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
       <?php include_once('includes/footer.php');?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="js/file-upload.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
