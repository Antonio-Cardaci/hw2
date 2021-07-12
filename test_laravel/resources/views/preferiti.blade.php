<html>
    <head>
        <link rel="stylesheet" href="../resources/css/style.css"/>
		
		<script src="../resources/js/preferiti.js" defer="true"></script>
        <title>Progetto</title>
		<meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">

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
					 <strong>PREFERITI</strong>
				 </h1>
			</header>
			
				
				
				
					
					
            <section id="section">
                <h1>La tua sezione dei preferiti</h1>
				<div class="stanze">
				@foreach($preferiti as $oggetto)
				<div>
					<h1>{{ $oggetto['titolo'] }}</h1>
					<img src= {{ $oggetto['immagine']}} height="400" width="400"/>
				</div>
				@endforeach
				
				</div>
            </section> 

            <footer>
                <p>Antonio Luca Cardaci</p>
                <p>O46002184</p>
            </footer>
            
        </body>
    
</html>