"use strict";

function modify(e)
{
    e.srcElement.parentElement.children[1].innerHTML = "Chaîne modifiée!!"
}

function deleter(e)
{
    e.srcElement.parentElement.hidden = true;
}

document.getElementById("addNew").addEventListener("click", function(e){
    alert(e.type +" on add !");
})

let modifiers = document.getElementsByClassName("modify");
Array.from(modifiers).forEach(m => m.addEventListener("click",modify));

let remover = document.getElementsByClassName("remove");
Array.from(remover).forEach(m => m.addEventListener("click",deleter));