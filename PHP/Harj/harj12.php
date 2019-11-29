<?php
echo "<h2>12.1</h2>";
for($i = -1; $i <= 9; $i++) {
	$jakojaannos = $i%5;
switch ($jakojaannos) {
	
	case 0: echo "often<br>";
	break;
	
	case 1:
	case -1:	echo "what<br>";
	break;
	
	case 2: 
	case 4: echo "is<br>";
	break;
	
	case 3: echo "not<br>";
	break;
}
}

echo "<h2>12.2</h2>";
echo "180";
for ($i=0; $i<=5;$i++) 
{ 

	for ($j=3;$j<=8;$j++) 
	{
		for ($k=0;$k<=4;$k++) 
		{
			echo ".";
		}
	}
}
echo "<h2>12.3</h2>";
$numero = 0;
for ($i=1; $i<=3;$i++) 
{
	for ($j=3;$j<=5;$j++) 
	{
		for ($k=$i;$k<=$j;$k++)
		{
			echo ".";
			$numero++;
		}
	}
}
echo $numero;