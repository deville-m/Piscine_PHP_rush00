<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>CowShop</title>
  <link rel="stylesheet" href="./css/main.css">
</head>
<body>
  <div class="header">
    <?php
      include("./header.php");
     ?>
  </div>
  <div class="main-right-menu">
    <h2>Here we are</h2>
    <iframe class="clean-iframe" src="./backend/templates/list_of_products.php" width="100%" height="100%"></iframe>
    <iframe class="clean-iframe" src="./backend/templates/list_of_categories.php" width="100%" height="100%"></iframe>
  </div>
  <div class="main-container">
    <div class="main-items">
      <h1>Select a Classy Cow Class (CCC)</h1>
      <div class="clean-iframe">
        <?php
          $type = "category";
          include ("./backend/templates/display_tiles.php");
        ?>
      </div>
    </div>
  </div>

  <div class="footer">
    <h6>Source: <a href="https://www.ptable.com/">https://www.ptable.com/</a></h6>
    <h6>&copy rbaraud 2018</h6>
  </div>
</body>
</html>
