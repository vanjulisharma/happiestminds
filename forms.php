<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">
  <title>Form</title>
</head>

<body>
  
  <div id="form">
    <form method="post" action = "new.php">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="examplename" name="name" />
</div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="email" />
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="text" class="form-control" id="exampleInputPassword1" name="pass" />
        </div>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Address</label>
          <input type="text" class="form-control" id="exampleaddress" name="address" />
</div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

 <?php
//   $conn = mysqli_connect("localhost", "root", "Certificate007#", "one");
//   if (!$conn) {
//     echo "its is not connected";
//   } else {
//     if ($_POST) {
//       $name = $_POST['name'];
//       $email = $_POST['email'];
//       $pass = $_POST['pass'];
//       $address = $_POST['address'];
//       $query = ("INSERT INTO forms(`name`,`emailaddress`,`password`,`address`) VALUES('$name','$email', '$pass','$address')");
//       mysqli_query($conn,$query);
  
//       echo '<div class="alert alert-light" role="alert">'
//       .$name ." ".$email ." ".$pass." ".$address.
//     '</div>';
      
//     }
//  }
?>

</body>

</html>