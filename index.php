<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>authentification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css" integrity="sha512-oAvZuuYVzkcTc2dH5z1ZJup5OmSQ000qlfRvuoTTiyTBjwX1faoyearj8KdMq0LgsBTHMrRuMek7s+CxF8yE+w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="hamza.css">
  </head>
<body class="">
  
 <div >
 <div style="margin-left: 23%; margin-top: 200px" class="bg-white p-2 w-50 d-flex justify-content-center text-dark fs-3">LOG IN</div>

  <form   method="POST" style="margin-left:23%;" class="w-50  p-4 text-light">
  <video class="form" width="640" height="360" controls>
    <source src="vedio.mp4" type="video/mp4">
</video>
<div class="jock">
    <div class="   ">
      <label for="identifient">ID</label>
      <input type="number" name="userid" class="form-control" id="name"   placeholder="enter username">
      
    </div>
    <div class="">
      <label for="password">Password</label>
      <input type="password" name="password" class="form-control" id="password" placeholder="Password">
    </div>
   
    <button type="submit" class="">Log In</button>
    </div>
  </form>

 </div >
 
 <?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "Electro_naccer";

$connection = new mysqli($hostname, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if userId and password are set
    if (isset($_POST['userid'], $_POST['password'])) {
        $userId = $_POST['userid'];
        $password = $_POST['password'];

        // Prepare a SQL statement using a prepared statement to prevent SQL injection
        $stmt = $connection->prepare("SELECT * FROM User WHERE UserId = ? AND Passwords = ?");
        $stmt->bind_param("is", $userId, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if any rows were returned
        if ($result->num_rows > 0) {
            header("Location: home.php");
            exit();
        } else {
            echo '<script>alert("Login failed. Please check your userId and password.");</script>';
        }

        // Close the statement
        $stmt->close();
    }
}

// Close the MySQL connection
$connection->close();
?>


</body>
</html>