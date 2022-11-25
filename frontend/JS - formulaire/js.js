"use strict";

function modify(e)
{
    document.forms.myForm[0].innerHTML = e.srcElement.parentElement.children[1].innerHTML;
    document.forms.myForm.style.display = 'block';
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

document.forms.myForm.addEventListener("submit", function(event){
    let comment = event.currentTarget.elements[0].value;
    if(comment == ''){
        event.preventDefault();
        document.getElementById('message').innerHTML = "Message non valide";
    }
});