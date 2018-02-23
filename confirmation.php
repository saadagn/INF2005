<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <title>Transmission de formulaires</title>
  <link rel="stylesheet" href="style.css"/>
</head>
<body>

  <h1>Votre commande à été effectuer avec succée!</h1>
  <br><br>
  La somme total de votre facture est de : <?php echo $_GET['facture']?> $
  <br><br>
  <h2><a href="commande.php">Effectuer une nouvelle commande</a></h2>

</body>
</html>
