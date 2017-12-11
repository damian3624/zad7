<?php
session_start();
?>
<?php 
$login = $_SESSION['login'];
$nazwa = $_SESSION['nazwa'];
$plik_tmp = $_FILES['plik']['tmp_name']; 
$plik_nazwa = $_FILES['plik']['name']; 
$plik_rozmiar = $_FILES['plik']['size']; 
$uploaded = "pliki/$login/$nazwa/".$plik_nazwa;


if (is_uploaded_file($plik_tmp)) 
{ 
echo 'Odebrano plik: '.$plik_nazwa.'<br/>'; 
move_uploaded_file($plik_tmp, $uploaded); 
 echo "Plik: <strong>$plik_nazwa</strong> o rozmiarze 
    <strong>$plik_rozmiar bajtów</strong> został przesłany na serwer!"; 
	
} 
else {echo 'Błąd przy przesyłaniu danych!';} 
?>
<br><br>
<a href="http://www.webolo.hekko24.pl/zadanie7/podfolder.php">Powrót do podfolderu</a><br>