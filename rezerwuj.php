<?php
	session_start();
	if(isset($_SESSION['koszyk'])){
		$polacz=mysql_connect('localhost','root','') or die ( "Nie połaczono z serwerem" );
		$polacz2=mysql_select_db('kino1',$polacz)  or die ("Nie połaczono z bazą" );
		mysql_query("SET NAMES 'utf8'");	
		echo("Sesja już istnieje!");
			if (isset($_SESSION['koszyk'])){
				for($i=0;$i<((int)$_SESSION['koszyk']['index']);$i++){
				   if(mysql_num_rows(mysql_query("SELECT telefon, adresEmail from uzytkownik where telefon = ".(int)$_SESSION['koszyk']['telefon'][$i]." and adresEmail = '".$_SESSION['koszyk']['email'][$i]."';"))== 0)
					{
					echo mysql_error();
						if(mysql_query("INSERT INTO `uzytkownik` ( `imie`, `nazwisko`, `telefon`, `adresEmail`) VALUES 
						('".$_SESSION['koszyk']['imie'][$i]."', '".$_SESSION['koszyk']['nazwisko'][$i]."', ".(int)$_SESSION['koszyk']['telefon'][$i]." ,'".$_SESSION['koszyk']['email'][$i]."');")== 0)
							echo('Wystąpił błąd :c Sprubuj se ponownie');
						else
						{
							$zapytanie=sprintf("SELECT `ID_uzytkownika` FROM `uzytkownik` WHERE telefon = ".(int)$_SESSION['koszyk']['telefon'][$i]." and adresEmail = '".$_SESSION['koszyk']['email'][$i]."' LIMIT 1;");
							$wynik=mysql_query($zapytanie);
							$wynik1=mysql_fetch_assoc($wynik);
							$ID_uzytkownika=$wynik1['ID_uzytkownika'];
							if(mysql_query("INSERT INTO `rezerwacja` ( `ID_repertuar`, `ID_uzytkownika`) VALUES (".(int)$_SESSION['koszyk']['ID_repertuar'][$i]." , ".(int)$ID_uzytkownika.")")== false)
								echo("Błąd rezerwacji. se ponownie sprubujuj. ");
							else{
								$zapytanie=sprintf("SELECT `ID_rezerwacji` FROM `rezerwacja` WHERE `ID_repertuar`=".(int)$_SESSION['koszyk']['ID_repertuar'][$i]." and `ID_uzytkownika`=".(int)$ID_uzytkownika." LIMIT 1;");
								$wynik=mysql_query($zapytanie);
								$wynik1=mysql_fetch_assoc($wynik);
								$ID_rezerwacji=$wynik1['ID_rezerwacji'];
								$zapytanie=sprintf("Select Siedzenie from sale WHERE rzad =".(int)$_SESSION['koszyk']['rzad'][$i]." and miejsce=".(int)$_SESSION['koszyk']['miejsce'][$i].";");
								$wynik=mysql_query($zapytanie);
								$wynik1=mysql_fetch_assoc($wynik);
								$ID_siedzenia=$wynik1['Siedzenie'];
								if(mysql_query("INSERT INTO `rezerwacja_miejsca` (`ID_rezerwacji`, `ID_siedzenia`, `Status_siedzenia`) VALUES (".(int)$ID_rezerwacji.", ".(int)$ID_siedzenia.", 1);")==0)
									echo("Błąd rezerwacji! 3");
								else
									{
										session_destroy();
										echo('		
											<!DOCTYPE html>
											<html lang="en">
											<head>
											<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
											<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
											<title>Kino</title>
											</head>
											<body>
											<script type="text/javascript">
											alert("Twoje rezerwacje przebiegły pomyślnie!");
											window.location.href = "repertuar.php";
											</script>
											</body>
											</html>	
										');
									}
									
							}
						}
					}
					else
					{
						$zapytanie=sprintf("SELECT `ID_uzytkownika` FROM `uzytkownik` WHERE telefon = ".(int)$_SESSION['koszyk']['telefon'][$i]." and adresEmail = '".$_SESSION['koszyk']['email'][$i]."' LIMIT 1;");
						$wynik=mysql_query($zapytanie);
						$wynik1=mysql_fetch_assoc($wynik);
						$ID_uzytkownika=$wynik1['ID_uzytkownika'];
						if(mysql_query("INSERT INTO `rezerwacja` ( `ID_repertuar`, `ID_uzytkownika`) VALUES (".(int)$_SESSION['koszyk']['ID_repertuar'][$i]." , ".(int)$ID_uzytkownika.")")==0)
							echo("Błąd rezerwacji. se ponownie sprubujuj. ");
						else{
							$zapytanie=sprintf("SELECT `ID_rezerwacji` FROM `rezerwacja` WHERE `ID_repertuar`=".(int)$_SESSION['koszyk']['ID_repertuar'][$i]." and `ID_uzytkownika`=".(int)$ID_uzytkownika." LIMIT 1;");
							$wynik=mysql_query($zapytanie);
							$wynik1=mysql_fetch_assoc($wynik);
							$ID_rezerwacji=$wynik1['ID_rezerwacji'];
							$zapytanie=sprintf("Select Siedzenie from sale WHERE rzad =".(int)$_SESSION['koszyk']['rzad'][$i]." and miejsce=".(int)$_SESSION['koszyk']['miejsce'][$i].";");
							$wynik=mysql_query($zapytanie);
							$wynik1=mysql_fetch_assoc($wynik);
							$ID_siedzenia=$wynik1['Siedzenie'];
							if(mysql_query("INSERT INTO `rezerwacja_miejsca` (`ID_rezerwacji`, `ID_siedzenia`, `Status_siedzenia`) VALUES (".(int)$ID_rezerwacji.", ".(int)$ID_siedzenia.", 1);")==0)
								echo("Błąd rezerwacji! 3");
							else
								{
									session_destroy();
									echo('		
										<!DOCTYPE html>
										<html lang="en">
										<head>
										<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
										<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
										<title>Kino</title>
										</head>
										<body>
										<script type="text/javascript">
										alert("Twoje rezerwacje przebiegły pomyślnie!");
										window.location.href = "repertuar.php";
										</script>
										</body>
										</html>	
									');
								}
									
						}
					}
						
				}

		}
	}
	else
	{
		echo('		
				<!DOCTYPE html>
				<html lang="en">
				<head>
				<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
				<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
				<title>Kino</title>
				</head>
				<body>
				<script type="text/javascript">
				alert("Twój koszyk jest pusty!");
				window.location.href = "repertuar.php";
				</script>
				</body>
				</html>	
			');
	}
	
?>
