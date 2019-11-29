<?php
echo "<h2>7</h2>";

?>
<form action="./index.php?sivu=harj7&kansio=Harj" method="post">
1.Minkä värinen omena voi olla?<br>
<input type="checkbox" name="vihrea" value="1">Vihreä<br>
<input type="checkbox" name="violet" value="0">Violetti<br>
<input type="checkbox" name="puna" value="1">Punainen<br>
2.Kuinka monta jalkaa hämähäkeillä on?<br>
<input type="number" name="jalka" min="1" max="10"><br>
3.Millä näistä eläimistä on kaviot?<br>
<input type="radio" name="kavio" value="0"> Koira<br>
<input type="radio" name="kavio" value="1"> Lammas<br>
<input type="radio" name="kavio" value="0"> Sika<br>
4.Mikä lintu on Amerikan symboli?<br>
<input type="text" name="lintu"><br>
5.Minä vuonna ensimmäinen ihminen laskeutui kuun pinnalle?
<input type="number"
