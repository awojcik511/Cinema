<?php

    session_start();
	if (!isset($_SESSION['koszyk']))
	{
	$_SESSION['koszyk']=array(
	'ID_repertuar'=>array(),
	'modal'			=>	array(),
	'ilosc'			=>	array(),
	'rzad'			=>	array(),
	'miejsce'		=>	array(),
	'imie'			=>	array(),
	'nazwisko'		=>	array(),
	'telefon'		=>	array(),
	'email'			=> array(),
	'index'			=> 0
	);
	}

	$polacz=mysqli_connect('localhost','root','','kino1');
	
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Kino</title>
  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="index.html" class="brand-logo"><img src="img/logo.png" width="45%" height="45%"></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="repertuar.php">Repertuar</a></li>
		  <li><a href="wiecej.html">Oferty</a></li>
		  <li><a href="#koszyk">Koszyk</a></li>
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="repertuar.php">Repertuar</a></li>
		  <li><a href="wiecej.html">Oferty</a></li>
		   <li><a href="wiecej.html">Oferty</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
	
	  <!-- Modal Structure -->
  <div id="koszyk" class="modal">
    <div class="modal-content">
      <h4>Aktualnie wybrane produkty</h4>
      <p>

	  <form class="col s12" action="usun.php" method="post" name="koszyk">
      <table class="highlight">
        <thead>
          <tr>
              <th>Film</th>
              <th>Dzień</th>
              <th>Godzina</th>
			  <th>Cena</th>
			  <th>Anuluj rezerwacje</th>
          </tr>
        </thead>
		<tbody>
		<?php
		
		if(isset($_SESSION['koszyk']))
		{
		$polacz=mysql_connect('localhost','root','') or die ( "Nie połaczono z serwerem" );
		$polacz2=mysql_select_db('kino1',$polacz)  or die ("Nie połaczono z bazą" );
		mysql_query("SET NAMES 'utf8'");	

		if($_SESSION['koszyk']['index']>=0)
		{
		for($i=0; $i<((int)$_SESSION['koszyk']['index']);$i++) 
		{
		$result=mysql_query("Select film.Tytul, repertuar.Dzien, repertuar.Godzina 
		from film inner JOIN repertuar on film.ID_filmu=repertuar.ID_filmu 
		where repertuar.ID_repertuaru=".(int)$_SESSION['koszyk']['ID_repertuar'][$i]."; ");

			while($row = mysql_fetch_row($result))
			{
				echo('
				
				<tr>
				<td>'.$row[0].'</td>
				<td>'.$row[1].'</td>
				<td>'.$row[2].'</td>
				<td> 10zł </td>
				<td> 
				<button class="btn waves-effect waves-light" value="'.(int)$i.'" type="submit" name="anuluj" > Anuluj
				</td>
				</tr>
				
				');
			}
		}
		}
		}
		
		
		?>
		</tbody>
		</table>
		</form>
	  </p>
    </div>
    <div class="modal-footer">
	  <a href="rezerwuj.php" class="waves-effect waves-green btn-flat" value="czysc">Potwierdź rezerwacje</a>
	  <a href="logout.php" class="waves-effect waves-green btn-flat">Wyczyść koszyk</a>
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Zamknij</a>
    </div>
  </div>

	
	
  <div class="slider">
    <ul class="slides">
	      <li>
		  <a href="film1.php">
        <img src="img/slides/1.jpg"> </a>
        <div class="caption right-align">
          <h3>Czerwona jaskółka</h3>
          <h5 class="light grey-text text-lighten-3">Młoda Rosjanka wbrew swojej woli odbywa szkolenie,<br>
		  podczas którego uczy się uwodzić szpiegów.<br> Niebawem zostaje wysłana do Budapesztu...</h5>
        </div>
      </li>
      <li>
	   <a href="film2.php">
        <img src="img/slides/2.jpg"> 
		</a>
        <div class="caption right-align">
          <h3>Bohemian Rhapsody </h3>
          <h5 class="light grey-text text-lighten-3">Dzięki oryginalnemu brzmieniu Queen staje się jednym <br> 
		  z najpopularniejszych zespołów w historii muzyki.
		  </h5>
        </div>
      </li>
      <li>
       <a href="film3.php">
        <img src="img/slides/3.jpg"> 
		</a>
        <div class="caption right-align">
          <h3>Ciche miejsce</h3>
          <h5 class="light grey-text text-lighten-3">Pięcioosobowa rodzina stara się przetrwać<br> w świecie pełnym potworówtóre <br> 
		  stanowią śmiertelne niebezpieczeństwo,<br> a zwabia je najmniejszy hałas.		  <h5>
        </div>
      </li>
      <li>
        <a href="film4.php">
        <img src="img/slides/4.jpg"> 
		</a>
        <div class="caption right-align">
          <h3>Najlepszy</h3>
          <h5 class="light grey-text text-lighten-3">Historia życia Jerzego Górskiego,<br> który mimo wielu przeciwności został<br> mistrzem świata w podwójnym triatlonie.</h5>
        </div>
      </li>
    </ul>
  </div>
      <br><br>

    </div>
  </div>

    <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
          <div class="icon-block">
            <h5 class="center">Repertuar kina na ten tydzień</h5>
<?php

?>
			
			    
<ul class="collapsible">
  <li>
    <div class="collapsible-header">
      Poniedziałek
      <span class="badge">3</span></div>
    <div class="collapsible-body"><p>      
	<table class="highlight">
        <thead>
          <tr>
              <th>Tytuł</th>
              <th>Godziny seansów</th>
              <th> </th>
          </tr>
        </thead>

        <tbody>
         <?php
		$polacz=mysql_connect('localhost','root','') or die ( "Nie połaczono z serwerem" );
		$polacz2=mysql_select_db('kino1',$polacz)  or die ("Nie połaczono z bazą" );
		mysql_query("SET NAMES 'utf8'");		
		$result=mysql_query("SELECT  `Tytul`, GROUP_CONCAT(Distinct godzina Separator ',') as Godzina,  GROUP_CONCAT(Distinct repertuar.modal Separator ',') as modal, 
		GROUP_CONCAT(Distinct repertuar.ID_repertuaru Separator ',') as rep
		FROM `repertuar`inner join film on repertuar.ID_filmu=film.ID_filmu where Dzien like 'Pon%'group by tytul");

			while($row = mysql_fetch_row($result))
			{
			$godzina = explode(",", $row[1]);
			$modal = explode(",", $row[2]);
			$repertuar = explode(",", $row[3]);
			echo(' <tr><td>'.$row[0].'</td> <td>');	
			for($c = 0; $c < sizeof($modal);$c++)
					{
					echo ('	
					<a class="waves-effect waves-light btn" href="#'.$modal[$c].'">'.$godzina[$c].' </a>
					');
					
					if(sizeof($modal)!=1)
						echo('<br><br>');
					
					}
					echo('</td></tr>');
			

			
			for($i = 0; $i < sizeof($modal);$i++)
				{		
					$liczba = substr($modal[$i], 5);
					echo('		
							
							<div id="'.$modal[$i].'" class="modal">
							<div class="modal-content">
							<h4>'.$row[0].' </h4>
							<h5>Godzina: '.$godzina[$i].' + '.$modal[$i].' + '.$liczba.' </h5>
								<p>
								<form class="col s12" action="bilety.php" method="post" name="'.$modal[$i].'">
								<div class="row">
								<div class="row">
								<div class="input-field col s12">
								<center> <h5>Widok sali</h5> </center>
								<center>
								<img src="img/sala/wolne.jpg"> Wolne miejsca
								<img src="img/sala/zarezerwowane.jpg"> Zarezerwowane miejsca
								<img src="img/sala/sesja.jpg"> Miejsca z Twojego koszyka
								<br>
								<img src="img/sala/screen.png"></div> 
								<center>
								
								');
								$index=0;
									for($z=1;$z<=4;$z++)
										{
										echo('<h6>  </h6>');
											for($j=1;$j<=10;$j++)
											{
												$result2=mysql_query('select sale.Rzad, sale.miejsce from rezerwacja
													inner join rezerwacja_miejsca on rezerwacja.ID_rezerwacji=rezerwacja_miejsca.ID_rezerwacji
													right join sale on rezerwacja_miejsca.ID_siedzenia=sale.Siedzenie
													where rezerwacja.ID_repertuar='.$repertuar[$i].'');
													
												$flag=0;
												while($row3 = mysql_fetch_row($result2))
												{
					
													if(($row3[0]==$z) && ($row3[1]==$j))
													{
														echo
														(
															'<a class="btn disabled">'.$j.'</a>'
														);
													$flag=1;
													break;
													}
												}
												$tmp=0;
												while( $tmp < ($_SESSION['koszyk']['index']))
												{
													
													if((($_SESSION['koszyk']['rzad'][$tmp])==$z) && (($_SESSION['koszyk']['miejsce'][$tmp])==$j) && ($_SESSION['koszyk']['ID_repertuar'][$tmp]== $liczba))
													{
														echo
														(
															'<a class="waves-effect waves-light btn" style="color:white ; background-color:#4b666e;"> '.$j.' </a>'
														);
													$flag=1;
													break;
													}
													$tmp++;
												}
												
												if($flag==0)
												{
													if(($j%10)==0)
													{
														echo('<a class="waves-effect waves-light btn"> '.$j.' </a>');
														echo('<br>');
													}
													else
														echo('<a class="waves-effect waves-light btn"> '.$j.' </a>');
												}
	
											}
											$index++;
										};
										$index=0;
					
					echo('
					</center>			
					</div>
					<div class="row">
					<div class="input-field col s3">
					<input id="ilosc'.$liczba.'" name="ilosc'.$liczba.'" type="text" class="validate">
					<label for="ilosc'.$liczba.'">Ilość miejsc:</label>
					</div>
					<div class="input-field col s3">
					<input id="rzad'.$liczba.'" name="rzad'.$liczba.'" type="text" class="validate">
					<label for="rzad'.$liczba.'">Rząd</label>
					</div>
					<div class="input-field col s3">
					<input id="miejsce'.$liczba.'" name="miejsce'.$liczba.'" type="text" class="validate">
					<label for="miejsce'.$liczba.'">Miejsce</label>
					</div>
					</div>
					<div class="row">
					<div class="input-field col s6">
					<i class="material-icons prefix">account_circle</i>
					<input id="imie'.$liczba.'" name="imie'.$liczba.'" type="text" class="validate">
					<label for="imie'.$liczba.'">Imię</label>
					</div>
					<div class="input-field col s6">
					<input id="nazwisko'.$liczba.'" name="nazwisko'.$liczba.'" type="text" class="validate">
					<label for="nazwisko'.$liczba.'">Nazwisko</label>
					</div>
					</div>

					<div class="input-field col s6">
					<i class="material-icons prefix">phone</i>
					<input id="telefon'.$liczba.'" name="telefon'.$liczba.'" type="tel" class="validate">
					<label for="telefon'.$liczba.'">Telefon</label>
					</div>
					<div class="input-field col s6">
					<input id="email'.$liczba.'" name="email'.$liczba.'" type="email" class="validate">
					<label for="email'.$liczba.'">Email</label>
					<span class="helper-text" data-error="Wprowadzony tekt nie jest adresem email!" data-success="OK"></span>
					</div>
					</p>
					<div class="modal-footer">

					  <button class="btn waves-effect waves-light" value="'.$repertuar[$i].','.$liczba.'" type="submit" name="bilety" >Rezerwuj
					   <i class="material-icons right">send</i>
						</button>
					<a href="#!" class="modal-close waves-effect waves-green btn-flat">Anuluj</a>
					</div>
					</form>
					</div>	
					</div>
					</div>					
					');
					
				};

			}
			
		?>
        </tbody>
      </table></p></div>
  </li>
  <li>
    <div class="collapsible-header">
      Wtorek
      <span class="badge">4</span></div>
    <div class="collapsible-body"><p>     	
	<table class="highlight">	
	 <thead>
          <tr>
              <th>Tytuł filmu</th>
              <th>Godziny seansu</th>
              <th> </th>
			  <th> </th>
          </tr>
        </thead>
		 <tbody>
			<?php
		$polacz=mysql_connect('localhost','root','') or die ( "Nie połaczono z serwerem" );
		$polacz2=mysql_select_db('kino1',$polacz)  or die ("Nie połaczono z bazą" );
		mysql_query("SET NAMES 'utf8'");		
		$result=mysql_query("SELECT  `Tytul`, GROUP_CONCAT(Distinct godzina Separator ',') as Godzina,  GROUP_CONCAT(Distinct repertuar.modal Separator ',') as modal, 
		GROUP_CONCAT(Distinct repertuar.ID_repertuaru Separator ',') as rep
		FROM `repertuar`inner join film on repertuar.ID_filmu=film.ID_filmu where Dzien like 'Wtore%'group by tytul");

			while($row = mysql_fetch_row($result))
			{
			$godzina = explode(",", $row[1]);
			$modal = explode(",", $row[2]);
			$repertuar = explode(",", $row[3]);
			echo(' <tr><td>'.$row[0].'</td> <td>');	
			for($c = 0; $c < sizeof($modal);$c++)
					{
					echo ('	
					<a class="waves-effect waves-light btn" href="#'.$modal[$c].'">'.$godzina[$c].' </a>
					');
					
					if(sizeof($modal)!=1)
						echo('<br><br>');
					
					}
					echo('</td></tr>');
			

			
			for($i = 0; $i < sizeof($modal);$i++)
				{		
					$liczba = substr($modal[$i], 5);
					echo('		
							
							<div id="'.$modal[$i].'" class="modal">
							<div class="modal-content">
							<h4>'.$row[0].' </h4>
							<h5>Godzina: '.$godzina[$i].' + '.$modal[$i].' + '.$liczba.' </h5>
								<p>
								<form class="col s12" action="bilety.php" method="post" name="'.$modal[$i].'">
								<div class="row">
								<div class="row">
								<div class="input-field col s12">
								<center> <h5>Widok sali</h5> </center>
								<center>
								<img src="img/sala/wolne.jpg"> Wolne miejsca
								<img src="img/sala/zarezerwowane.jpg"> Zarezerwowane miejsca
								<img src="img/sala/sesja.jpg"> Miejsca z Twojego koszyka
								<br>
								<img src="img/sala/screen.png"></div> 
								<center>
								
								');
									
								

									for($z=1;$z<=4;$z++)
										{
										echo('<h6>  </h6>');
											for($j=1;$j<=10;$j++)
											{
												$result2=mysql_query('select sale.Rzad, sale.miejsce from rezerwacja
													inner join rezerwacja_miejsca on rezerwacja.ID_rezerwacji=rezerwacja_miejsca.ID_rezerwacji
													right join sale on rezerwacja_miejsca.ID_siedzenia=sale.Siedzenie
													where rezerwacja.ID_repertuar='.$repertuar[$i].'');
													
												$flag=0;
												while($row3 = mysql_fetch_row($result2))
												{
					
													if(($row3[0]==$z) && ($row3[1]==$j))
													{
														echo
														(
															'<a class="btn disabled">'.$j.'</a>'
														);
													$flag=1;
													break;
													}
								
												}
												
												$tmp=0;
												while( $tmp < ($_SESSION['koszyk']['index']))
												{
													
													if((($_SESSION['koszyk']['rzad'][$tmp])==$z) && (($_SESSION['koszyk']['miejsce'][$tmp])==$j) && ($_SESSION['koszyk']['ID_repertuar'][$tmp]== $liczba))
													{
														echo
														(
															'<a class="waves-effect waves-light btn" style="color:white ; background-color:#4b666e;"> '.$j.' </a>'
														);
													$flag=1;
													break;
													}
													$tmp++;
												}
												
												if($flag==0)
												{
													if(($j%10)==0)
													{
														echo('<a class="waves-effect waves-light btn"> '.$j.' </a>');
														echo('<br>');
													}
													else
														echo('<a class="waves-effect waves-light btn"> '.$j.' </a>');
											}
											}
										};
					
					echo('
					</center>			
					</div>
					<div class="row">
					<div class="input-field col s3">
					<input id="ilosc'.$liczba.'" name="ilosc'.$liczba.'" type="text" class="validate">
					<label for="ilosc'.$liczba.'">Ilość miejsc:</label>
					</div>
					<div class="input-field col s3">
					<input id="rzad'.$liczba.'" name="rzad'.$liczba.'" type="text" class="validate">
					<label for="rzad'.$liczba.'">Rząd</label>
					</div>
					<div class="input-field col s3">
					<input id="miejsce'.$liczba.'" name="miejsce'.$liczba.'" type="text" class="validate">
					<label for="miejsce'.$liczba.'">Miejsce</label>
					</div>
					</div>
					<div class="row">
					<div class="input-field col s6">
					<i class="material-icons prefix">account_circle</i>
					<input id="imie'.$liczba.'" name="imie'.$liczba.'" type="text" class="validate">
					<label for="imie'.$liczba.'">Imię</label>
					</div>
					<div class="input-field col s6">
					<input id="nazwisko'.$liczba.'" name="nazwisko'.$liczba.'" type="text" class="validate">
					<label for="nazwisko'.$liczba.'">Nazwisko</label>
					</div>
					</div>

					<div class="input-field col s6">
					<i class="material-icons prefix">phone</i>
					<input id="telefon'.$liczba.'" name="telefon'.$liczba.'" type="tel" class="validate">
					<label for="telefon'.$liczba.'">Telefon</label>
					</div>
					<div class="input-field col s6">
					<input id="email'.$liczba.'" name="email'.$liczba.'" type="email" class="validate">
					<label for="email'.$liczba.'">Email</label>
					<span class="helper-text" data-error="Wprowadzony tekt nie jest adresem email!" data-success="OK"></span>
					</div>
					</p>
					<div class="modal-footer">

					  <button class="btn waves-effect waves-light" value="'.$repertuar[$i].','.$liczba.'" type="submit" name="bilety" ">Rezerwuj
					   <i class="material-icons right">send</i>
						</button>
					<a href="#!" class="modal-close waves-effect waves-green btn-flat">Anuluj</a>
					</div>
					</form>
					</div>	
					</div>
					</div>					
					');
					
				};

			}
			
		?>
        </tbody>
      </table></p></div>
  </li>
    <li>
    <div class="collapsible-header">
      Środa
      <span class="badge">3</span></div>
    <div class="collapsible-body"><p>
		<table class="highlight">
	     <thead>
          <tr>
              <th>Tytuł filmu</th>
              <th>Godziny seansu</th>
              <th> </th>
			  <th> </th>
          </tr>
        </thead>

        <tbody>
         			<?php
		$polacz=mysql_connect('localhost','root','') or die ( "Nie połaczono z serwerem" );
		$polacz2=mysql_select_db('kino1',$polacz)  or die ("Nie połaczono z bazą" );
		mysql_query("SET NAMES 'utf8'");		
		$result=mysql_query("SELECT  `Tytul`, GROUP_CONCAT(Distinct godzina Separator ',') as Godzina,  GROUP_CONCAT(Distinct repertuar.modal Separator ',') as modal, 
		GROUP_CONCAT(Distinct repertuar.ID_repertuaru Separator ',') as rep
		FROM `repertuar`inner join film on repertuar.ID_filmu=film.ID_filmu where Dzien like '%roda' group by tytul");

			while($row = mysql_fetch_row($result))
			{
			$godzina = explode(",", $row[1]);
			$modal = explode(",", $row[2]);
			$repertuar = explode(",", $row[3]);
			echo(' <tr><td>'.$row[0].'</td> <td>');	
			for($c = 0; $c < sizeof($modal);$c++)
					{
					echo ('	
					<a class="waves-effect waves-light btn" href="#'.$modal[$c].'">'.$godzina[$c].' </a>
					');
					
					if(sizeof($modal)!=1)
						echo('<br><br>');
					
					}
					echo('</td></tr>');
			

			
			for($i = 0; $i < sizeof($modal);$i++)
				{		
					$liczba = substr($modal[$i], 5);
					echo('		
							
							<div id="'.$modal[$i].'" class="modal">
							<div class="modal-content">
							<h4>'.$row[0].' </h4>
							<h5>Godzina: '.$godzina[$i].' + '.$modal[$i].' + '.$liczba.' </h5>
								<p>
								<form class="col s12" action="bilety.php" method="post" name="'.$modal[$i].'">
								<div class="row">
								<div class="row">
								<div class="input-field col s12">
								<center> <h5>Widok sali</h5> </center>
								<center>
								<img src="img/sala/wolne.jpg"> Wolne miejsca
								<img src="img/sala/zarezerwowane.jpg"> Zarezerwowane miejsca
								<img src="img/sala/sesja.jpg"> Miejsca z Twojego koszyka
								<br>
								<img src="img/sala/screen.png"></div> 
								<center>
								
								');
									
								

									for($z=1;$z<=4;$z++)
										{
										echo('<h6>  </h6>');
											for($j=1;$j<=10;$j++)
											{
												$result2=mysql_query('select sale.Rzad, sale.miejsce from rezerwacja
													inner join rezerwacja_miejsca on rezerwacja.ID_rezerwacji=rezerwacja_miejsca.ID_rezerwacji
													right join sale on rezerwacja_miejsca.ID_siedzenia=sale.Siedzenie
													where rezerwacja.ID_repertuar='.$repertuar[$i].'');
													
												$flag=0;
												while($row3 = mysql_fetch_row($result2))
												{
					
													if(($row3[0]==$z) && ($row3[1]==$j))
													{
														echo
														(
															'<a class="btn disabled">'.$j.'</a>'
														);
													$flag=1;
													break;
													}
								
												}
												
												$tmp=0;
												while( $tmp < ($_SESSION['koszyk']['index']))
												{
													
													if((($_SESSION['koszyk']['rzad'][$tmp])==$z) && (($_SESSION['koszyk']['miejsce'][$tmp])==$j) && ($_SESSION['koszyk']['ID_repertuar'][$tmp]== $liczba))
													{
														echo
														(
															'<a class="waves-effect waves-light btn" style="color:white ; background-color:#4b666e;"> '.$j.' </a>'
														);
													$flag=1;
													break;
													}
													$tmp++;
												}
												
												if($flag==0)
												{
													if(($j%10)==0)
													{
														echo('<a class="waves-effect waves-light btn"> '.$j.' </a>');
														echo('<br>');
													}
													else
														echo('<a class="waves-effect waves-light btn"> '.$j.' </a>');
											}
											}
										};
					
					echo('
					</center>			
					</div>
					<div class="row">
					<div class="input-field col s3">
					<input id="ilosc'.$liczba.'" name="ilosc'.$liczba.'" type="text" class="validate">
					<label for="ilosc'.$liczba.'">Ilość miejsc:</label>
					</div>
					<div class="input-field col s3">
					<input id="rzad'.$liczba.'" name="rzad'.$liczba.'" type="text" class="validate">
					<label for="rzad'.$liczba.'">Rząd</label>
					</div>
					<div class="input-field col s3">
					<input id="miejsce'.$liczba.'" name="miejsce'.$liczba.'" type="text" class="validate">
					<label for="miejsce'.$liczba.'">Miejsce</label>
					</div>
					</div>
					<div class="row">
					<div class="input-field col s6">
					<i class="material-icons prefix">account_circle</i>
					<input id="imie'.$liczba.'" name="imie'.$liczba.'" type="text" class="validate">
					<label for="imie'.$liczba.'">Imię</label>
					</div>
					<div class="input-field col s6">
					<input id="nazwisko'.$liczba.'" name="nazwisko'.$liczba.'" type="text" class="validate">
					<label for="nazwisko'.$liczba.'">Nazwisko</label>
					</div>
					</div>

					<div class="input-field col s6">
					<i class="material-icons prefix">phone</i>
					<input id="telefon'.$liczba.'" name="telefon'.$liczba.'" type="tel" class="validate">
					<label for="telefon'.$liczba.'">Telefon</label>
					</div>
					<div class="input-field col s6">
					<input id="email'.$liczba.'" name="email'.$liczba.'" type="email" class="validate">
					<label for="email'.$liczba.'">Email</label>
					<span class="helper-text" data-error="Wprowadzony tekt nie jest adresem email!" data-success="OK"></span>
					</div>
					</p>
					<div class="modal-footer">

					  <button class="btn waves-effect waves-light" value="'.$repertuar[$i].','.$liczba.'" type="submit" name="bilety" >Rezerwuj
					   <i class="material-icons right">send</i>
						</button>
					<a href="#!" class="modal-close waves-effect waves-green btn-flat">Anuluj</a>
					</div>
					</form>
					</div>	
					</div>
					</div>					
					');
					
				};

			}
			
		?>
     </tbody> </table></p></div>
  </li>
    <li>

    <div class="collapsible-header">
      Czwartek
      <span class="badge">4</span></div>
    <div class="collapsible-body"><p>
		<table class="highlight">
	     <thead>
          <tr>
              <th>Tytuł filmu</th>
              <th>Godziny seansu</th>
              <th> </th>
			  <th> </th>
          </tr>
        </thead>

        <tbody>
         			<?php
		$polacz=mysql_connect('localhost','root','') or die ( "Nie połaczono z serwerem" );
		$polacz2=mysql_select_db('kino1',$polacz)  or die ("Nie połaczono z bazą" );
		mysql_query("SET NAMES 'utf8'");		
		$result=mysql_query("SELECT  `Tytul`, GROUP_CONCAT(Distinct godzina Separator ',') as Godzina,  GROUP_CONCAT(Distinct repertuar.modal Separator ',') as modal, 
		GROUP_CONCAT(Distinct repertuar.ID_repertuaru Separator ',') as rep
		FROM `repertuar`inner join film on repertuar.ID_filmu=film.ID_filmu where Dzien like 'Czwart%' group by tytul");

			while($row = mysql_fetch_row($result))
			{
			$godzina = explode(",", $row[1]);
			$modal = explode(",", $row[2]);
			$repertuar = explode(",", $row[3]);
			echo(' <tr><td>'.$row[0].'</td> <td>');	
			for($c = 0; $c < sizeof($modal);$c++)
					{
					echo ('	
					<a class="waves-effect waves-light btn" href="#'.$modal[$c].'">'.$godzina[$c].' </a>
					');
					
					if(sizeof($modal)!=1)
						echo('<br><br>');
					
					}
					echo('</td></tr>');
			

			
			for($i = 0; $i < sizeof($modal);$i++)
				{		
					$liczba = substr($modal[$i], 5);
					echo('		
							
							<div id="'.$modal[$i].'" class="modal">
							<div class="modal-content">
							<h4>'.$row[0].' </h4>
							<h5>Godzina: '.$godzina[$i].' + '.$modal[$i].' + '.$liczba.' </h5>
								<p>
								<form class="col s12" action="bilety.php" method="post" name="'.$modal[$i].'">
								<div class="row">
								<div class="row">
								<div class="input-field col s12">
								<center> <h5>Widok sali</h5> </center>
								<center>
								<img src="img/sala/wolne.jpg"> Wolne miejsca
								<img src="img/sala/zarezerwowane.jpg"> Zarezerwowane miejsca
								<img src="img/sala/sesja.jpg"> Miejsca z Twojego koszyka
								<br>
								<img src="img/sala/screen.png"></div> 
								<center>
								
								');
									
								

									for($z=1;$z<=4;$z++)
										{
										echo('<h6>  </h6>');
											for($j=1;$j<=10;$j++)
											{
												$result2=mysql_query('select sale.Rzad, sale.miejsce from rezerwacja
													inner join rezerwacja_miejsca on rezerwacja.ID_rezerwacji=rezerwacja_miejsca.ID_rezerwacji
													right join sale on rezerwacja_miejsca.ID_siedzenia=sale.Siedzenie
													where rezerwacja.ID_repertuar='.$repertuar[$i].'');
													
												$flag=0;
												while($row3 = mysql_fetch_row($result2))
												{
					
													if(($row3[0]==$z) && ($row3[1]==$j))
													{
														echo
														(
															'<a class="btn disabled">'.$j.'</a>'
														);
													$flag=1;
													break;
													}
								
												}
												
												$tmp=0;
												while( $tmp < ($_SESSION['koszyk']['index']))
												{
													
													if((($_SESSION['koszyk']['rzad'][$tmp])==$z) && (($_SESSION['koszyk']['miejsce'][$tmp])==$j) && ($_SESSION['koszyk']['ID_repertuar'][$tmp]== $liczba))
													{
														echo
														(
															'<a class="waves-effect waves-light btn" style="color:white ; background-color:#4b666e;"> '.$j.' </a>'
														);
													$flag=1;
													break;
													}
													$tmp++;
												}
												
												if($flag==0)
												{
													if(($j%10)==0)
													{
														echo('<a class="waves-effect waves-light btn"> '.$j.' </a>');
														echo('<br>');
													}
													else
														echo('<a class="waves-effect waves-light btn"> '.$j.' </a>');
											}
											}
										};
					
					echo('
					</center>			
					</div>
					<div class="row">
					<div class="input-field col s3">
					<input id="ilosc'.$liczba.'" name="ilosc'.$liczba.'" type="text" class="validate">
					<label for="ilosc'.$liczba.'">Ilość miejsc:</label>
					</div>
					<div class="input-field col s3">
					<input id="rzad'.$liczba.'" name="rzad'.$liczba.'" type="text" class="validate">
					<label for="rzad'.$liczba.'">Rząd</label>
					</div>
					<div class="input-field col s3">
					<input id="miejsce'.$liczba.'" name="miejsce'.$liczba.'" type="text" class="validate">
					<label for="miejsce'.$liczba.'">Miejsce</label>
					</div>
					</div>
					<div class="row">
					<div class="input-field col s6">
					<i class="material-icons prefix">account_circle</i>
					<input id="imie'.$liczba.'" name="imie'.$liczba.'" type="text" class="validate">
					<label for="imie'.$liczba.'">Imię</label>
					</div>
					<div class="input-field col s6">
					<input id="nazwisko'.$liczba.'" name="nazwisko'.$liczba.'" type="text" class="validate">
					<label for="nazwisko'.$liczba.'">Nazwisko</label>
					</div>
					</div>

					<div class="input-field col s6">
					<i class="material-icons prefix">phone</i>
					<input id="telefon'.$liczba.'" name="telefon'.$liczba.'" type="tel" class="validate">
					<label for="telefon'.$liczba.'">Telefon</label>
					</div>
					<div class="input-field col s6">
					<input id="email'.$liczba.'" name="email'.$liczba.'" type="email" class="validate">
					<label for="email'.$liczba.'">Email</label>
					<span class="helper-text" data-error="Wprowadzony tekt nie jest adresem email!" data-success="OK"></span>
					</div>
					</p>
					<div class="modal-footer">

					  <button class="btn waves-effect waves-light" value="'.$repertuar[$i].','.$liczba.'" type="submit" name="bilety" >Rezerwuj
					   <i class="material-icons right">send</i>
						</button>
					<a href="#!" class="modal-close waves-effect waves-green btn-flat">Anuluj</a>
					</div>
					</form>
					</div>	
					</div>
					</div>					
					');
					
				};

			}
			
		?>
        </tbody>
      </table>
	</p></div>
  </li>
      <li>
    <div class="collapsible-header">
      Piątek
      <span class="badge">2</span></div>
    <div class="collapsible-body"><p>
		<table class="highlight">
	     <thead>
          <tr>
              <th>Tytuł filmu</th>
              <th>Godziny seansu</th>
              <th> </th>
			  <th> </th>
          </tr>
        </thead>

        <tbody>
         			<?php
		$polacz=mysql_connect('localhost','root','') or die ( "Nie połaczono z serwerem" );
		$polacz2=mysql_select_db('kino1',$polacz)  or die ("Nie połaczono z bazą" );
		mysql_query("SET NAMES 'utf8'");		
		$result=mysql_query("SELECT  `Tytul`, GROUP_CONCAT(Distinct godzina Separator ',') as Godzina,  GROUP_CONCAT(Distinct repertuar.modal Separator ',') as modal, 
		GROUP_CONCAT(Distinct repertuar.ID_repertuaru Separator ',') as rep
		FROM `repertuar`inner join film on repertuar.ID_filmu=film.ID_filmu where Dzien like 'Pi%'group by tytul");

			while($row = mysql_fetch_row($result))
			{
			$godzina = explode(",", $row[1]);
			$modal = explode(",", $row[2]);
			$repertuar = explode(",", $row[3]);
			echo(' <tr><td>'.$row[0].'</td> <td>');	
			for($c = 0; $c < sizeof($modal);$c++)
					{
					echo ('	
					<a class="waves-effect waves-light btn" href="#'.$modal[$c].'">'.$godzina[$c].' </a>
					');
					
					if(sizeof($modal)!=1)
						echo('<br><br>');
					
					}
					echo('</td></tr>');
			

			
			for($i = 0; $i < sizeof($modal);$i++)
				{		
					$liczba = substr($modal[$i], 5);
					echo('		
							
							<div id="'.$modal[$i].'" class="modal">
							<div class="modal-content">
							<h4>'.$row[0].' </h4>
							<h5>Godzina: '.$godzina[$i].' + '.$modal[$i].' + '.$liczba.' </h5>
								<p>
								<form class="col s12" action="bilety.php" method="post" name="'.$modal[$i].'">
								<div class="row">
								<div class="row">
								<div class="input-field col s12">
								<center> <h5>Widok sali</h5> </center>
								<center>
								<img src="img/sala/wolne.jpg"> Wolne miejsca
								<img src="img/sala/zarezerwowane.jpg"> Zarezerwowane miejsca
								<img src="img/sala/sesja.jpg"> Miejsca z Twojego koszyka
								<br>
								<img src="img/sala/screen.png"></div> 
								<center>
								
								');
									
								

									for($z=1;$z<=4;$z++)
										{
										echo('<h6>  </h6>');
											for($j=1;$j<=10;$j++)
											{
												$result2=mysql_query('select sale.Rzad, sale.miejsce from rezerwacja
													inner join rezerwacja_miejsca on rezerwacja.ID_rezerwacji=rezerwacja_miejsca.ID_rezerwacji
													right join sale on rezerwacja_miejsca.ID_siedzenia=sale.Siedzenie
													where rezerwacja.ID_repertuar='.$repertuar[$i].'');
													
												$flag=0;
												while($row3 = mysql_fetch_row($result2))
												{
					
													if(($row3[0]==$z) && ($row3[1]==$j))
													{
														echo
														(
															'<a class="btn disabled">'.$j.'</a>'
														);
													$flag=1;
													break;
													}
								
												}
												
												$tmp=0;
												while( $tmp < ($_SESSION['koszyk']['index']))
												{
													
													if((($_SESSION['koszyk']['rzad'][$tmp])==$z) && (($_SESSION['koszyk']['miejsce'][$tmp])==$j) && ($_SESSION['koszyk']['ID_repertuar'][$tmp]== $liczba))
													{
														echo
														(
															'<a class="waves-effect waves-light btn" style="color:white ; background-color:#4b666e;"> '.$j.' </a>'
														);
													$flag=1;
													break;
													}
													$tmp++;
												}
												
												if($flag==0)
												{
													if(($j%10)==0)
													{
														echo('<a class="waves-effect waves-light btn"> '.$j.' </a>');
														echo('<br>');
													}
													else
														echo('<a class="waves-effect waves-light btn"> '.$j.' </a>');
											}
											}
										};
					
					echo('
					</center>			
					</div>
					<div class="row">
					<div class="input-field col s3">
					<input id="ilosc'.$liczba.'" name="ilosc'.$liczba.'" type="text" class="validate">
					<label for="ilosc'.$liczba.'">Ilość miejsc:</label>
					</div>
					<div class="input-field col s3">
					<input id="rzad'.$liczba.'" name="rzad'.$liczba.'" type="text" class="validate">
					<label for="rzad'.$liczba.'">Rząd</label>
					</div>
					<div class="input-field col s3">
					<input id="miejsce'.$liczba.'" name="miejsce'.$liczba.'" type="text" class="validate">
					<label for="miejsce'.$liczba.'">Miejsce</label>
					</div>
					</div>
					<div class="row">
					<div class="input-field col s6">
					<i class="material-icons prefix">account_circle</i>
					<input id="imie'.$liczba.'" name="imie'.$liczba.'" type="text" class="validate">
					<label for="imie'.$liczba.'">Imię</label>
					</div>
					<div class="input-field col s6">
					<input id="nazwisko'.$liczba.'" name="nazwisko'.$liczba.'" type="text" class="validate">
					<label for="nazwisko'.$liczba.'">Nazwisko</label>
					</div>
					</div>

					<div class="input-field col s6">
					<i class="material-icons prefix">phone</i>
					<input id="telefon'.$liczba.'" name="telefon'.$liczba.'" type="tel" class="validate">
					<label for="telefon'.$liczba.'">Telefon</label>
					</div>
					<div class="input-field col s6">
					<input id="email'.$liczba.'" name="email'.$liczba.'" type="email" class="validate">
					<label for="email'.$liczba.'">Email</label>
					<span class="helper-text" data-error="Wprowadzony tekt nie jest adresem email!" data-success="OK"></span>
					</div>
					</p>
					<div class="modal-footer">

					  <button class="btn waves-effect waves-light" value="'.$repertuar[$i].','.$liczba.'" type="submit" name="bilety" >Rezerwuj
					   <i class="material-icons right">send</i>
						</button>
					<a href="#!" class="modal-close waves-effect waves-green btn-flat">Anuluj</a>
					</div>
					</form>
					</div>	
					</div>
					</div>					
					');
					
				};

			}
			
		?>
        </tbody>
      </table>
	</p></div>
  </li>
      <li>
    <div class="collapsible-header">
      Sobota
      <span class="badge">7</span></div>
    <div class="collapsible-body"><p>
		<table class="highlight">
	 <thead>
	 <tr>
            <th>Tytuł filmu</th>
              <th>Godziny seansu</th>
              <th> </th>
			  <th> </th>
          </tr>
        </thead>

        <tbody>
         			<?php
		$polacz=mysql_connect('localhost','root','') or die ( "Nie połaczono z serwerem" );
		$polacz2=mysql_select_db('kino1',$polacz)  or die ("Nie połaczono z bazą" );
		mysql_query("SET NAMES 'utf8'");		
		$result=mysql_query("SELECT  `Tytul`, GROUP_CONCAT(Distinct godzina Separator ',') as Godzina,  GROUP_CONCAT(Distinct repertuar.modal Separator ',') as modal, 
		GROUP_CONCAT(Distinct repertuar.ID_repertuaru Separator ',') as rep
		FROM `repertuar`inner join film on repertuar.ID_filmu=film.ID_filmu where Dzien like 'Sobota%'group by tytul");

			while($row = mysql_fetch_row($result))
			{
			$godzina = explode(",", $row[1]);
			$modal = explode(",", $row[2]);
			$repertuar = explode(",", $row[3]);
			echo(' <tr><td>'.$row[0].'</td> <td>');	
			for($c = 0; $c < sizeof($modal);$c++)
					{
					echo ('	
					<a class="waves-effect waves-light btn" href="#'.$modal[$c].'">'.$godzina[$c].' </a>
					');
					
					if(sizeof($modal)!=1)
						echo('<br><br>');
					
					}
					echo('</td></tr>');
			

			
			for($i = 0; $i < sizeof($modal);$i++)
				{		
					$liczba = substr($modal[$i], 5);
					echo('		
							
							<div id="'.$modal[$i].'" class="modal">
							<div class="modal-content">
							<h4>'.$row[0].' </h4>
							<h5>Godzina: '.$godzina[$i].' + '.$modal[$i].' + '.$liczba.' </h5>
								<p>
								<form class="col s12" action="bilety.php" method="post" name="'.$modal[$i].'">
								<div class="row">
								<div class="row">
								<div class="input-field col s12">
								<center> <h5>Widok sali</h5> </center>
								<center>
								<img src="img/sala/wolne.jpg"> Wolne miejsca
								<img src="img/sala/zarezerwowane.jpg"> Zarezerwowane miejsca
								<img src="img/sala/sesja.jpg"> Miejsca z Twojego koszyka
								<br>
								<img src="img/sala/screen.png"></div> 
								<center>
								
								');
									
								

									for($z=1;$z<=4;$z++)
										{
										echo('<h6>  </h6>');
											for($j=1;$j<=10;$j++)
											{
												$result2=mysql_query('select sale.Rzad, sale.miejsce from rezerwacja
													inner join rezerwacja_miejsca on rezerwacja.ID_rezerwacji=rezerwacja_miejsca.ID_rezerwacji
													right join sale on rezerwacja_miejsca.ID_siedzenia=sale.Siedzenie
													where rezerwacja.ID_repertuar='.$repertuar[$i].'');
													
												$flag=0;
												while($row3 = mysql_fetch_row($result2))
												{
					
													if(($row3[0]==$z) && ($row3[1]==$j))
													{
														echo
														(
															'<a class="btn disabled">'.$j.'</a>'
														);
													$flag=1;
													break;
													}
								
												}
												
												$tmp=0;
												while( $tmp < ($_SESSION['koszyk']['index']))
												{
													
													if((($_SESSION['koszyk']['rzad'][$tmp])==$z) && (($_SESSION['koszyk']['miejsce'][$tmp])==$j) && ($_SESSION['koszyk']['ID_repertuar'][$tmp]== $liczba))
													{
														echo
														(
															'<a class="waves-effect waves-light btn" style="color:white ; background-color:#4b666e;"> '.$j.' </a>'
														);
													$flag=1;
													break;
													}
													$tmp++;
												}
												
												if($flag==0)
												{
													if(($j%10)==0)
													{
														echo('<a class="waves-effect waves-light btn"> '.$j.' </a>');
														echo('<br>');
													}
													else
														echo('<a class="waves-effect waves-light btn"> '.$j.' </a>');
											}
											}
										};
					
					echo('
					</center>			
					</div>
					<div class="row">
					<div class="input-field col s3">
					<input id="ilosc'.$liczba.'" name="ilosc'.$liczba.'" type="text" class="validate">
					<label for="ilosc'.$liczba.'">Ilość miejsc:</label>
					</div>
					<div class="input-field col s3">
					<input id="rzad'.$liczba.'" name="rzad'.$liczba.'" type="text" class="validate">
					<label for="rzad'.$liczba.'">Rząd</label>
					</div>
					<div class="input-field col s3">
					<input id="miejsce'.$liczba.'" name="miejsce'.$liczba.'" type="text" class="validate">
					<label for="miejsce'.$liczba.'">Miejsce</label>
					</div>
					</div>
					<div class="row">
					<div class="input-field col s6">
					<i class="material-icons prefix">account_circle</i>
					<input id="imie'.$liczba.'" name="imie'.$liczba.'" type="text" class="validate">
					<label for="imie'.$liczba.'">Imię</label>
					</div>
					<div class="input-field col s6">
					<input id="nazwisko'.$liczba.'" name="nazwisko'.$liczba.'" type="text" class="validate">
					<label for="nazwisko'.$liczba.'">Nazwisko</label>
					</div>
					</div>

					<div class="input-field col s6">
					<i class="material-icons prefix">phone</i>
					<input id="telefon'.$liczba.'" name="telefon'.$liczba.'" type="tel" class="validate">
					<label for="telefon'.$liczba.'">Telefon</label>
					</div>
					<div class="input-field col s6">
					<input id="email'.$liczba.'" name="email'.$liczba.'" type="email" class="validate">
					<label for="email'.$liczba.'">Email</label>
					<span class="helper-text" data-error="Wprowadzony tekt nie jest adresem email!" data-success="OK"></span>
					</div>
					</p>
					<div class="modal-footer">

					  <button class="btn waves-effect waves-light" value="'.$repertuar[$i].','.$liczba.'" type="submit" name="bilety" >Rezerwuj
					   <i class="material-icons right">send</i>
						</button>
					<a href="#!" class="modal-close waves-effect waves-green btn-flat">Anuluj</a>
					</div>
					</form>
					</div>	
					</div>
					</div>					
					');
					
				};

			}
			
		?>
        </tbody>
      </table>
	</p></div>
  </li>
      <li>
    <div class="collapsible-header">
      Niedziela
      <span class="badge">8</span></div>
    <div class="collapsible-body"><p>
		<table class="highlight">
       <thead>
          <tr>
                            <th>Tytuł filmu</th>
              <th>Godziny seansu</th>
              <th> </th>
			  <th> </th>
          </tr>
        </thead>

        <tbody>
         			<?php
		$polacz=mysql_connect('localhost','root','') or die ( "Nie połaczono z serwerem" );
		$polacz2=mysql_select_db('kino1',$polacz)  or die ("Nie połaczono z bazą" );
		mysql_query("SET NAMES 'utf8'");		
		$result=mysql_query("SELECT  `Tytul`, GROUP_CONCAT(Distinct godzina Separator ',') as Godzina,  GROUP_CONCAT(Distinct repertuar.modal Separator ',') as modal, 
		GROUP_CONCAT(Distinct repertuar.ID_repertuaru Separator ',') as rep
		FROM `repertuar`inner join film on repertuar.ID_filmu=film.ID_filmu where Dzien like 'Niedzi%'group by tytul");

			while($row = mysql_fetch_row($result))
			{
			$godzina = explode(",", $row[1]);
			$modal = explode(",", $row[2]);
			$repertuar = explode(",", $row[3]);
			echo(' <tr><td>'.$row[0].'</td> <td>');	
			for($c = 0; $c < sizeof($modal);$c++)
					{
					echo ('	
					<a class="waves-effect waves-light btn" href="#'.$modal[$c].'">'.$godzina[$c].' </a>
					');
					
					if(sizeof($modal)!=1)
						echo('<br><br>');
					
					}
					echo('</td></tr>');
			

			
			for($i = 0; $i < sizeof($modal);$i++)
				{		
					$liczba = substr($modal[$i], 5);
					echo('		
							
							<div id="'.$modal[$i].'" class="modal">
							<div class="modal-content">
							<h4>'.$row[0].' </h4>
							<h5>Godzina: '.$godzina[$i].' + '.$modal[$i].' + '.$liczba.' </h5>
								<p>
								<form class="col s12" action="bilety.php" method="post" name="'.$modal[$i].'">
								<div class="row">
								<div class="row">
								<div class="input-field col s12">
								<center> <h5>Widok sali</h5> </center>
								<center>
								<img src="img/sala/wolne.jpg"> Wolne miejsca
								<img src="img/sala/zarezerwowane.jpg"> Zarezerwowane miejsca
								<img src="img/sala/sesja.jpg"> Miejsca z Twojego koszyka
								<br>
								<img src="img/sala/screen.png"></div> 
								<center>
								
								');
									
								

									for($z=1;$z<=4;$z++)
										{
										echo('<h6>  </h6>');
											for($j=1;$j<=10;$j++)
											{
												$result2=mysql_query('select sale.Rzad, sale.miejsce from rezerwacja
													inner join rezerwacja_miejsca on rezerwacja.ID_rezerwacji=rezerwacja_miejsca.ID_rezerwacji
													right join sale on rezerwacja_miejsca.ID_siedzenia=sale.Siedzenie
													where rezerwacja.ID_repertuar='.$repertuar[$i].'');
													
												$flag=0;
												while($row3 = mysql_fetch_row($result2))
												{
					
													if(($row3[0]==$z) && ($row3[1]==$j))
													{
														echo
														(
															'<a class="btn disabled">'.$j.'</a>'
														);
													$flag=1;
													break;
													}
								
												}
												
												$tmp=0;
												while( $tmp < ($_SESSION['koszyk']['index']))
												{
													
													if((($_SESSION['koszyk']['rzad'][$tmp])==$z) && (($_SESSION['koszyk']['miejsce'][$tmp])==$j) && ($_SESSION['koszyk']['ID_repertuar'][$tmp]== $liczba))
													{
														echo
														(
															'<a class="waves-effect waves-light btn" style="color:white ; background-color:#4b666e;"> '.$j.' </a>'
														);
													$flag=1;
													break;
													}
													$tmp++;
												}
												
												if($flag==0)
												{
													if(($j%10)==0)
													{
														echo('<a class="waves-effect waves-light btn"> '.$j.' </a>');
														echo('<br>');
													}
													else
														echo('<a class="waves-effect waves-light btn"> '.$j.' </a>');
											}
											}
										};
					
					echo('
					</center>			
					</div>
					<div class="row">
					<div class="input-field col s3">
					<input id="ilosc'.$liczba.'" name="ilosc'.$liczba.'" type="text" class="validate">
					<label for="ilosc'.$liczba.'">Ilość miejsc:</label>
					</div>
					<div class="input-field col s3">
					<input id="rzad'.$liczba.'" name="rzad'.$liczba.'" type="text" class="validate">
					<label for="rzad'.$liczba.'">Rząd</label>
					</div>
					<div class="input-field col s3">
					<input id="miejsce'.$liczba.'" name="miejsce'.$liczba.'" type="text" class="validate">
					<label for="miejsce'.$liczba.'">Miejsce</label>
					</div>
					</div>
					<div class="row">
					<div class="input-field col s6">
					<i class="material-icons prefix">account_circle</i>
					<input id="imie'.$liczba.'" name="imie'.$liczba.'" type="text" class="validate">
					<label for="imie'.$liczba.'">Imię</label>
					</div>
					<div class="input-field col s6">
					<input id="nazwisko'.$liczba.'" name="nazwisko'.$liczba.'" type="text" class="validate">
					<label for="nazwisko'.$liczba.'">Nazwisko</label>
					</div>
					</div>

					<div class="input-field col s6">
					<i class="material-icons prefix">phone</i>
					<input id="telefon'.$liczba.'" name="telefon'.$liczba.'" type="tel" class="validate">
					<label for="telefon'.$liczba.'">Telefon</label>
					</div>
					<div class="input-field col s6">
					<input id="email'.$liczba.'" name="email'.$liczba.'" type="email" class="validate">
					<label for="email'.$liczba.'">Email</label>
					<span class="helper-text" data-error="Wprowadzony tekt nie jest adresem email!" data-success="OK"></span>
					</div>
					</p>
					<div class="modal-footer">

					  <button class="btn waves-effect waves-light" value="'.$repertuar[$i].','.$liczba.'" type="submit" name="bilety" >Rezerwuj
					   <i class="material-icons right">send</i>
						</button>
					<a href="#!" class="modal-close waves-effect waves-green btn-flat">Anuluj</a>
					</div>
					</form>
					</div>	
					</div>
					</div>					
					');
					
				};

			}
			
		?>
        </tbody>
      </table>
	
	</p></div>
  </li>
</ul>
          
    </div>
	</div>
	</div>
	</div>


		

  <footer class="page-footer orange">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">O stronie</h5>
          <p class="grey-text text-lighten-4">
		   Treści zamieszczone nie są mojego autrostwa oraz nie posiadam 
		   do nich praw autorskich. Nie wykorzystuje zawartych tu treści w celach materialnych. 
		   Strona powstała jedynie w celach naukowych.

        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Linki</h5>
          <ul>
            <li><a class="white-text" href="https://materializecss.com/media.html">Framework</a></li>
            <li><a class="white-text" href="https://getreelcinemas.com/our-theaters/">Logo</a></li>
            <li><a class="white-text" href="https://www.filmweb.pl/">Informacje o filmach</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="orange-text text-lighten-3" href="http://materializecss.com">Materialize</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
