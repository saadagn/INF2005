<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Site web du restaurant</title>
  <link rel="stylesheet" href="style.css"/>
</head>
<body>

  <?php include("header.php")?>

  <?php include("menuChoix.php"); ?>

  <div align = "center">
    <div class="tof">
      <div class="imageLeft">
        <img src="images/boston_roll.png" width="200" height="200" alt="Maki boston">
        <div class="picDescrip">Maki boston 7$</div>
      </div>
      <div class="imageRight">
        <img src="images/california_roll.png" width="200" height="200" alt="Maki boston">
        <div class="picDescrip">Maki californien 6$</div>
      </div>
    </div>

    <div class="tof">
      <div class="imageLeft">
        <img src="images/nigris.png" width="200" height="200" alt="Maki boston"/>
        <div class="picDescrip">Nigris avocat 3$</div>
      </div>
      <div class="imageRight">
        <img src="images/sashimi.png" width="200" height="200" alt="Maki boston">
        <div class="picDescrip">Sashimi saumon 4$</div>
      </div>
    </div>

    <div class="tof">
      <img src="images/sushi.png" width="200" height="200" alt="Maki boston">
      <div class="picDescrip">Sushi omelette 2$</div>
    </div>
  </div>

  <div>
    <a href="commande.php"> <h3 class="commande">Effectuer une commande</h3></a>
  </div>

  <?php include("coordonees.php"); ?>

</body>
</html>
