<?php

	session_start();
	if(isset($_SESSION['koszyk']))
	{
		echo("Sesja już istnieje!");
		if (isset($_POST['anuluj'])){
			   $liczba=($_POST['bilety']);
				
				for($i=0;$i<((int)$_SESSION['koszyk']['index']);$i++)
				{
					if($i==(int)$liczba)
					{
						array_splice($_SESSION['koszyk']['ID_repertuar'][$i], $i);
						array_splice($_SESSION['koszyk']['modal'][$i] , $i); 
						array_splice($_SESSION['koszyk']['ilosc'][$i], $i); 
						array_splice($_SESSION['koszyk']['rzad'][$i], $i);
						array_splice($_SESSION['koszyk']['miejsce'][$i], $i);
						array_splice($_SESSION['koszyk']['imie'][$i] , $i);
						array_splice($_SESSION['koszyk']['nazwisko'][$i], $i);
						array_splice($_SESSION['koszyk']['telefon'][$i] , $i);
						array_splice($_SESSION['koszyk']['email'][$i] , $i);
						$_SESSION['koszyk']['index']= $_SESSION['koszyk']['index']-1;
					}
						
				}
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
				alert("Wytąpił błąd usunięcia elementu!");
				window.location.href = "repertuar.php";
				</script>
				</body>
				</html>	
			');
	}
	}

				
?>
