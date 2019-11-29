<?php
  /***** EDIT BELOW LINES *****/
  $DB_Server = "truudeli7.net"; // MySQL Server
  $DB_Username = "truud286"; // MySQL Username
  $DB_Password = "nx[h2_SCqZy6"; // MySQL Password
  $DB_DBName = "truud286_tyoajankirjaus"; // MySQL Database Name
  $DB_TBLName = "to_tunti"; // MySQL Table Name
  $DB_TBLName = "to_tyypit";
  $xls_filename = 'tyoajankirjaus_'.date('Y-m-d').'.xls'; // Define Excel (.xls) file name
  $date1 = $_GET['date1'];
  $date2 = $_GET['date2'];
  $soID = $_GET['soID'];
   
   
  /***** DO NOT EDIT BELOW LINES *****/
  // Create MySQL connection
  if($soID == "kaikki"){
    $sql = "SELECT to_opettaja.nimi, to_tyypit.tyyppi, to_tyypit.alityyppi, to_tunti.pvm, to_tunti.klo, to_tunti.kesto, to_tunti.kuvaus FROM ((to_tunti INNER JOiN to_opettaja ON to_tunti.oID = to_opettaja.oID) INNER JOIN to_tyypit ON to_tunti.tyyppiID = to_tyypit.tyyppiID) WHERE pvm BETWEEN '$date1' AND '$date2' ORDER BY to_tunti.klo";
  } else{
    $sql = "SELECT to_opettaja.nimi, to_tyypit.tyyppi, to_tyypit.alityyppi, to_tunti.pvm, to_tunti.klo, to_tunti.kesto, to_tunti.kuvaus FROM ((to_tunti INNER JOiN to_opettaja ON to_tunti.oID = to_opettaja.oID) INNER JOIN to_tyypit ON to_tunti.tyyppiID = to_tyypit.tyyppiID) WHERE pvm BETWEEN '$date1' AND '$date2' AND to_tunti.oID='$soID' ORDER BY to_tunti.klo";
  }
  $Connect = @mysql_connect($DB_Server, $DB_Username, $DB_Password) or die("Failed to connect to MySQL:<br />" . mysql_error() . "<br />" . mysql_errno());
  // Select database
  $Db = @mysql_select_db($DB_DBName, $Connect) or die("Failed to select database:<br />" . mysql_error(). "<br />" . mysql_errno());
  // Execute query
  $result = @mysql_query($sql,$Connect) or die("Failed to execute query:<br />" . mysql_error(). "<br />" . mysql_errno());
   
  // Header info settings
  header("Content-Type: application/xls");
  header("Content-Disposition: attachment; filename=$xls_filename");
  header("Pragma: no-cache");
  header("Expires: 0");
   
  /***** Start of Formatting for Excel *****/
  // Define separator (defines columns in excel &amp; tabs in word)
  $sep = "\t"; // tabbed character
   
  // Start of printing column names as names of MySQL fields
  for ($i = 0; $i<mysql_num_fields($result); $i++) {
    echo mysql_field_name($result, $i) . "\t";
  }
  print("\n");
  // End of printing column names
   
  // Start while loop to get data
  while($row = mysql_fetch_row($result))
  {
    $schema_insert = "";
    for($j=0; $j<mysql_num_fields($result); $j++)
    {
      if(!isset($row[$j])) {
        $schema_insert .= "NULL".$sep;
      }
      elseif ($row[$j] != "") {
        $schema_insert .= "$row[$j]".$sep;
      }
      else {
        $schema_insert .= "".$sep;
      }
    }
    $schema_insert = str_replace($sep."$", "", $schema_insert);
    $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
    $schema_insert .= "\t";
    print(trim($schema_insert));
    print "\n";
  }
?>