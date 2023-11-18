<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="hamza.css">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="#">ELECTRODELEGY</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="index.php">LOG OUT</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

  


   <?php 
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "Electro_naccer";

    $connection = new mysqli($hostname, $username, $password, $database);

    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $result = $connection->query("SELECT * FROM products");
    $category_list =  $connection->query("SELECT * FROM Category");
   
   ?>





<div class="container mt-5 mx-auto text-center ">

        <form class="mx-5" method="post">
            <label for="categorySelect" class="mb-2">Select by Category:</label>
            <select name="selectedCategory" id="categorySelect" class="form-select mb-3">
                <?php
                echo '<option value="All">All</option>';
                while ($productsCategory = $category_list->fetch_assoc()) {
                    $categoryName = $productsCategory['Category_nam'];
                    echo '<option value="' . $categoryName . '">' . $categoryName . '</option>';
                }
                ?>
            </select>
            <button type="submit" class="btn btn-primary">Select</button>
        </form>

    </div>
    <div class="container mt-5 mx-auto text-center ">
        <label for="categorySelect" class="mb-2">Select by stock:</label>
    <form method="post" style="margin-left: 75px" class="container mt-5 mx-auto text-center">
            <select name="end-soon-products" id="end-soon-products" style="height: 50px; width: 500px; border-radius: 5px;">
                <?php
                echo '<option class="men" value="All" style=" padding: 10px; font-size: 18px;"> From bottom to the Top </option>';
                ?>
            </select>
            <button type="submit" class="btn bg-primary border-light"> VALID </button>
    </form>
   </div>

    <?php
if (isset($_POST["end-soon-products"])) {
    $filteredProductsByQuantity = $connection->query("SELECT * from Products where max_de_stok < mini_de_stok;");
    display_products($filteredProductsByQuantity);
} elseif (isset($_POST['selectedCategory'])) {
    $selectedCategory = $_POST['selectedCategory'];
    if ($selectedCategory == "All") {
        display_products($result);
    } else {
        $filteredProducts = $connection->query("SELECT Products.Product_Id,Products.Product_name, Products.Product_img, Products.prix_unitair, Products.mini_de_stok, Products.max_de_stok, Category.Category_nam FROM Products JOIN Category ON Products.categoryy_ID = Category.Category_Id and Category.Category_nam = '$selectedCategory';");
        display_products($filteredProducts);
    }
} else {
    display_products($result);
}
?>
<?php
function display_products($result)
{
?>
    <div style="margin-left:120px" class="container row  mb-4">
        <?php
        while ($product = $result->fetch_assoc()) {
            $imagePath = $product['Product_img'];
            $label = $product['Product_name'];
            $unitPrice = $product['prix_unitair'];
            $minQuantity = $product['mini_de_stok'];
            $stockQuantity = $product['max_de_stok'];
        ?>
            <div style="height:290px;  border:2px black solid;" class="col-sm-12 col-lg-3 card mx-5 mb-2 p-2 bg-light col-12 kelma">
                <img src="<?php echo $imagePath; ?>" class="h-75" alt="Product Image">
                <p><?php echo $label; ?></p>
                <p><?php echo $unitPrice; ?> DH</p>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>
<footer style="background-color: rgb(95, 95, 95);">
<div>
<hr>

<br><p style="display: flex; justify-content: center; color:white;">&copy; CopyRight, Designeby:HLF</p><br>
<hr>
</div>
</footer>

   
    
   
</body>
</html>
