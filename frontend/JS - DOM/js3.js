"use strict";

function modify(e)
{
    e.srcElement.parentElement.children[1].innerHTML = "Chaîne modifiée!!"
}

function deleter(e)
{
    e.srcElement.parentElement.hidden = true;
}

let i = 4;
document.getElementById("addNew").addEventListener("click", function(e){
    let html = '<div><h4>Moi</h4><p>Nouveau commentaire.</p><button class="modify">Modify Comment</button><button class="remove">Remove Comment</button></div>';
    let users = document.getElementById("users");
    users.innerHTML+=html;
    initBouton();
    users.lastChild.id = "user" + i;
    i++;
})

function initBouton(){
    let modifiers = document.getElementsByClassName("modify");
    Array.from(modifiers).forEach(m => m.addEventListener("click",modify));

    let remover = document.getElementsByClassName("remove");
    Array.from(remover).forEach(m => m.addEventListener("click",deleter));
}
initBouton();