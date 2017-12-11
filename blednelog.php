<head>

<!DOCTYPE html>
<title>Olszewski</title>
<meta charset="UTF-8">
Konto zostało zablokowane. Możesz się ponownie zalogować po upływie[sek]
<span id="sekundy"></span>
<script type="text/javascript">
o = document.getElementById('sekundy')
   function odliczaj(o,sek)
   {
      o.innerHTML=sek
      if(sek > 0) 
      {
         set = setTimeout(function(){odliczaj(o,--sek)},1e3)
      }
      if (sek == 0)
      {
         div = document.getElementById('hide');
         div.style.display = 'block';
      }
   }
  

odliczaj(document.getElementById('sekundy'), 60)
</script>
<div id="hide" style="display:none;">
<a href="http://www.webolo.hekko24.pl/zadanie7/logowanie.php">Przejdź do strony logowania</a>
<!-- to sie pokaze  po xx sekundach-->
</div>
</script>
</head>

