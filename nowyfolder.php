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
<a href="http://www.webolo.hekko24.pl/zadanie7/pliki.php">Powrót</a><br>

<form method="post" action="nowyfolder.php">
<input type="text" name="nazwa">
<input type="submit" value="Utwórz" name="utworz">
</form>

<?php
$login = $_SESSION['login'];
$nazwa = $_POST['nazwa'];

if (isset($_POST['utworz']))
	{
$_SESSION['nazwa'] = $nazwa;
$folder = "pliki/$login/$nazwa";
mkdir ($folder, 0777);
echo "Folder utworzony pomyślnie";
}
?>

</ul>

</body>
