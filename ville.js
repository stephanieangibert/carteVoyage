
let villeP=Array.from(document.querySelectorAll(".villeP"));
let nbrChoice=Array.from(document.querySelectorAll(".choice"));

let nbre=Array.from(document.querySelectorAll(".nbre"));
let epingle=Array.from(document.querySelectorAll(".epingle"));
let encartLien=document.querySelector(".encartLien");
let lienPhotoBis=document.querySelectorAll(".lienPhotoBis");
let lienPhoto=document.querySelectorAll(".lienPhoto");
let choiceArray=[];
let villeArray=[];
let myArr=[];
let lienPhotoArray=[];
let choiceArrayBis=[];


for(i=0;i<lienPhotoBis.length;i++){
    lienPhotoArray.push(lienPhotoBis[i].innerText);
}
for(i=0;i<epingle.length;i++){
    if(!lienPhotoArray.includes(epingle[i].innerText)){
        lienPhotoArray.push(epingle[i].innerText);
        const divNu = document.createElement("div");
        encartLien.appendChild(divNu);
        divNu.setAttribute("class","numero");
        divNu.innerHTML="0";
        const div = document.createElement("div");
        encartLien.appendChild(div);
        div.setAttribute("class","villeNbr");
        div.innerHTML=epingle[i].innerText;
    }
}
console.log(lienPhotoArray);
let nbrVille=Array.from(document.querySelectorAll(".villeNbr"));
let numero=Array.from(document.querySelectorAll(".numero"));
for(i=0;i<nbrVille.length;i++){   
    villeArray.push(nbrVille[i].innerText);
}
console.log(nbrVille);
for(i=0;i<nbrChoice.length;i++){  
    if(nbrChoice[i].innerText!=""){
        choiceArray.push(nbrChoice[i].innerText);
    }
    
}

console.log(choiceArray);
console.log(lienPhotoArray);
for(i=0;i<lienPhotoArray.length;i++){
    if(!choiceArray.includes(lienPhotoArray[i])){
 encartLien.removeChild(lienPhoto[i]);
console.log(i);
    }
}
console.log(numero);
//comparer liensPhotoArray et villeArray  

for(i=0;i<numero.length;i++){
    console.log(numero[i].innerText);
}
for(i=0;i<nbrVille.length;i++){   
        myArr.push([nbrVille[i].innerText,numero[i].innerText]);  
} 
console.log(myArr);
let tabNumero=[];
console.log(choiceArray);
console.log(myArr);
for(i=0;i<myArr.length;i++){
    if(choiceArray.indexOf(myArr[i][0])>=0){
        tabNumero.push(choiceArray.indexOf(myArr[i][0]));
    }
   
}
console.log(choiceArray);
console.log(myArr);

let myArrBis=[];
console.log(myArr[3][1]);
for(i=0;i<choiceArray.length;i++){
    if(choiceArray.includes(myArr[i][0])){
       for(j=0;j<1;j++){
           myArrBis.push(myArr[[i][j]]);
       }
    }
}
console.log(myArrBis);
        for(i=0;i<tabNumero.length;i++){
            console.log(tabNumero[i]);
            nbre[tabNumero[i]].innerText=myArrBis[i][1];          
           
        }   

console.log(myArr[1][0],myArr[2][0]);



for(i=0;i<numero.length;i++){
    console.log(numero[i].innerText);
}
console.log(choiceArray.indexOf("Amsterdam"));

let saisie=document.querySelector(".saisie");
let alert=document.querySelector(".alert");
console.log(saisie);
saisie.addEventListener('input',(e)=>{
   console.log(e.target.value.length);
   alert.innerText="Tu ne peux pas écrire un roman 😄, seulement  "+(45-e.target.value.length)+" caractères !";
   
})










 