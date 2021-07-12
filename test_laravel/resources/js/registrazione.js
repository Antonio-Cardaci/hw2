
function viewSuccess(message){
	const aler = document.getElementById("alert");
	aler.classList.add("alert-success");
	aler.classList.remove("alert-danger");
	aler.classList.remove("hidden");
	aler.innerHTML = message;
}

function viewError(message){
	const aler = document.getElementById("alert");
	aler.classList.add("alert-danger");
	aler.classList.remove("alert-success");
	aler.classList.remove("hidden");
	aler.innerHTML = message;
}

function check(event){
    const username=document.getElementById("username").value;
	const errorUsername = document.getElementById("errorUsername");
	const pass = document.getElementById("password").value;
	const errorPassword = document.getElementById("errorPassword");
	const nome=document.getElementById("nome").value;
	const errorName = document.getElementById("errorName");
	const cognome=document.getElementById("cognome").value;
	const errorSurname = document.getElementById("errorSurname");
	const email=document.getElementById("email").value;
	const errorEmail = document.getElementById("errorEmail");
    var valid = true;
	if(username.length == 0 || !/^[a-zA-Z0-9]{1,15}$/.test(username)){
        errorUsername.innerHTML = "Sono ammesse lettere,numeri. Max 15";
		errorUsername.classList.remove("hidden");
		valid = false;
    }
	if(nome.length == 0){
        errorName.innerHTML = "E' obbligatorio";
		errorName.classList.remove("hidden");
		valid = false;
    }
	else{
		errorName.classList.add("hidden");
	}
	if(cognome.length == 0 ){
        errorSurname.innerHTML = "E' obbligatorio";
		errorSurname.classList.remove("hidden");
		valid = false;
    }
	if(email.length == 0 ){
        errorEmail.innerHTML = "E' obbligatorio";
		errorEmail.classList.remove("hidden");
		valid = false;
    }
	if(pass.length == 0 || !/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(pass)){
		 errorPassword.innerHTML =
		"La password deve rispettare i seguenti criteri:Minimo otto caratteri, almeno una lettera maiuscola,una lettera minuscola, un numero e un carattere speciale";
		errorPassword.classList.remove("hidden");
		valid = false;
    }


	if(valid)
	{
		errorUsername.classList.add("hidden");
		errorPassword.classList.add("hidden");
		errorName.classList.add("hidden");
		errorSurname.classList.add("hidden");
		errorEmail.classList.add("hidden");

		
		
		postData("insertUtente",{"username": username, "password": pass, "nome":nome, "cognome":cognome, "email":email})
		.then(data =>{
				var result = ""+data.result;
				var message = ""+data.message;
				if(result == "notOk"){
					console.log("qui");
					viewError(message);
				}
				else if(result == "ok") {
					viewSuccess(message);
				}
				else {
					viewError("Si e' verificato un errore, riprova piu' tardi.");
				}
			})
	}
		
		
		
		
	
			
    
}

async function postData(url = '', data = {}) {
	const response = await fetch(url, {
	  method: 'POST', 
	  headers: {
		'Content-Type': 'application/json',
		'X-CSRF-TOKEN': document.getElementsByTagName('meta')[0].getAttribute('content')
	 
	  },
	  body: JSON.stringify(data) 
	});
	return response.json(); 
  }
  

const buttonLogin = document.getElementById("buttonLogin");
buttonLogin.addEventListener("click",check);


