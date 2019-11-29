<table class="width-100">
    <tbody id="list">
    <tr><th>Muokkaa tietoja</th><th>Toiminnot</th></tr>
        
    <?php
    require "../includes/connection.php";
    $v = explode(".", $_GET['v']);
            
    if($v[0] == "d") {
        $id = $v[1];
        $sql = "DELETE FROM etusivu WHERE eID = $id";
        $query = $db -> query($sql);
    }
    $sql = "SELECT * FROM etusivu";
    $query = $db -> query($sql);
    if($query != false) {
        $result = $query -> fetchAll(PDO::FETCH_ASSOC);
        $i = 0;
        
        foreach($result as $row) {
            $status = $row['status'] == 2 ? "Checked" : "";
            ?>
            
                <tr><td>Otsikko: <input name="hd<?php echo $i ?>" class="width-100" type="text" value="<?php echo $row['Otsikko'] ?>" placeholder="Otsikko"><br><br>
                <label>Kirjoita tähän sisältö: </label>
                <textarea name="txt<?php echo $i ?>" style="resize: none" rows="7" class="width-100" placeholder="Sisältö"><?php echo $row['teksti'] ?></textarea>
                <input name="id<?php echo $i ?>" type="hidden" value="<?php echo $row["eID"] ?>">
                </td><td class="position-absolute"><label class="switch">
                    <input name="st<?php echo $i ?>" type="checkbox" <?php echo $status ?>>
                    <span id="slider" class="slider"></span>
                </label><br>
                <button type="button" onclick="del(<?php echo $row['eID'] ?>)" class="btn-default marge"><i class="fas fa-trash-alt"></i></button>
                </td></tr>
            <?php
            $i++;
        }
        ?>
        <tr><td>Otsikko: <input name="hd<?php echo $i ?>" class="width-100" type="text" placeholder="Otsikko"><br><br>
                <label>Kirjoita tähän sisältö: </label>
                <textarea name="txt<?php echo $i ?>" style="resize: none" rows="7" class="width-100" placeholder="Sisältö"></textarea>
                <input name="id<?php echo $i ?>" type="hidden" value="null">
                </td><td class="position-absolute"><label class="switch">
                    <input name="st<?php echo $i ?>" type="checkbox">
                    <span id="slider" class="slider"></span>
                </label><br>
                </td></tr>
            <?php
            $i++;
    ?>
        </tbody>
    </table>
    <br>
    <button onclick="document.getElementById('content').submit();" class="btn btn-primary">Tallenna</button>
    <button type="button" onclick="redir()" class="btn btn-primary">Etusivu</button>
    <br>
    <br>
    <input name="rows" type="hidden" value="<?php echo $i ?>">
    <?php
}