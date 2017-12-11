<head>

<!DOCTYPE html>
<title>Olszewski</title>
<meta charset="UTF-8">

</head>

<body>
<?php
session_start();
?>
<ul>dsad
<a href="http://www.webolo.hekko24.pl/index.php">Strona główna</a>
<a href="http://www.webolo.hekko24.pl/zadanie7/index7.php">Powrót</a><br><br>
Zalogowany jako: <?echo  $_SESSION['login'];?><br>
<br><a href="pliki.php">Przeglądaj pliki</a></br>

<form method="POST" action="panel.php"><br>
<input type="submit" value="Wyloguj" name="wyloguj">
<? 
if (isset($_POST['wyloguj']))
{
session_destroy();
header('Location: http://www.webolo.hekko24.pl/zadanie7/index7.php');
}
?>




</ul>

</body>
