<?php
session_start();

require "./sup/admin_start.php";
?>
<style>
textarea {
    width:100%;
}
table {
    table-layout:fixed;
}

table td {
    overflow:hidden;
}
</style>
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link href="css/stylemain.css" rel="stylesheet" type="text/css">
<script src="ajax/ajax.js"></script>
<script>
    function load() {
        search("update", "ajax/getorder");
    }
    function AjaxOnReady(responseText) {
        document.getElementById("content").innerHTML = responseText;
    }
    function jee(id) {
        document.getElementById("myModal").style.display = "block";
        search2(id, "ajax/write");
    }
    function AjaxOnReady2(responseText) {
        document.getElementById("modaali").innerHTML = responseText;
    }
    function jee2() {
        document.getElementById("myModal").style.display = "none";
        
    }
</script>
<body onload="load()">
   
    <div class="bump">
        <div class="container">
            <div class="row">
                <div id="content">
                    
                </div>
                
            </div>
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-dialog-scrollable">
          <div class="modal-content">
          
            <!-- Modal Header -->
            
            <!-- Modal body -->
            <div id="modaali" class="modal-body">
             <?php
                echo "jee";
             ?>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" onclick="jee2()">Sulje</button>
            </div>
            
          </div>
        </div>
    </div>
        </div>
        <a class="btn btn-primary" href="main/logout.php">Kirjaudu ulos</a>
    </div>
</body>
</html>