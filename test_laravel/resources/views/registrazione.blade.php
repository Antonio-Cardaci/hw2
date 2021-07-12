<html>
    <head>
		<link rel="stylesheet" href="../resources/css/style.css"/>
        <script src='../resources/js/registrazione.js' defer></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <main>
        <header>


				 <h1>
					 <strong>Registrati</strong>
                     
				 </h1>
			</header>
            <section id="registerSection">

			
			


					  <div  class="registerBlade" >
						<input type='text' name='username' id="username" placeholder="Username" class="inputText"><span style="color:red;" id="errorUsername"></span>
					  </div>
					   <div  class="registerBlade">
						<input type='password' name='password' id="password" placeholder="Password" class="inputText"><span style="color:red;" id="errorPassword"></span>
					   </div>
					   <div  class="registerBlade">
						<input type='text' name='nome' id="nome" placeholder="Nome" class="inputText"> <span style="color:red;" id="errorName"></span>
					   </div>
					   <div class="registerBlade" >
						<input type='text' name='cognome' id="cognome" placeholder="Cognome" class="inputText"> <span style="color:red;" id="errorSurname"></span>
					   </div>
					   <div class="registerBlade" >
						<input type='text' name='email' id="email" placeholder="Email" class="inputText"> <span style="color:red;" id="errorEmail"></span>
					   </div>
					   <div  class="registerBlade">
						<button id="buttonLogin" class="btn btn-primary">Registrati</button>
					   </div>
					   <div class="registerBlade" >
						<a href="login">Login</a>
					   </div>
				
                    
                
				
					<div role="alert" id="alert" class="alert hidden"></div>
				
				

                

            </section>
            <footer>
                <p>Antonio Luca Cardaci</p>
                <p>O46002184</p>
            </footer>

        </main>
    </body>
</html>