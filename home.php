<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your meta tags and links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css" integrity="sha512-oAvZuuYVzkcTc2dH5z1ZJup5OmSQ000qlfRvuoTTiyTBjwX1faoyearj8KdMq0LgsBTHMrRuMek7s+CxF8yE+w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="hamza.css">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">ELECTRODELEGY </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php">LOG OUT</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
  

   <!-- Filter products by category -->

   <?php 
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "Electro_naccer";

    $connection = new mysqli($hostname, $username, $password, $database);

    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Corrected SQL query to retrieve all columns from the products table
    $result = $connection->query("SELECT * FROM products");
    $category_list =  $connection->query("SELECT * FROM Category");
   
   ?>
<form class="mx" method="post">
        <label for="categorySelect"></label>
        <select name="selectedCategory" id="categorySelect">
            <?php
            // Iterate through the fetched categories and populate the dropdown
            echo '<option value="All" style="color: red; font-size: 18px;">All</option>';
            while ($productsCategory =   $category_list->fetch_assoc()) {
                $categoryName = $productsCategory['Category_nam'];
                echo '<option value="' . $categoryName . '" style="color: red; font-size: 18px;">' . $categoryName . '</option>';
            }
            ?>
        </select>

        <button type="submit"> Selecte </button>
</form>
<!-- Filter products by category -->
    <!-- Filter products by category -->
<?php  
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedCategory = $_POST['selectedCategory'];

    if($selectedCategory == "All") {
        display_products($result);
    } else {
        // Fetch products based on the selected category
        $filteredProducts = $connection->query("SELECT Products.Product_Id,Products.Product_name, Products.Product_img, Products.prix_unitair, Products.mini_de_stok, Products.max_de_stok, Category.Category_nam FROM Products JOIN Category ON Products.categoryy_ID = Category.Category_Id and Category.Category_nam = '$selectedCategory';");
        // Call the function to display filtered products
        display_products($filteredProducts);
    }




}else {
// If the form is not submitted, display all products initially
display_products($result);
}

?>



   
    
    <?php
   
   
    function display_products($result)
    {
        echo '<div class="container row mx-5 mb-4 ">';
        
        // Loop through the fetched products and display each card
        while ($product = $result->fetch_assoc()) {
            $imagePath = $product['Product_img'];
            $label = $product['Product_name'];
            $unitPrice = $product['prix_unitair'];
            $minQuantity = $product['mini_de_stok'];
            $stockQuantity = $product['max_de_stok'];

            // Display product card
            echo '<div style="height:300px; border:2px black solid;" class="col-lg-4 card mx-6 mb-2 p-2 bg-light">';
            echo '<img src="' . $imagePath . '" class="h-75" alt="Product Image">';
            echo '<p>' . $label . '</p>';
            echo '<p>' . $unitPrice . ' DH</p>';
            echo '</div>';
        }
        
        echo '</div>';
    }

   
    ?>
</body>
</html>
