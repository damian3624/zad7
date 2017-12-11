<head>
<!DOCTYPE html>
<title>Olszewski</title>
<meta charset="UTF-8">
</head>

<body>
<a href="http://www.webolo.hekko24.pl/index.php">Strona główna</a>
<a href="http://www.webolo.hekko24.pl/zadanie7/index7.php">Powrót</a>
<br><br>

 
<form method="POST" action="logowanie.php">

<b>Login:</b> <input type="text" name="login" maxlength="10" size="10"><br><br>
<b>Hasło:</b> <input type="password" name="haslo"><br><br>
<input type="submit" value="Zaloguj" name="loguj"><br>
</form>



<?php
session_start();
//session_destroy();
  //  $message="fdsf"; // Wiadomość po wylogowaniu

 
	
mysql_connect("localhost","dam3624_zad7","damian94xx");
mysql_select_db("dam3624_zad7");
 
if (isset($_POST['loguj']))
{
   $login = $_POST['login'];
   $haslo = $_POST['haslo'];
   $status1 = "pomyslne logowanie";
   $status2 = "logowanie nieudane";
   $status3 = "1";
   
   // sprawdzamy czy login i hasło są dobre
   if (mysql_num_rows(mysql_query("SELECT login, haslo FROM users WHERE login = '".$login."' AND haslo = '".md5($haslo)."';")) > 0)
   {
	   
     
	  
	
	  // log - pomyślne logowanie
      mysql_query("INSERT INTO `logi` (`login`, `status`)
            VALUES ('".$login."', '".$status1."');");
			
			mysql_query("UPDATE `logi` SET blednelogowanie = '0' WHERE login = 'asd'");
			
       	    header('Location: http://www.webolo.hekko24.pl/zadanie7/panel.php'); // Przekierowanie do strony main.php
       
	   
 
      $_SESSION['zalogowany'] = true;
      $_SESSION['login'] = $login;
           
      // zalogowany
 
   }
   else 
	   // log - nieudane logowanie
	      
	   echo "Wpisano złe dane. ";
	   mysql_query("INSERT INTO `logi` (`login`, `status`, `blednelogowanie`)
            VALUES ('".$login."', '".$status2."', '".$status3."');");
			
			$wynik=mysql_query("SELECT COUNT(blednelogowanie) AS ilosc FROM logi WHERE login = '".$login."' and blednelogowanie = '1'");
			echo 'Ilość błędnych prób logowania: '.mysql_result( $wynik, 0);
		
	  
}
 if (mysql_result( $wynik, 0)>3)
   {
	   
	     header('Location: http://www.webolo.hekko24.pl/zadanie7/blednelog.php'); 
			
		
   }
?>


</body>