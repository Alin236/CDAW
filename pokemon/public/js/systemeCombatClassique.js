function jouer(actionChoisi){
    action = actionChoisi;
    faireAction();
    if(pokemonAdverseIsDead()){
        pokemonAdverseSuivant();
    }
    joueurSuivant();
    updateAffichage();
}

function updateAffichage(){
    afficherPokemonDeJoueur(0);
    afficherPokemonDeJoueur(1);
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
}

joueurs[0].color = "primary";
joueurs[1].color = "danger";

function afficherInterfaceDuJoueur(joueurIndex){
    $("h1 span").html(joueurIndex+1);
    joueurActuelColor = joueurs[joueurIndex].color;
    joueurAdverseColor = joueurs[(joueurIndex+1)%2].color;
    $("h1").addClass("text-" + joueurActuelColor).removeClass("text-" + joueurAdverseColor);
    $(".commande button").addClass("btn-" + joueurActuelColor).removeClass("btn-" + joueurAdverseColor);
}

$(document).ready(function(){
    updateAffichage();
})