<?php
require "./includes/connection.php";
//https://davidwalsh.name/mootools-drag-ajax
?>

<link href='js/example.css' rel='stylesheet' type='text/css' />

<div id="kanban">
          
      <div class="board" id="board1">
        <header><meta http-equiv="Content-Type" content="text/html; charset=euc-kr">Käynnit</header>
        <div class="cards" id="b1">
          <?php
            $sql="SELECT pukki.sukunimi, pukki.etunimi, pukki.ktunnus, pukki.email, pukki.puh, pukki.alueID, alue.aluenimi, alue.postinumero FROM pukki LEFT JOIN alue ON pukki.alueID = alue.alueID";
            $query = $db -> query($sql); 
            if($query != false) {
                $result = $query -> fetchAll(PDO::FETCH_ASSOC);
                foreach($result as $row) {
                    echo "<div class='card'><span class='cardtitle noselect'>".$row["sukunimi"]." ".$row["etunimi"]."</span></div>";
                }
            }
?>
        </div>
      </div>
  <div id="scroller">
    <div id="boards">

      <div class="board" id="board2">
        <header>In Progress</header>
        <div class="cards" id="b2">
          <div class="card"><span class="cardtitle">A great text card #5</span></div>
        </div>
      </div>

    </div>
  </div>
</div>
<script src='js/dragula.js'></script>
<script src='js/dragula.min.js'></script>
<script src='js/example.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script language="JavaScript">
    dragula([
  document.getElementById("b1"),
  document.getElementById("b2"),
  document.getElementById("b3"),
  document.getElementById("b4"),
  document.getElementById("b5"),
  document.getElementById("b6"),
  document.getElementById("b7")
]);

// Scrollable area
var element = document.getElementById("boards");
var numberOfBoards = element.getElementsByClassName("board").length;

// Width of all Boards
var boardsWidth = numberOfBoards * 316;
// set Width
element.style.width = boardsWidth + "px";

// disable text-selection
function disableSelect(e) {
  return false;
}

document.onselectstart = new Function();
document.onmousedown = disableSelect();

</script>

