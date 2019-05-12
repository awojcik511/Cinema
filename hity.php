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
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="repertuar.php">Repertuar</a></li>
		  <li><a href="wiecej.html">Oferty</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">

	
	
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
            <h5 class="center">Ranking najlepszych filmów ze świata</h5>
			
            <p class="light">	
			
			<?php
			$polacz=mysql_connect('localhost','root','') or die ( "Nie połaczono z serwerem" );
			$polacz2=mysql_select_db('kino1',$polacz)  or die ("Nie połaczono z bazą" );
			mysql_query("SET NAMES 'utf8'");
			$result=mysql_query('
			Select okladka, tytul, rok, ocena, glosy from film order by ocena DESC
			');
		
			echo (
			'
			 <table class="highlight">
				<thead>
					<tr>
						<th>Oficjalny plakat</th>
						<th>Tytuł</th>
						<th>Rok produkcji</th>
						<th>Ocena</th>
						<th>Liczba głosów</th>
					</tr>
				</thead>
			<tbody>
			'
			);	
		while($row = mysql_fetch_array($result))
			{
			echo 
			('
			   <tr>
              <td><img src="img/plakaty/'.$row['okladka'].'"> </td>
              <td>'.$row['tytul'].'</td>
			  <td>'.$row['rok'].'</td>
			   <td>'.$row['ocena'].'<i class="material-icons">star</i></td>
			   <td>'.$row['glosy'].'</td>
				</tr>	
			');
			}
			echo ('
					</tbody>
					</table>
				');
			
		mysql_close($polacz);
		?>			
			</p>
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
