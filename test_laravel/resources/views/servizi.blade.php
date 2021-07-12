<html>
    <head>
        <link rel="stylesheet" href="../resources/css/style.css"/>
		
		<script src="../resources/js/servizi.js" defer="true"></script>
        <title>Progetto</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

        </head>
        <body>
		
		
			<header>
			<h1>Benvenuto!</h1>
				<div id="nomeSito" class="right">
					RADDISON RED
				</div>

				<nav id="navMenu">
                    <div class="divMenu">
						<a class="btn btn-primary" href="home">HOME</a>
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
					 <strong>Scopri i nostri servizi</strong>
				 </h1>
			</header>
            <section id="section">
				<input type="text" id="searchBar1" placeholder="Cerca un servizio"></input>
                <h1>Ecco alcuni dei nostri servizi</h1>

            </section> 

            <footer>
                <p>Antonio Luca Cardaci</p>
                <p>O46002184</p>
            </footer>
            
        </body>
    
</html>