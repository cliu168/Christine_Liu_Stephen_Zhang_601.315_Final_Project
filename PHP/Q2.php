<head>
  <title>Drivers of a Specific Nationality</title>
 </head>
 <body>
 
 <?php
// PHP code just started

ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);
// display errors

$db = mysqli_connect("dbase.cs.jhu.edu", "22fa_szhan141", "TvW17CsQSB");
// ********* Remember to use your MySQL username and password here ********* //

if (!$db) {
  echo "Connection failed!";

} else {
  $input = $_POST['nationality'];
  if ($input == "select") {
    echo "Invalid nationality!\n";
    exit();
  }
  // This says that the $ID variable should be assigned a value obtained as an
  // input to the PHP code. In this case, the input is called 'ID'.

  mysqli_select_db($db, "22fa_szhan141_db");
  // ********* Remember to use the name of your database here ********* //

  $result = mysqli_query($db, "CALL Q2('".$input."')");
  // call to procedure

  if (!$result || $result->num_rows == 0) {
    echo "No results.\n";

  } else {
    echo "<table border=1>\n";
    echo "<tr><td>FirstName</td><td>LastName</td></tr>\n";
    while ($myrow = mysqli_fetch_array($result)) {
      printf("<tr><td>%s</td><td>%s</td></tr>\n", 
        $myrow["fName"], $myrow["lName"]);
    }

   echo "</table>\n";
  }
}

// PHP code about to end

?>

 </body>