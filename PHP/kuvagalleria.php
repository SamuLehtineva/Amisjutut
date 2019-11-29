<!DOCTYPE HTML> 
<html> 
<head> 
<meta charset="utf-8"> 
<title>Leenan kuvat</title> 
</head> 
<body> 


<?php 
/* gallery.php 

***********OHJE************************** 
Kuvaruudulle tulostuu kuvanlisäyslomake ja kaikki kuvat taulukossa. 
Jos käyttäjä klikkaa yhtä kuvaa, se avaa sen isompana ruudulle. 
Lomakkeen avulla taas voi lisätä kuvia 

1. Luo aluksi hakemistot upload, kuvat, thumbs ja niille kirjoitusoikeudet 
2. Sijoita samaan kansioon myös aiheeseen littyvät funktiot 


Käyttö omalla vastuulla, muokkaaminen sallittu ja jopa suotavaa. 
Koodailija (alkuperäinen: Tinqe ( #kumilenkki @ QuakeNet | tinqe (a) kumilenkki.com ) 
Versio 0.2 
Korjauksia LJN 
*/ 

// Muutettavat arvot 
$conf_maxfilesize = 2048; // kt 
$tmb_max_w = 160; // Thumb-kuvan max-leveys 
$tmb_max_h = 120; // Thumb-kuvan max korkeus 
$img_max_w = 640; // Kuvan max leveys 
$img_max_h = 480; // Kuvan max korkeus 

// Tarvittavat funktiot 
include('func_gallery.php'); 

// Tiedostokoko kt tavuiksi 
$conf_maxfilesize = $conf_maxfilesize*2048; 

// Tyhjä virheviesti 
$error = ''; 

// Tiedoston lisäyslomake 
print('<form enctype="multipart/form-data" action="gallery.php" method="POST"> 
<input type="hidden" name="MAX_FILE_SIZE" value="'.$conf_maxfilesize.'"> 
Valitse kuva <input name="file" type="file"> 
<input type="submit" name="submit" value="Lataa kuva"> 
</form> 
<br>'); 

if(isset($_POST['submit'])) { 
    // Kuvan tiedot 
    list($type,$ext,$width,$height) = image_information($_FILES['file']['tmp_name']); 
    
    // Tarkastetaan tiedoston koko 
    $file_check = TRUE; 
    if($_FILES["file"]["size"] > $conf_maxfilesize) { 
        $file_check = FALSE; 
        $error = $error."Tiedosto on liian suuri!<br>"; 
    } 
    elseif($_FILES["file"]["size"] == 0) { 
        $file_check = FALSE; 
        $error = $error."Tiedoston koko on 0!<br>"; 
    } 
    if($file_check && $type){ 
        $timestamp = time(); 
         
        // Tallennetaan thumbnail 
        $destination_file = 'thumbs/'.$timestamp.'.'.$ext; 
        create_resized_image($_FILES['file']['tmp_name'],$destination_file,$tmb_max_w,$tmb_max_h); 
         
        // Tallennetaan muutettu kuva tiedostoon 
        $destination_file = 'kuvat/'.$timestamp.'.'.$ext; 
        create_resized_image($_FILES['file']['tmp_name'],$destination_file,$img_max_w,$img_max_h); 
         
        // Tallennetaan alkuperäinen kuva 
        move_uploaded_file($_FILES["file"]["tmp_name"], 'upload/'.$timestamp.'.'.$ext); 
        print('Kuva tallennettu palvelimelle.'); 
    } 
    else    { 
        // Virheviesti 
        print($error); 
    } 
} 

print('<p><a href="gallery.php?">Galleriasivu</a></p>'); 
// Jos halutaan näyttää yksi kuva, näytetään se 
if(isset($_GET['i'])) { 
    print('<img border="0" src="kuvat/'.$_GET['i'].'">'); 
    print('<br><a href="upload/'.$_GET['i'].'">Näytä alkuperäinen kuva</a>'); 
    $info =  image_information('upload/'.$_GET['i']); 
    print('<br>Koko: '.$info[2].'x'.$info[3].''); 
    $filesize = round($info[4]/1024); 
    print('<br>Tiedosto: '.$filesize.'kt'); 
    } 
else { 
    // Käydään kansion sisältö läpi ja luodaan lista kuvista 
    $folder = opendir("thumbs/"); 
    //luetaan ensimmäisen tiedoston nimi 
    $filename = readdir($folder); 

    //jatketaan niin kauan kun $nimi ei ole false 
    $col = 1; 
    print('<table border="0"><tr>'); 
    while ($filename) { 
        //tulostetaan tiedoston nimi 
        if(is_file('thumbs/'.$filename)) { 
            // Tulostetaan taulukon solu 
            print('<td width="180" align="center"><a href="gallery.php?i='.$filename.'"><img src="thumbs/'.$filename.'" border="0"></a></td>'); 
            if($col == 5) { 
                // Jos rivillä on jo 4 kuvaa, aloita seuraava rivi 
                $col = 0; 
                print('</tr><tr>'); 
            } 
            $col = $col+1; 
        } 
        //luetaan seuraavan tiedoston nimi 
        $filename = readdir($folder); 
    } 
    if($col < 4) { 
        // Jos viimeinen rivi jää vajaaksi, tee tyhjiä soluja ja lopeta taulukko 
        print('<td> </td>'); 
    } 
    print('</tr></table>'); 
    //suljetaan hakemisto 
    closedir($folder); 
} 
?> 
</body> 
</html>
func_gallery.php
<?php 
/* func_gallery.php 
Gallerian funktiot 
*/ 
function image_information($original_file) 
{ 
    // Ottaa tarkistettavan tiedoston nimen ja tarkistaa sen tiedostopäätteen välittämättä tiedostonimestä, toimii kuville 
    $type = getimagesize($original_file); 
    $filesize = filesize($original_file); 
    
    // Tarkistetaan tiedoston tyyppi 
    if($type[2] == 1) { //GIF 
        $file_extension = "gif"; 
    } 
    elseif($type[2] == 2) { // JPEG 
        $file_extension = "jpg"; 
    } 
    elseif($type[2] == 3){ // PNG 
        $file_extension = "png"; 
    } 
    else { 
        $file_extension = FALSE;// Tiedostomuoto ei ole tuettu, palauttaa FALSE 
    } 
    // Funktio palauttaa arvot, jos ok 
    if($file_extension){ 
        return array($type[2],$file_extension,$type[0],$type[1],$filesize);// palauttaa type,tiedostopääte,leveys,korkeus,tiedostokoko 
    } 
    else { 
        // Tiedostotyyppi ei ole tuettu tai jotain häiriöö 
        return array(FALSE,FALSE,FALSE,FALSE); 
    } 
} 

function create_resized_image($original_file,$destination_file,$resized_width,$resized_height) 
{ 
    // Ottaa syötteenä vastaan (alkuperäinen tiedosto), (uuden kuvan hakemisto/tiedosto ilman päätettä), (uusi leveys), (uusi korkeus) 
    
    // Selvitetään kuvan koko ja tyyppi 
    list($original_width, $original_height, $type) = getimagesize($original_file); 
    
    // Tarkistetaan tiedoston tyyppi 
    if($type == 1) {// GIF 
        $original_image = imagecreatefromgif($original_file); 
        // Läpinäkyvyys -> valkoinen 
        $white = imagecolorallocate($original_image, 255, 255, 255); 
        $transparent = imagecolortransparent($original_image, $white); 
    } 
    elseif($type == 2){ // JPEG 
            $original_image = imagecreatefromjpeg($original_file); 
    } 
    elseif($type == 3){ // PNG 
        $original_image = imagecreatefrompng($original_file); 
    } 
    else {// Tiedostomuoto ei ole tuettu, palauttaa FALSE 
        $type = FALSE; 
    } 
    if($type){ 
        // Lasketaan kuvalle uusi koko siten, että kuvasuhde säilyy 
        $new_w = $original_width/$resized_width; // Kuvasuhde: leveys 
        $new_h = $original_height/$resized_height; // Kuvasuhde: korkeus 
        if($new_w > $new_h || $new_w == $new_h){ 
            if($new_w < 1){ 
                // Jos alkuperäinen kuva on pienempi kuin luotava, luodaan alkuperäisen kokoinen kuva 
                $new_w = 1; 
            } 
            // Käytetään sitä suhdetta, jolla tulee max. asetettu leveys, korkeus on alle max. 
            $new_width = $original_width / $new_w; 
            $new_height = $original_height / $new_w; 
        } 
        elseif($new_w < $new_h) { 
            if($new_h < 1) { 
                // Jos alkuperäinen kuva on pienempi kuin luotava, luodaan alkuperäisen kokoinen kuva 
                $new_h = 1; 
            } 
            // Käytetään sitä suhdetta, jolla tulee max. asetettu korkeus, leveys on alle max. 
            $new_width = $original_width / $new_h; 
            $new_height = $original_height / $new_h; 
        } 
        // Luodaan kuva, joka on määrätyn kokoinen 
        $image = imagecreatetruecolor($new_width, $new_height); 
         
        // Resample, luo uuden kuvan tiedostoon 
        imagecopyresampled($image, $original_image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height); 
        
        // Tallennetaan uusi kuva määriteltyyn tiedostoon ja annetaan sopiva tiedostopääte 
        if($type == 1) {// GIF 
            imagegif($image, $destination_file); 
        } 
        elseif($type == 2) {// JPEG 
            imagejpeg($image, $destination_file); 
        } 
        elseif($type == 3){ // PNG 
            imagepng($image, $destination_file); 
        } 
    } 
    // Poistetaan kuva muistista, ei tuhoa alkuperäistä tiedostoa! 
    imagedestroy($image); 
     
    // Palauttaa tiedostotyypin onnistuessaan, FALSE jos ei onnistu 
    return $type; 
} 
?> 