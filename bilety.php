<?php

function filtruj($zmienna)
{
    if(get_magic_quotes_gpc())
        $zmienna = stripslashes($zmienna); // usuwamy slashe
 
   // usuwamy spacje, tagi html oraz niebezpieczne znaki
    return mysql_real_escape_string(htmlspecialchars(trim($zmienna)));
}

	session_start();
	$polacz=mysql_connect('localhost','root','') or die ( "Nie połaczono z serwerem" );
	$polacz2=mysql_select_db('kino1',$polacz)  or die ("Nie połaczono z bazą" );
	mysql_query("SET NAMES 'utf8'");

	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	if(isset($_SESSION['koszyk']))
	{
		echo("Sesja już istnieje!");
	
	

	
		if (isset($_POST['bilety'])){
		


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

				$result3=mysql_query('
					SELECT rezerwacja_miejsca.Status_siedzenia FROM rezerwacja_miejsca inner join sale on 
					rezerwacja_miejsca.ID_siedzenia=sale.Siedzenie JOIN rezerwacja on rezerwacja_miejsca.ID_rezerwacji=rezerwacja.ID_rezerwacji 
					join repertuar on rezerwacja.ID_repertuar=repertuar.ID_repertuaru
					WHERE sale.Rzad='.(int)$rzad.' and sale.miejsce='.(int)$miejsce.' 
					and repertuar.ID_repertuaru='.(int)$ID_repertuaru.';
					');
					
				if(mysql_fetch_row($result3))
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
					alert("To miejsce jest zajęte!");
					window.location.href = "repertuar.php";
					</script>
					</body>
					</html>				
					');
						

				}
				else
				{
					$flaga=0;
					for($x=0;$x<((int)$_SESSION['koszyk']['index']);$x++)
					{
							if((($_SESSION['koszyk']['rzad'][$x])==(int)$rzad) && (($_SESSION['koszyk']['miejsce'][$x])==(int)$miejsce) && ($_SESSION['koszyk']['ID_repertuar'][$x]== (int)$ID_repertuaru))
								{
									$flaga=1;
									break;
								}		
					}
	
					if( $flaga==1 )
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
						alert("Zarezerwowałeś już to miejsce");
						window.location.href = "repertuar.php";
						</script>
						</body>
						</html>				
						');
					}
					else
					{
						if(preg_match("/^[0-9]{9}$/", $telefon))
						{
							$array = explode(",",$_POST['bilety']);
							$_SESSION['koszyk']['ID_repertuar'][$_SESSION['koszyk']['index']]= $ID_repertuaru;
							$_SESSION['koszyk']['modal'][$_SESSION['koszyk']['index']] = $modal;
							$_SESSION['koszyk']['ilosc'][$_SESSION['koszyk']['index']] = $ilosc ;
							$_SESSION['koszyk']['rzad'][$_SESSION['koszyk']['index']]=$rzad;
							$_SESSION['koszyk']['miejsce'][$_SESSION['koszyk']['index']]=$miejsce;
							$_SESSION['koszyk']['imie'][$_SESSION['koszyk']['index']] = $imie;
							$_SESSION['koszyk']['nazwisko'][$_SESSION['koszyk']['index']] = $nazwisko;
							$_SESSION['koszyk']['telefon'][$_SESSION['koszyk']['index']] = $telefon;
							$_SESSION['koszyk']['email'][$_SESSION['koszyk']['index']] = $email;
							$_SESSION['koszyk']['index']= $_SESSION['koszyk']['index'] +1;
							header("Location: repertuar.php");
							exit;
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
							alert("Wprowadź prawidłowy numer telefonu!");
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
			alert("Wprowadź prawidłowy numer telefonu!");
			window.location.href = "repertuar.php";
			</script>
			</body>
			</html>				
			');
	}


?>
