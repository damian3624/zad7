<head>
<!DOCTYPE html>
<title>Olszewski</title>
<meta charset="UTF-8">

</head>
<html> 
<body> 
<?php
session_start();
?>
<ul>
<a href="http://www.webolo.hekko24.pl/index.php">Strona główna</a>
<a href="http://www.webolo.hekko24.pl/zadanie7/podfolder.php">Powrót</a><br><br>
Zalogowany jako: <?echo  $_SESSION['login'];?><br>
Dodajesz plik do podfolderu: <?echo  $_SESSION['nazwa'];?><br>
<br>
<form  action="odbierz2.php" method="POST" 
ENCTYPE="multipart/form-data"> 
<input type="file" name="plik"/><br><br>
<input type="submit" value="Wyślij plik"/> 
</form> 
<ul/>
</body> 
</html>