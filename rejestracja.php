<head>
<!DOCTYPE html>
<title>Olszewski</title>
<meta charset="UTF-8">

</head>

<body>
<a href="http://www.webolo.hekko24.pl/index.php">Strona główna</a>
<a href="http://www.webolo.hekko24.pl/zadanie7/index7.php">Powrót</a>


 
<form method="POST" action="rejestracja.php"><br>
<b>Login:</b> <input type="text" name="login"><br><br>
<b>Hasło:</b> <input type="password" name="haslo"><br><br>

<input type="submit" value="Utwórz konto" name="rejestruj">

</form>

 <?php
 
 
$polaczenie = mysql_connect(localhost, dam3624_zad7, damian94xx);
$baza = mysql_select_db("dam3624_zad7");


if (isset($_POST['rejestruj']))
{
   $login = $_POST['login'];
   $haslo = $_POST['haslo'];
   $katalog = 'pliki/'; 
   
   // sprawdzamy czy login nie jest już w bazie
   if (mysql_num_rows(mysql_query("SELECT login FROM users WHERE login = '".$login."';")) == 0)
   {
     
         mysql_query("INSERT INTO `users` (`login`, `haslo`)
            VALUES ('".$login."', '".md5($haslo)."');");
 
         echo "Konto zostało utworzone!";
      
       }
   else echo "Podany login jest już zajęty.";
 //jeśli katalog nie istnieje tworzy go z nazwą loginu
if (!file_exists(''.$katalog.''.$login.'')) 
{ mkdir ("pliki/$login", 0777); 
 }

else{ 
 
} 
}



 ?>
<?php mysql_close(); ?>
</body>