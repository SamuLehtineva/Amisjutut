<?php
/*
Front(page), this is the main view and editing this should be fairly safe. On the stylesheet some elements have been declared twice for the sake of mobile optimisation.
Please make sure you read which resolution you are editing to be on the safe side.

Time spent on this page: [18]
*/
?>
<section id="snow"></section>
<header class="masthead dots">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
      <div class="col-4 d-none d-lg-block phone toptext float-left">
          <div id="frame">
        <div id="innerFrame">
            <div id="top-gadgets">
                <div class="front-camera"></div>
                <div class="front-speaker"></div>
                <div class="light-sensor"></div>
            </div>
            <div id="screen">
              
          </div>

            <div id="sidebuttons">
                <div class="volume-up"></div>
                <div class="power-button"></div>
            </div>
        </div>
    </div>
    </div>
    <span class="col-lg-1"></span>
    <div class="col-lg-7 text-left toptext">
        <h1 class="font-weight-light">Partiopukki</h1>
        <p class="lead">Katosiko pukki hankeen? Onko savupiippu tukossa?</p>
        <blockquote class="text-left">Ei paniikkia! Tampereen Eräpoikien Partiopukit ovat valmiina pelastamaan päivän! Meidän pukkimme tulevat paikalle ja jakavat lahjat, niin lapselle kuin lapsenmielisellekkin.<br>
        Hinta (käteismaksu):	50 euroa.<br>
<br>
        Lisätietoja saa sähköpostilla,	partiopukki@taer.fi</blockquote>
        <a href="http://partiopukki.truudeli17.net/index.php?sivu=formtest"><button class="btn btn-primary col-lg-2 col-sm-6">Tilaa</button></a>
        
      </div>
    </div>
  </div>
</header>
<?php
require "includes/connection.php";
$sql = "SELECT * FROM etusivu WHERE status = 2";
$query = $db -> query($sql);
if($query != false) {
    if($query -> rowCount() > 0) {
    ?>
    <section class="py-5">
        <div class="container">
        <?php
        $result = $query -> fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row) {
            echo "<hr><h2 class=\"font-weight-light\">".$row['Otsikko']."</h2><p class=\"col-lg-12\">".$row['teksti']."</p>";
        }
        ?>
        </div>
    </section>
    <?php
    }
}






