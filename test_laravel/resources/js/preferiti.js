const section = document.getElementById("section");



function createPadri(contenuti){

	if(contenuti!=null){
	
	
	var numeroElementi = contenuti.length;
	
	var padriNecessari = Math.ceil(numeroElementi/3);
	
	}
	for(let numeroPadre = 0; numeroPadre < padriNecessari;numeroPadre++){
		
		
		var padre = document.createElement("div");
		
		padre.setAttribute("id","contenitorePadre"+numeroPadre);
		
		padre.classList.add("box");
		
		
		var inizio = 0 + (numeroPadre * 3);
		var fine = inizio + 3;
		
		createChild(padre,inizio,fine,numeroElementi,contenuti);
		section.appendChild(padre);
	}
}



function createChild(divPadre,inizio,fine,numeroElementi,contenuti){
	
	
	for(let i = inizio; i < fine; i++){
		
		if(i < numeroElementi){
			
			
			
			const figlio = document.createElement("div");
			figlio.setAttribute("id","divFiglio"+i);
			
			const img = createImg(contenuti[i].immagine,"immagine"+i, 400,400);
			figlio.appendChild(img);
			
			
			const divTitolo = document.createElement("div");
			divTitolo.setAttribute("id","divTitolo"+i);
			const h1 = createTitolo(contenuti[i].titolo,"titolo"+i);
		
			divTitolo.appendChild(h1);
			
			figlio.appendChild(divTitolo);
			
			divPadre.appendChild(figlio);
		}
	}
	console.log(divPadre);
	
}



function createTitolo(testo,id){
	const h1 = document.createElement("h1");
	h1.innerHTML = testo;

	h1.setAttribute("id", id);
	
	return h1;
	
}

function createImg(src,id,width,height){
	const img = document.createElement("img");
	img.setAttribute("src",src);
	img.setAttribute("height",height);
	img.setAttribute("width",width);
	img.setAttribute("id", id);
	
	return img;
}





/*function importContent(event){
	fetch("favourite", {
	method: 'get', 
	headers: {
	  'X-CSRF-TOKEN': document.getElementsByTagName('meta')[0].getAttribute('content')
    },
	}).then(function(response) {
			if (response.status >= 200 && response.status < 300) {
				return response.json();
			}
			throw new Error(response.statusText)
		})
		.then(function(response) {

			const contenuti = response;
			createPadri(contenuti);
			
		});
}

importContent();*/