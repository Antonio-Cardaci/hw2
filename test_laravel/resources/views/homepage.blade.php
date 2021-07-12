
<html>
    <head>
        <link rel="stylesheet" href="../resources/css/style.css"/>
		
		
		<script src="../resources/js/homepage.js" defer="true"></script>
        <title>Progetto</title>
		<meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

        </head>
        <body>
		
		
			<header>
			<h1>Benvenuto {{$username}}!</h1>
				<div id="nomeSito" class="right">
					RADDISON RED
				</div>

				<nav id="navMenu">
                    <div class="divMenu">
						<a class="btn btn-primary" href="home">HOMEPAGE</a>
						<a class="btn btn-primary" href="servizi">SERVIZI</a>
						<a class="btn btn-primary" href="preferiti">PREFERITI</a>
						<a class="btn btn-primary" href="prenotazioni">PRENOTAZIONI</a>
						<a class="btn btn-primary" href='logout.php'>LOGOUT</a>
                       

                    </div>
                    
                <div class="navdiv">
                    <div></div>
                    <div></div>
                    <div></div>

                </div>

				 </nav>

				 <h1>
					 <strong>Visita il nostro Hotel</strong>
                     <br>
					
				 </h1>
			</header>
			<input type="text" id="username" class="hidden" value="<?php echo htmlspecialchars($username); ?>" />
			<input type="text" id="searchBar"  placeholder="Cerca una camera"></input>
			<section id="contenuti">
				<h1>Ricerca</h1>
				
				<h1>Dai un'occhiata alle nostre camere</h1>

				<div role="alert" id="alert" class="alert hidden"></div>
            </section>
			
			
			
            <section id="sectionMeteo">
				<h1>Verifica le condizioni meteo della tua destinazione</h1>
				<div class="flex-center" >
					<input  type="text" id="searchBarMeteo" placeholder="Cerca una localita'" class="inputText"></input>
				</div>
				<button class="btn btn-primary" id="buttonMeteo">Cerca</button>
			</section>
			
			 <section id="sectionCovid">
				<h1>Verifica la situazione COVID-19 della tua destinazione</h1>
				<button class="btn btn-primary" id="buttonCovid">Verifica</button>
			 </section>

			

            <footer>
                <p>Antonio Luca Cardaci</p>
                <p>O46002184</p>
            </footer>
            
        </body>
    
</html>