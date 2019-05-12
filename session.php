<?php

session_start();

function dodaj()

$_SESSION['bliety']=array('rezerwacje'=>array());




function poczatek_sesji(){

	@session_start()
	{
		if(!isset($_SESSION['bilety']))
		{
			$_SESSION['bliety']=array('rezerwacje'=>array());
		}
	}
}

function dodaj($rezerwacje)
  {
    if (!isset($_POST['rezerwuj'])) return;
    if (count($_POST['rezerwacje'])===0) return;
    $towary=$_POST['rezerwacje'];
    foreach($towary as $towar)
    {
      $id=(int)(substr($towar,0,6));
      $klucz_cena='cena'.$id;
      $klucz_ilosc='ile'.$id;
      if ($ksiazki)
      {
        $count=count($_SESSION['koszyk']['ksiazki']);
        $_SESSION['koszyk']['ksiazki'][$count]['opis']=substr($towar,6);
        $_SESSION['koszyk']['ksiazki'][$count]['cena']=$_POST[$klucz_cena];
        $_SESSION['koszyk']['ksiazki'][$count]['ilosc']=$_POST[$klucz_ilosc];
      }
      else
      {
        $count=count($_SESSION['koszyk']['akcesoria']);
        $_SESSION['koszyk']['akcesoria'][$count]['opis']=substr($towar,6);
        $_SESSION['koszyk']['akcesoria'][$count]['cena']=$_POST[$klucz_cena];
        $_SESSION['koszyk']['akcesoria'][$count]['ilosc']=$_POST[$klucz_ilosc];
      }
    }
  } 




function wyczysc_koszyk(){

    if (!isset($_POST['reseruj'])) 
		return;
    $_SESSION['bilety']['rezerwacje']=array();
    echo '<br />Koszyk jest pusty!';
	
}

function zawartosc(){
	
	if (!isset($_POST['zawartosc'])) return;
    $ksiazki=$_SESSION['koszyk']['ksiazki'];
    $akcesoria=$_SESSION['koszyk']['akcesoria'];
    
    echo '<br />';
    if (count($ksiazki)===0 && count($akcesoria)===0)
    {
      echo 'Koszyk jest pusty!';
      return;
    }
    
    $suma=0;
    if (count($ksiazki)>0)
    {
      echo 'Książki:<br />';
      for($k=0;$k<count($ksiazki);$k++)
      {
        $suma+=$ksiazki[$k]['cena']*$ksiazki[$k]['ilosc'];
        echo ($k+1).'. '.$ksiazki[$k]['opis'].', cena: '
            .$ksiazki[$k]['cena'].', ilość: '.$ksiazki[$k]['ilosc'].'<br />'."\n";
      }
	  
	  
	
	
	
	

}







$polacz=mysql_connect('localhost','root','') or die ( "Nie połaczono z serwerem" );
$polacz2=mysql_select_db('kino1',$polacz)  or die ("Nie połaczono z bazą" );
mysql_query("SET NAMES 'utf8'");


function filtruj($zmienna)
{
    if(get_magic_quotes_gpc())
        $zmienna = stripslashes($zmienna); // usuwamy slashe
 
   // usuwamy spacje, tagi html oraz niebezpieczne znaki
    return mysql_real_escape_string(htmlspecialchars(trim($zmienna)));
}
 
if (isset($_POST['bilety']))
{
   $tmp=($_POST['bilety']);
   $array = explode(",", $tmp);
   $ID_repertuaru=$array[0];
   $modal=$array[1];
   $ilosc =filtruj($_POST['ilosc'.$modal]);
   $rzad=filtruj($_POST['rzad'.$modal]);
   $miejsce=filtruj($_POST['miejsce'.$modal]);
   $imie = filtruj($_POST['imie'.$modal]);
   $nazwisko = filtruj($_POST['nazwisko'.$modal]);
   $telefon = filtruj($_POST['telefon'.$modal]);
   $email = filtruj($_POST['email'.$modal]);
   
   echo('rep' . $ID_repertuaru . '<br>');
   echo('mod' . $modal. '<br>');
   echo('ile' . $ilosc . '<br>');
   echo('rzas' . $rzad . '<br>');
   echo('miej' . $miejsce . '<br>');
   echo('im' . $imie . '<br>');
   echo('naz' . $nazwisko . '<br>');
   echo('tel' . $telefon . '<br>');
   echo('mai' . $email . '<br>');
   
   // sprawdzamy czy istnieje użytkownik
   if (mysql_num_rows(mysql_query("SELECT telefon, adresEmail from uzytkownik where telefon = '".(int)$telefon."' and adresEmail = '".$email."';")) == 0)
   {
			//Jeśli user nie istnieje dodajemy go do bazy
			if(mysql_query("INSERT INTO `uzytkownik` ( `imie`, `nazwisko`, `telefon`, `adresEmail`) VALUES ('".$imie."', '".$nazwisko."', ".(int)$telefon." ,'".$email."');")==0)
				echo('Wystąpił błąd');
			else{
				//wyciągamy ID dodanego użytkownika
				
				$zapytanie=sprintf("SELECT `ID_uzytkownika` FROM `uzytkownik` WHERE telefon = ".(int)$telefon." and adresEmail = '".$email."' LIMIT 1;");
				$wynik=mysql_query($zapytanie);
				$wynik1=mysql_fetch_assoc($wynik);
				$ID_uzytkownika=$wynik1['ID_uzytkownika'];
				//Sprawdzamy czy istnieje rezerwacja
				if(mysql_num_rows(mysql_query("SELECT `ID_repertuar`,`ID_uzytkownika` FROM `rezerwacja` WHERE ID_repertuar =".(int)$ID_repertuaru." and ID_uzytkownika=".(int)$ID_uzytkownika.";"))==0)
				{	//dodajemy rezerwacje jeśli nie istniała
					if(mysql_query("INSERT INTO `rezerwacja` ( `ID_repertuar`, `ID_uzytkownika`) VALUES (".(int)$ID_repertuaru." , ".(int)$ID_uzytkownika.")")==0)
						echo("Błąd rezerwacji 1 ");
					else
					{	
							$zapytanie=sprintf("SELECT `ID_rezerwacji` FROM `rezerwacja` WHERE `ID_repertuar`=".(int)$ID_repertuaru." and `ID_uzytkownika`=".(int)$ID_uzytkownika." LIMIT 1;");
							$wynik=mysql_query($zapytanie);
							$wynik1=mysql_fetch_assoc($wynik);
							$ID_rezerwacji=$wynik1['ID_rezerwacji'];
							$zapytanie=sprintf("Select Siedzenie from sale WHERE rzad =".(int)$rzad." and miejsce=".(int)$miejsce.";");
							$wynik=mysql_query($zapytanie);
							$wynik1=mysql_fetch_assoc($wynik);
							$ID_siedzenia=$wynik1['Siedzenie'];
							if(mysql_query("INSERT INTO `rezerwacja_miejsca` (`ID_rezerwacji`, `ID_siedzenia`, `Status_siedzenia`) VALUES (".(int)$ID_rezerwacji.", ".(int)$ID_siedzenia.", 1);")==0)
								echo("Błąd rezerwacji! 3");
							else
								echo file_get_contents('index.html');
					}
							
				}
				}

					
	}
	}
	else
	{
	echo("dupa");
	/*
				$ID_uzytkownika=mysql_query("SELECT `ID_uzytkownika` FROM `uzytkownik` WHERE telefon = '".(int)$telefon."' and adresEmail = '".$email."';");
				echo($ID_uzytkownika);
				if(mysql_query("SELECT `ID_repertuar`,`ID_uzytkownika` FROM `rezerwacja` WHERE ID_repertuar ='".(int)$ID_repertuaru"' and ID_uzytkownika='".(int)$ID_uzytkownika"'")==0)
				{
					
				}
				else
				{
					echo("Rezerwacja na ten dzień została już przez ciebie dokonana!");
				}
	*/
	}
			
			
			
	
	  /*
         mysql_query("INSERT INTO `kino1`.`uzytkownik` ( `imie`, `nazwisko`, `telefon`, `adresEmail`) 
		 VALUES ('".$imie."', '".$nazwisko."', ".$email.", ".$telefon.");");
		
		mysql_query("INSERT INTO `kino1`.`uzytkownik` ( `imie`, `nazwisko`, `telefon`, `adresEmail`) 
		 VALUES ('".$imie."', '".$nazwisko."', ".$email.", ".$telefon.");");
		*/

		
		 
     
   


?>
