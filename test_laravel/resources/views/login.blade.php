<html>
    <head>
    <link rel="stylesheet" href="../resources/css/style.css"/>
    </head>
    <body>
    <header>

				 <h1>
					 <strong>Login</strong>
				 </h1>
				
			</header>
		<main>
		@if ($message!="")<div role="alert" id="alert" class="alert alert-danger center">{{$message}}</div>@endif
			<div class="centerBox">
			
				<form name='user_form' method='post'>
				
                    <input type='hidden' name='_token' value='{{$csrf_token}}'></input>
					<p>
						 <input type='text' name='id' placeholder="Username">
					</p>
					<p>
						<input type='password' name='password' placeholder="Password">
					</p>
					<a href="registrazione">Non sei registrato? Registrati ora</a>
					<p>
						<button type='submit' name='login' class='btn btn-primary'>Accedi</button>
					</p>
				</form>
				
			</div>
		</main>

        <footer>
                <p>Antonio Luca Cardaci</p>
                <p>O46002184</p>
        </footer>

        
</body>
</html>