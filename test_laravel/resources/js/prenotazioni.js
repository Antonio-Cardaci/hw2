const section = document.getElementById("prenotazioni");
const section_effettuate = document.getElementById("prenotazioniEffettuate");
const dataDa = document.getElementById("dataDa");
const dataA = document.getElementById("dataA");



function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) 
        month = '0' + month;
    if (day.length < 2) 
        day = '0' + day;

    return [year, month, day].join('-');
}

var today = new Date();
todayFormatted = formatDate(today);
dataDa.setAttribute("value", todayFormatted);
dataA.setAttribute("value", todayFormatted);



dataDa.addEventListener("change", event =>{
	checkPrenotazioni(event.target.value, dataA.value);
});
dataA.addEventListener("change", event =>{
	checkPrenotazioni(dataDa.value,event.target.value);
});


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



function checkPrenotazioni(dataDa,dataA){
	//post data per effettuare chiamate post
	postData("checkPrenotazioni", {"dataDa":dataDa, "dataA":dataA}).then(data =>{
		
		
		if(data.length>0){
			//ci sono prenotazioni
			data.forEach(element => {
				//se esiste la prenotazione nascondo il pulsante prenota
				hidePrenotazioniButton(element);
				//se esiste la prenotazione mostriamo messaggio prenotazione esistente
				var checkH1 = document.getElementById("h1_prenotazione_"+element.id_stanza);
				if(checkH1 == null ){
					var h1 = document.createElement("h1");
					h1.innerHTML = "Prenotazione esistente";
					h1.setAttribute("id","h1_prenotazione_"+element.id_stanza);
					var div = document.getElementById("div_"+element.id_stanza);
					div.appendChild(h1);
				}
				//creare oggetto nella section prenotazioni effettuate
				createElementPrenotazione(element);
			});
			stanze.forEach(element => {
				var isPresent = false;
				for(var i = 0; i<data.length;i++){
					if(data[i].id_stanza == element){
						isPresent = true;
					}
				}
				//se non c'è prenotazione
				if(!isPresent){
					var divStanza = document.getElementById("div_"+element);
					if(divStanza!=null){
						var h1 = document.getElementById("h1_prenotazione_"+element);
						if(h1!=null)
							h1.remove();
						var buttonPrenotazione = document.getElementById("btn_"+element);
						buttonPrenotazione.classList.add("btn");
						buttonPrenotazione.classList.add("btn-primary");
						buttonPrenotazione.classList.remove("hidden");
					}
				}
			});
			
		}
		else{
			stanze.forEach(element => {
				
				var divStanza = document.getElementById("div_"+element);
				if(divStanza!=null){
					var h1 = document.getElementById("h1_prenotazione_"+element);
					if(h1!=null)
						h1.remove();
					var buttonPrenotazione = document.getElementById("btn_"+element);
					buttonPrenotazione.classList.add("btn");
					buttonPrenotazione.classList.add("btn-primary");
					buttonPrenotazione.classList.remove("hidden");
				}
				
				
			});
			
			//non ci sono prenotazioni
		}
	});
}

function hidePrenotazioniButton(element){
	var buttonPrenotazione = document.getElementById("btn_"+element.id_stanza);
	console.log(buttonPrenotazione);
	buttonPrenotazione.classList.remove("btn");
	buttonPrenotazione.classList.remove("btn-primary");
	buttonPrenotazione.classList.add("hidden");
}
function showPrenotazioniButton(id){
	var buttonPrenotazione = document.getElementById("btn_"+id);
	console.log(buttonPrenotazione);
	buttonPrenotazione.classList.add("btn");
	buttonPrenotazione.classList.add("btn-primary");
	buttonPrenotazione.classList.remove("hidden");
}

function createElementPrenotazione(stanza){
	var divPrenotazioni = document.getElementById("div_prenotazioni");
	var checkDivPrenotazione = document.getElementById("prenotazione_"+stanza.id_stanza);
	if(checkDivPrenotazione==null){
		var divPrenotazione = document.createElement("div");
		divPrenotazione.setAttribute("id","prenotazione_"+stanza.id_stanza);
		divPrenotazione.classList.add("card");
		
		var titolo = document.createElement("h1");
		titolo.innerHTML = stanza.titolo;
		divPrenotazione.appendChild(titolo);

		var immagine = document.createElement("img");
		immagine.setAttribute("src",stanza.immagine);
		immagine.setAttribute("width",250);
		immagine.setAttribute("height",250);
		divPrenotazione.appendChild(immagine);

		var divContainer = document.createElement("div");
		divContainer.classList.add("container");
		var dataInizio = document.createElement("h1");
		dataInizio.innerHTML = "Check-in: "+stanza.data_prenotazione;
		divContainer.appendChild(dataInizio);

		var dataFine = document.createElement("h1");
		dataFine.innerHTML = "Check-out: "+stanza.data_fine_prenotazione;
		divContainer.appendChild(dataFine);

		//creo pulsante rimozione
		var buttonRimozione = document.createElement("a");
		buttonRimozione.setAttribute("id","btn_rimozione_"+stanza.id_stanza);
		buttonRimozione.classList.add("btn");
		buttonRimozione.classList.add("btn-primary");
		buttonRimozione.innerHTML = "Cancella";
		divContainer.appendChild(buttonRimozione);

		buttonRimozione.addEventListener("click",event=>{
			if(confirm('Sei sicuro di voler cancellare la tua prenotazione?')) {
				postData("removePrenotazione",{"id_stanza":stanza.id_stanza}).then(data =>{
					if(data.result.toUpperCase() == "ok".toUpperCase()){
						showPrenotazioniButton(stanza);
						var h1 = document.getElementById("h1_prenotazione_"+stanza.id_stanza);
						h1.remove();
						divPrenotazione.remove();
						viewSuccess(data.message);
						window.scrollTo(0, 0);
					}
					else if(data.result.toUpperCase() == "notOk".toUpperCase()){
						viewError(data.message);
						window.scrollTo(0, 0);
					}
						
				});	
			} 
			else {
			}	
		});

		divPrenotazione.appendChild(divContainer);

		divPrenotazioni.appendChild(divPrenotazione);
	}
	
}

//quando viene caricata la pagina controlliamo le prenotazioni

checkPrenotazioni(dataDa.value,dataA.value);

function addPrenotazione(){
	stanze.forEach(element => {
		var buttonPrenotazione = document.getElementById("btn_"+element);
		buttonPrenotazione.addEventListener("click",event=>{
			
			const di = new Date(dataDa.value);
			const df = new Date(dataA.value);
			if(di > df ){
				viewError("Non puoi effettuare una prenotazione con data inizio antecedente alla data fine");
				return;
			}
			else if (confirm('Sei sicuro di voler prenotare questa stanza?') ) {
				
				postData("addPrenotazione",{"dataDa":dataDa.value, "dataA":dataA.value,"id_stanza":element[0]}).then(data =>{
					if(data.result.toUpperCase() == "ok".toUpperCase()){
						checkPrenotazioni(dataDa.value,dataA.value);
						viewSuccess(data.message);
						window.scrollTo(0, 0);
					}
					else if(data.result.toUpperCase() == "notOk".toUpperCase()){
						viewError(data.message);
						window.scrollTo(0, 0);
					}
				});
			  } else {
			  }
			
			
		});
	});
}

addPrenotazione();



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





