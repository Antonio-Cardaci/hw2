
<html>
	
    <head>
        <link rel="stylesheet" href="../resources/css/style.css"/>
		
		<script type="text/javascript">

		//riempi l'oggetto con tutti i campi
		const stanze = [
			@foreach ($stanze as $stanza)
				[ "{{ $stanza->id }}" ], 
			@endforeach
			];

			const prenotazioni = [
			@foreach ($prenotazioni as $oggetto)
				[ "{{ $oggetto->id }}" ], 
			@endforeach
			];
		</script>
		<script src="../resources/js/prenotazioni.js" defer="true"></script>
		
        <title>Progetto</title>
		<meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        </head>
		
        <body>
		
		
			<header>
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
					 <strong>Prenota una stanza</strong>
                     <br>
					
				 </h1>
			</header>
			<section id="prenotazioni">
			    <div role="alert" id="alert" class="alert hidden"></div>
				<h1>Prenota la tua stanza</h1>
				<input type="date" id="dataDa" name="dataDa">
				<input type="date" id="dataA" name="dataA">

				<div class="stanze">
				@foreach($stanze as $stanza)
				<div id="div_{{$stanza['id']}}">
					<h1>{{ $stanza['titolo'] }}</h1>
					<img src= {{ $stanza['immagine']}} height="400" width="400"/>
					<a class="btn btn-primary" id="btn_{{$stanza['id']}}">Prenota</a>
				</div>
				@endforeach
				
				</div>
            </section>
			
			<section id="prenotazioniEffettuate">
				<h1>Le tue prenotazioni</h1>

				<div id="div_prenotazioni" class="stanze">
				</div>
				
				
			

            </section>
			
			
			
          

			

            <footer>
                <p>Antonio Luca Cardaci</p>
                <p>O46002184</p>
            </footer>
            
        </body>
    
</html>