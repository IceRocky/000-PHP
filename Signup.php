 
<?php
include_once "models/registerDBCreate.php";
$title = "Signup";
include_once "templates/header.php";
?>
<p></p><br>
<form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>" name="register" id="register">
  <div class="container mt-5">
    <div class="shadow-lg p-4 mb-4 bg-white">
      <div class="row">
        <div class="col-sm-12">
          <div class="animated_logo">
            <img style="width:40%" src="./css/image/Animated_logo.gif" alt="Animated_logo">
          </div>
        </div>
        <div class="col-sm-12">
          <center><p class="h3">Register</p></center>
        </div>
      </div>
      <div class="container mt-3">
        <?= $message ?>
        <div class="form-floating mb-3 mt-3">
          <input type="text" class="form-control" id="name" placeholder="Enter Your Name" name="name">
          <label for="name">Name</label>
        </div>
        <div class="form-floating mb-3 mt-3">
          <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
          <label for="email">Email</label>
        </div>
        <div class="form-floating mb-3 mt-3">
          <input type="text" class="form-control" id="contact_number" placeholder="Contact Number" name="contact_number">
          <label for="contact_number">Contact Number</label>
        </div>
        <div class="form-floating mb-3 mt-3">
          <input type="text" class="form-control" id="college" placeholder="School Name" name="college">
          <label for="college">School Name</label>
        </div>
        <div class="form-floating mb-3 mt-3">
          <input type="text" class="form-control" id="city" placeholder="Location" name="city">
          <label for="city">Location</label>
        </div>
        <div class="form-floating mb-3 mt-3">
          <input type="text" class="form-control" id="courses" placeholder="Classes" name="courses">
          <label for="courses">Classes offered (Prep / KG to Std. XII)</label>
        </div>
        <div class="form-floating mb-3 mt-3">
          <input type="text" class="form-control" id="students" placeholder="No. Of Students" name="students">
          <label for="students">No. Of Students</label>
        </div>
        <center><button type="submit" value="Submit" class="btn btn-warning" style="width: 150px;">Register</button></center>
      </div>
    </div>
  </div>
</form>

<?php  ?>
