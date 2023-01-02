//let idPartie;

function jouer(actionChoisi){
    if(game == Game.fini){
        return;
    }
    action = actionChoisi;
    faireAction();
    if(pokemonAdverseIsDead()){
        pokemonAdverseSuivant();
    }
    joueurSuivant();
    sauvegarderAction();
    updateAffichage();
}

function updateAffichage(){
    afficherPokemonDeJoueur(0);
    afficherPokemonDeJoueur(1);
    afficherDescription();
    afficherInterfaceDuJoueur(joueurActuelIndex);
}

function afficherPokemonDeJoueur(joueurIndex){
    $(".card-deck").eq(joueurIndex).children().each((i, card)=>{
        pokemon = pokemons[joueurIndex][i];
        afficherPokemonCard(card, pokemon);
    })
}

function afficherPokemonCard(card, pokemon){
    baliseActuel = $(card).children();
    baliseActuel.eq(0).html(pokemon.name);
    baliseActuel = baliseActuel.eq(1).children();
    baliseActuel.eq(2).attr("src",pokemon.path);
    baliseActuel = baliseActuel.children().children();
    baliseActuel.eq(0).html(pokemon.pv + "/" + pokemon.pv_max);
    baliseActuel.eq(1).html(pokemon.defense);
    baliseActuel.eq(2).html(pokemon.attack);
    baliseActuel.eq(3).html(pokemon.special_attack);
    baliseActuel.eq(4).html(pokemon.special_defense);

    if(pokemon.pv<=0){
        baliseActuel = $(card).removeClass("border-" + joueurs[0].color).removeClass("border-" + joueurs[1].color).addClass("border-secondary");
        baliseActuel.removeClass("border-" + joueurs[0].color).removeClass("border-" + joueurs[1].color).addClass("border-secondary");
        baliseActuel = baliseActuel.children();
        baliseActuel.removeClass("border-" + joueurs[0].color).removeClass("border-" + joueurs[1].color).addClass("border-secondary");
        baliseActuel = baliseActuel.children();
        baliseActuel.removeClass("border-" + joueurs[0].color).removeClass("border-" + joueurs[1].color).addClass("border-secondary");
    }
}

joueurs[0].color = "primary";
joueurs[1].color = "danger";

function afficherInterfaceDuJoueur(joueurIndex){
    $("h1 span").html(joueurs[joueurIndex].name);
    joueurActuelColor = joueurs[joueurIndex].color;
    joueurAdverseColor = joueurs[(joueurIndex+1)%2].color;
    $("h1").addClass("text-" + joueurActuelColor).removeClass("text-" + joueurAdverseColor);
    $(".commande button").addClass("btn-" + joueurActuelColor).removeClass("btn-" + joueurAdverseColor);

    buttons = $("#commandeBox button");
    buttons.removeAttr("disabled");
    if(game == Game.fini){
        buttons.attr("disabled", "true");
        return;
    }
    pokemon = getPokemonOfJoueur(joueurIndex);
    if(pokemon.pt.special_attack == 0)
        buttons.eq(1).attr("disabled", "true");
    if(pokemon.pt.special_defense == 0)
        buttons.eq(2).attr("disabled", "true");
}

function afficherDescription(){
    $("#description p").html(description);
}

$(document).ready(function(){
    updateAffichage();
})

let actions = [];
function sauvegarderAction(){
    actions.push(action);
};

function sauvegarderPartie(){
    partieInfo = {id: idPartie, actions: actions, gagnant: gagnant};
    $.post({
        url: 'combat', 
        data: partieInfo,
        dateType: 'json',
    })
}