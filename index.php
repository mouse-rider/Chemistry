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

// for method 2

$result2 = mysqli_query($connect, $query);

// $options = "";

// while($row2 = mysqli_fetch_array($result2))
// {
//     $options = $options."<option>$row2[0]</option>";
// }

?>

<!DOCTYPE html>

<html>

<head>
<script src="https://unpkg.com/@rdkit/rdkit/dist/RDKit_minimal.js"></script>
  <link rel="icon" type="image/x-icon" href="atomx.png">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KIOT - Chem For Biotechnology</title>
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

<body>
<script> var drawmol = function() {

var mol = RDKit.get_mol("C1=CC=C(C=C1)O"); // the string here is a string representation of chemical molecules, it could also be something like "CO" or "CCCCC", shouldnt be important
var svg = mol.get_svg();
document.getElementById("drawer").innerHTML = svg;         
};
</script>
  </div>
        <!--Method One-->
        <div class="box">
            <center>
                <h1 class="hxx">Chemistry For Bio-technology</h1>
            
      <form>
        <label for="opt1">Select a Chemical Compound</label>
        <select>

            <?php while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[3];?>"><?php echo $row1[0];?></option>

            <?php endwhile;?>

        </select>
        
        <!-- Method Two -->

        <!-- <select>
            <?php echo $options;?>
        </select> -->
        <button type='button' onclick='drawmol()'> <!-- this works --> 
            draw 
        </button><br>  
        </form>
        <div id='drawer'></div>
    </center>
</body>

</html>
