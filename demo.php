<?php

// php select option value from database

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "chemistry";

// connect to mysql database

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

// mysql select query
$query = "SELECT * FROM `delaney__1_`";

// for method 1

$result1 = mysqli_query($connect, $query);
?>

<!-- HTML content -->
<!DOCTYPE html>

<html>

<head>
<script src="https://unpkg.com/@rdkit/rdkit/dist/RDKit_minimal.js"></script>
  <link rel="icon" type="image/x-icon" href="atomx.png">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KIOT - Chem For Biotechnology</title>
  <link rel="stylesheet" href="style.css">
  <!--   Here -->

  <link rel="stylesheet" href="style.css">
  <script>
    window
      .initRDKitModule()
      .then(function (RDKit) {
        console.log("RDKit version: " + RDKit.version());
        window.RDKit = RDKit;
      })
      .catch(() => {
      });
  </script>
</head>
<div class="box">

    <center>
    <h1 class="hxx">Chemistry For Bio-technology</h1>
<form action="" method="post">
    <select name="Fruit">
        <!-- <option value="" disabled selected>Choose option</option> -->
        <?php while($row1 = mysqli_fetch_array($result1)):;?>
        <option value="<?php echo $row1[3];?>"><?php echo $row1[0];?></option>
        <?php endwhile;?>
        <!-- <option value="Banana">Banana</option>
        <option value="Coconut">Coconut</option>
        <option value="Blueberry">Blueberry</option>
        <option value="Strawberry">Strawberry</option> -->
    </select>
    <input type="submit" name="submit" vlaue="Choose options"><br>
    
    <?php

    if(isset($_POST['submit'])){
    if(!empty($_POST['Fruit'])) {
        $selected = $_POST['Fruit'];
        echo 'You have chosen: ' .  $selected;
    } else {
        echo 'Please select the value.';
    }
    }
?><br>

        <button type='button' onclick='drawmol()'> <!-- this works --> 
            draw 
        </button><br> 
  <script> 
        var drawmol = function() {
        var mol = RDKit.get_mol("<?php Print($selected); ?>"); // the string here is a string representation of chemical molecules, it could also be something like "CO" or "CCCCC", shouldnt be important
        var svg = mol.get_svg();
        document.getElementById("drawer").innerHTML = svg;         
        };

</script>
<div id='drawer'></div>
</center>
</div>
</form>

