<table class="width-100">
    <tbody id="list">
    <tr><th>Muokkaa lomakkeen tietoja</th><th>Toiminnot</th></tr>
        
    <?php
    require "../includes/connection.php";
    $v = explode(".", $_GET['v']);
            
    if($v[0] == "d") {
        $id = $v[1];
        $sql = "DELETE FROM extrat WHERE extraID = $id";
        $query = $db -> query($sql);
    }
    $sql = "SELECT * FROM extrat";
    $query = $db -> query($sql);
    if($query != false) {
        $result = $query -> fetchAll(PDO::FETCH_ASSOC);
        $i = 0;
        
        foreach($result as $row) {
            $status = $row['extraState'] == 2 ? "Checked" : "";
            ?>
                <tr><td>Otsikko: <input name="hd<?php echo $i ?>" class="width-100" type="text" value="<?php echo $row['extraOtsikko'] ?>" placeholder="Otsikko"><br><br>
                <label>Placeholder: </label>
                <textarea name="txt<?php echo $i ?>" class="width-100" placeholder="Placeholder kentälle" rows="4"><?php echo $row['extraPlaceholder'] ?></textarea>
                <select name="type<?php echo $i ?>">
                    <option value="text" <?php echo $row['extraTyyppi'] == "text" ? "selected" : "" ?>>Yhden rivin tekstikenttä</option>
                    <option value="textarea" <?php echo $row['extraTyyppi'] == "textarea" ? "selected" : "" ?>>Usean rivin tekstikenttä</option>
                    <option value="number" <?php echo $row['extraTyyppi'] == "number" ? "selected" : "" ?>>Numerokenttä</option>
                    <option value="email" <?php echo $row['extraTyyppi'] == "email" ? "selected" : "" ?>>Sähköpostikenttä</option>
                    <option value="date" <?php echo $row['extraTyyppi'] == "date" ? "selected" : "" ?>>Päivämäärä</option>
                    <option value="tel" <?php echo $row['extraTyyppi'] == "tel" ? "selected" : "" ?>>Puhelinnumero</option>
                    <option value="color" <?php echo $row['extraTyyppi'] == "color" ? "selected" : "" ?>>Väri</option>
                </select>
                <input name="id<?php echo $i ?>" type="hidden" value="<?php echo $row["extraID"] ?>">
                </td><td class="position-absolute"><label class="switch">
                    <input name="st<?php echo $i ?>" type="checkbox" <?php echo $status ?>>
                    <span id="slider" class="slider"></span>
                </label><br>
                <button type="button" onclick="del(<?php echo $row['extraID'] ?>)" class="btn-default marge"><i class="fas fa-trash-alt"></i></button>
                </td></tr>
            <?php
            $i++;
        }
        ?>
        <tr><td>Otsikko: <input name="hd<?php echo $i ?>" class="width-100" type="text" placeholder="Otsikko"><br><br>
                <label>Placeholder: </label>
                <textarea name="txt<?php echo $i ?>" class="width-100" placeholder="Placeholder kentälle" rows="4"></textarea>
                <select name="type<?php echo $i ?>">
                    <option value="text" <?php echo $row['extraTyyppi'] == "text" ? "selected" : "" ?>>Yhden rivin tekstikenttä</option>
                    <option value="textarea" <?php echo $row['extraTyyppi'] == "textarea" ? "selected" : "" ?>>Usean rivin tekstikenttä</option>
                    <option value="number" <?php echo $row['extraTyyppi'] == "number" ? "selected" : "" ?>>Numerokenttä</option>
                    <option value="email" <?php echo $row['extraTyyppi'] == "email" ? "selected" : "" ?>>Sähköpostikenttä</option>
                    <option value="date" <?php echo $row['extraTyyppi'] == "date" ? "selected" : "" ?>>Päivämäärä</option>
                    <option value="tel" <?php echo $row['extraTyyppi'] == "tel" ? "selected" : "" ?>>Puhelinnumero</option>
                    <option value="color" <?php echo $row['extraTyyppi'] == "color" ? "selected" : "" ?>>Väri</option>
                </select>
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
    <button type="button" onclick="redir()" class="btn btn-primary">Varaussivu</button>
    <br><br>
    <input name="rows" type="hidden" value="<?php echo $i ?>">
    <?php
}