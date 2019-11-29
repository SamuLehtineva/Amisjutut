<?php

echo "<h2>19.1</h2>";
echo "Last modified: " . date ("F d Y H:i:s.", getlastmod());
echo "<h2>19.2</h2>";
echo date ('Y-m-d');
echo "<h2>19.3</h2>";
phpinfo(1);
echo "<h2>19.4</h2>";
$useragent = $_SERVER ['HTTP_USER_AGENT'];
echo $useragent;