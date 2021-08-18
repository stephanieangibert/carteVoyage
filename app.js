let distance="";
let ville="";
let tableau=[];
let element="";
let mymap="";
let marker="";
let arrayVille=[];




window.onload=function(){
     mymap = L.map('mapid').setView([44.011921799999996, 4.417752],4.5);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        minZoom:1,
        maxZoom:20,
        name:"tiles"
    }).addTo(mymap);  

    let search=document.getElementById("search");
    let kms=document.getElementById("kms");
    let valeur=document.getElementById("valeur");
   

 

    search.addEventListener("change",function(){
        ajaxGet(`https://nominatim.openstreetmap.org/search?q=${this.value}&format=json&adressdetails=1&limit=1&polygon_svg=1`)
        .then(reponse =>{
            let data =JSON.parse(reponse);
           
            ville=[data[0].lat,data[0].lon];
            mymap.panTo(ville);
            const LeafIcon = L.Icon.extend({ options: { iconSize: [38, 95], shadowSize: [50, 64], iconAnchor: [22, 94], shadowAnchor: [4, 62], popupAnchor: [-3, -76] } });
            const greenIcon = new LeafIcon({ iconUrl: 'public/images/epingle.svg'})
           
              marker=L.marker([data[0].lat,data[0].lon],{icon: greenIcon}).addTo(mymap); 
            console.log(ville);
            document.getElementById("lat").value=data[0].lat; 
            document.getElementById("lon").value=data[0].lon;
            const villeChoisie=data[0].display_name.split(', ');            
            document.getElementById("ville").value=villeChoisie[0].replace(',','');           
            console.log(villeChoisie[0].replace(',',''));
           
        })
       
    })

    kms.addEventListener("change",function(){
distance=this.value;
valeur.innerText=distance + " kms";
    })
    let monde=document.getElementById("monde");
    let europe=document.getElementById("europe");
    let france=document.getElementById("france");
 
    monde.addEventListener("click",()=>{
       mymap.setView([0, 0], 2);
    }) 
    europe.addEventListener("click",()=>{
        mymap.setView([44.011921799999996, 4.417752],4.5);
     })    
     france.addEventListener("click",()=>{
        mymap.setView([47, 4.417752],6);
     })    
    


   


function ajaxGet(url){
return new Promise (function(resolve,reject){
let xmlhttp=new XMLHttpRequest();

xmlhttp.onreadystatechange = function(){
    if(xmlhttp.readyState==4){
        if(xmlhttp.status==200){
            resolve(xmlhttp.response)
        }else{
            reject(xmlhttp)
        }
    }
}
xmlhttp.onerror=function(error){
    reject(error);
}
xmlhttp.open("get",url,true)
xmlhttp.send()
    })
}

let xmlhttp = new XMLHttpRequest();

xmlhttp.onreadystatechange = function() {
 
    if(xmlhttp.readyState == 4){
    
        if(xmlhttp.status == 200){
         
            let donnees = JSON.parse(xmlhttp.responseText);
            console.log(donnees);
            // console.log(Object.values(donnees));
            // const tabObj=Object.values(donnees);
        
          
           for (const key in donnees) {
               if (Object.hasOwnProperty.call(donnees, key)) {
                     element = donnees[key];
                  if(element.user_id==document.getElementById("userCache").value){
                      console.log(element.ville);
                     let markerBis=L.marker([element.lat,element.lon]).addTo(mymap);                   
                    
                     if(!arrayVille.includes(element.ville)){
                         arrayVille.push(element.ville);
                     }
                    //  let arrayVille=[...new Set(arrayV)];                   
                                    
                     
                       
                }
              
                
            } 
         
           
         }
        
         }else{
             console.log(xmlhttp.statusText);
         }
     }
     console.log(arrayVille);
     const villeUsers=document.querySelector(".villeUsers");
   
     for(i=0;i<arrayVille.length;i++){
        let paraVille=document.createElement("p");
       paraVille.textContent=arrayVille[i];
       villeUsers.appendChild(paraVille);
        
    } 
 }
 
 xmlhttp.open("GET", "api/epingle.php");
 
 xmlhttp.send(null);


 
}                  
                 
                 
                
if(innerWidth<935){
    document.querySelector(".toggle").style.display="flex";
    document.querySelector("ul").style.display="none";


}                   
                
                    
                 
                    
                   
              