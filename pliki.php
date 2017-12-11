<head>

<!DOCTYPE html>
<title>Olszewski</title>
<meta charset="UTF-8">

</head>

<body>
<?php
session_start();
?>
<ul>
<a href="http://www.webolo.hekko24.pl/index.php">Strona główna</a>
<a href="http://www.webolo.hekko24.pl/zadanie7/panel.php">Powrót</a><br><br>
Zalogowany jako: <?echo  $_SESSION['login'];?><br>
<br><a href="wyslij.php">Dodaj plik</a></br>
<br><a href="nowyfolder.php">Utwórz podfolder</a></br></br>



<?php
$login = $_SESSION['login'];

// Open a known directory, and proceed to read its contents
$plik = file('plik.txt');
echo '<pre>';
print_r($plik);
$location = 'pliki/$login/';

$zrodlowyFolder = "pliki/$login";
//******************************************************
Function ShowFileSize($pliczek){
 $size = (filesize($pliczek));
 if($size > 1048575){
   $size2 = $size / 1048576;
   $size2 = (int) $size2;
   $size = $size - ($size2 * 1048576)  ;
   $size = $size / 1048576;
   $size = $size * 100;
   $size = (int) $size;
   echo "Rozmiar: $size2,";
   if ($size < 10) {echo "0";}
   echo "$size MB<br/>";
 } elseif($size > 1023){
   $size2 = $size / 1024;
   $size2 = (int) $size2;
   $size = $size - ($size2 * 1024)  ;
   $size = $size / 1024;
   $size = $size * 100;
   $size = (int) $size;
   echo "Rozmiar: $size2,";
   if ($size < 10){echo "0";}
   echo "$size KB<br/>";
 } elseif($size < 1024){
   echo "Rozmiar: $size B<br/>";}
}
//******************************************************
function ListFiles($dir){
 $ffs = scandir($dir);
 echo '<ol>';
 foreach($ffs as $ff){
  if($ff != '.' && $ff != '..'){
    if(is_dir($dir.'/'.$ff)){
      echo '<br/>Katalog : '.$ff;
	  
	 	  echo '<br/>>><a href="http://www.webolo.hekko24.pl/zadanie7/podfolder.php" >Idź do podfolderu</a>'; 
	 	  ListFiles($dir.'/'.$ff);}
	   
    else{
      echo '<li>'.'<a href="'.$dir.'/'.$ff.'">'.$ff.'</a><br/>';
      ShowFileSize($dir.'/'.$ff);
	  
   }
   echo '</li>';
  }
 }
 echo '</ol><br/>';
}
//******************************************************
//  glowna czesc programu
//******************************************************
echo '<h3>Pliki w folderze:</h3>';
ListFiles($zrodlowyFolder);
?>

<form method="POST" action="pliki.php"><br>
<input type="submit" value="Wyloguj" name="wyloguj">
<? 
if (isset($_POST['wyloguj']))
{
session_destroy();
header('Location: http://www.webolo.hekko24.pl/zadanie7/logowanie.php');
}
?>

</ul>

</body>
