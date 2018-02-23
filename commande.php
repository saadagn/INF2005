<?php
  // definir les variables
  $firstName = $lastName = "";
  $firstNameErr = $lastNameErr = $sushiErr = $telephoneErr = "";
  $telephone = $nbrCalifornienSushi = $nbrBostonSushi = 0;
  $nbrNigrisSushi = $nbrSaumonSushi = $nbrOmeletteSushi = 0;
  $facture = 0;
  $boolErr = false;
  $bool = false;

  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (empty($_POST["firstName"]))
    {
      $firstNameErr = "Prénom obligatoire";
      $boolErr = true;
    } else{
      $firstName = test_inputString($_POST["firstName"]);
      if(strlen($firstName)<2){
        $firstNameErr = "Le prénom doit contenir au moins 2 caractères";
        $boolErr = true;
      }
      if (!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
        $firstNameErr = "Seule les lettres et espace sont autorisé";
        $boolErr = true;
      }
    }
    if (empty($_POST["lastName"]))
    {
      $lastNameErr = "Nom obligatoire";
      $boolErr = true;
    } else{
      $lastName = test_inputString($_POST["lastName"]);
      if(strlen($lastName)<2){
        $lastNameErr = "Le nom doit contenir au moin 2 caractères";
        $boolErr = true;
      }
      if (!preg_match("/^[a-zA-Z ]*$/",$lastName)) {
        $lastNameErr = "Seule les lettres et espace sont autorisé";
        $boolErr = true;
      }
    }
    if (empty($_POST["telephone"]))
    {
      $telephoneErr= "telephone obligatoire";
      $boolErr = true;
    } else{
      $telephone = $_POST["telephone"];
      if(strlen($telephone) != 10){
        $telephoneErr = "Le numero de télèphone doit contenir exactement 10 caractères";
        $boolErr = true;
      }
    }
    $nbrCalifornienSushi = $_POST["nbrCalifornienSushi"];
    $nbrBostonSushi = $_POST["nbrBostonSushi"];
    $nbrSaumonSushi = $_POST["nbrSaumonSushi"];
    $nbrNigrisSushi = $_POST["nbrNigrisSushi"];
    $nbrOmeletteSushi = $_POST["nbrOmeletteSushi"];
    $facture = $nbrCalifornienSushi*6 + $nbrBostonSushi*7 + $nbrNigrisSushi*3 + $nbrSaumonSushi*4 + $nbrOmeletteSushi*2;
    if ($nbrCalifornienSushi == 0 && $nbrBostonSushi == 0 && $nbrNigrisSushi == 0 && $nbrSaumonSushi == 0 && $nbrOmeletteSushi == 0)
    {
      $sushiErr = "Un choix de commande est obligatoire";
      $boolErr = true;
    }

    if($boolErr == true){
      $bool = false;
    }
    else{
      $bool = true;
    }
  }

  function test_inputString($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>
<?php
  if($bool == true){
    header("Location:confirmation.php?facture=$facture",true,303);
  }
?>
<?php
$d = date('Y-m-d h:i:sa');
if($bool == true){
  $list = array
  (
    array
    (
      $firstName, $lastName, $telephone,
      $nbrCalifornienSushi,
      $nbrBostonSushi,
      $nbrSaumonSushi,
      $nbrNigrisSushi,
      $nbrOmeletteSushi,
      $d,
      )
    );

    $file = fopen("commande.csv","a");

    foreach ($list as $line, ";")
    {
      fputcsv($file, $line);
    }
    fclose($file);
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Site web du restaurant</title>
  <link rel="stylesheet" href="style.css"/>
</head>
<body>

  <?php include("header.php"); ?>

  <?php include("menuChoix.php"); ?>

  <br>
  <p id = "A" style="color:red">* champs obligatoire.</p>
  <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
    First name: <input type="text" name="firstName" placeholder="First Name" value="<?=$firstName;?>">
    <span style="color:red">* <?php echo $firstNameErr;?></span>
    <br><br>
    Last name: <input type="text" name="lastName" placeholder="Last Name" value="<?php echo $lastName;?>">
    <span style="color:red">* <?php echo $lastNameErr;?></span>
    <br><br>
    Telephone: <input type="text" name="telephone" placeholder="Telephone" maxlength="10" value="<?php echo $telephone;?>">
    <span style="color:red">* <?php echo $telephoneErr;?></span>
    <br><br>
    <fieldset>
      <legend>Choisissez votre commande:<span style="color:red">* <?php echo $sushiErr;?></span></legend>
      Maki californien 6$ <img src="images/california_roll.png" width="40" height="40" alt="Maki boston">
      <input name="nbrCalifornienSushi" type="number" min="0" value="<?php echo $nbrCalifornienSushi;?>">
      <br><br>
      Maki boston 7$ <img src="images/boston_roll.png" width="40" height="40" alt="Maki boston">
      <input for="label2" name="nbrBostonSushi" type="number" min="0" value="<?php echo $nbrBostonSushi;?>" >
      <br><br>
      Sashimi saumon 4$ <img src="images/sashimi.png" width="40" height="40" alt="Maki boston">
      <input for="label3" name="nbrSaumonSushi" type="number" min="0" value="<?php echo $nbrSaumonSushi;?>">
      <br><br>
      Nigris avocat 3$ <img src="images/nigris.png" width="40" height="40" alt="Maki boston">
      <input for="label4" name="nbrNigrisSushi" type="number" min="0" value="<?php echo $nbrNigrisSushi;?>">
      <br><br>
      Sushi omelette 2$ <img src="images/sushi.png" width="40" height="40" alt="Maki boston">
      <input for="label5" name="nbrOmeletteSushi" type="number" min="0" value="<?php echo $nbrOmeletteSushi;?>">
    </fieldset>
    <br>
    <button class="button" type="submit">Submit</button>
  </form>

  <?php include("coordonees.php"); ?>

</body>
</html>
