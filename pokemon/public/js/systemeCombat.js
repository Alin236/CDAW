// let joueurs = [j1, j2]
//let joueurActuelIndex = Math.floor(Math.random() * 2);
let joueurAdverseIndex = (joueurActuelIndex+1)%2;
// let pokemons = [[pokemon11, pokemon12, pokemon13], [pokemon21, pokemon22, pokemon23]]
let description;
let action;
const Action = {
    attaque: 'Attaque',
    attaqueSpe: 'Attaque spéciale',
    defenseSpe: 'Défense spéciale',
    fuite: 'Fuite',
    automatique: 'Automatique',
    replay: 'Replay'
};
const Game = {
    enCours: "en cours",
    fini: "fini"
}
let game = Game.enCours;
let gagnant;
//let idPartie;
//let idBattleType;
//let actionsReplay;

pokemons.forEach(pokemonJ => {
    pokemonJ.forEach(pokemon => {
        pokemon.pv = pokemon.pv_max;
        pokemon.defense = 0;
        pokemon.pt = {special_attack: 1, special_defense: 1};
    })
});

function joueurSuivant(){
    joueurAdverseIndex = joueurActuelIndex;
    joueurActuelIndex = (joueurActuelIndex+1)%2;
}

function faireAction(){
    description = "";
    switch(action){
        case Action.attaque:
            faireAttaque();
            break;
        case Action.attaqueSpe:
            faireAttaqueSpe();
            break;
        case Action.defenseSpe:
            faireDefenseSpe();
            break;
        case Action.fuite:
            faireFuite();
            break;
        case Action.automatique:
            faireAutomatique();
            break;
        case Action.replay:
            faireReplay();
            break;
    }
}

function getPokemonOfJoueur(joueurIndex){
    return pokemons[joueurIndex][pokemonActuelIndex[joueurIndex]];
}

function faireAttaque(){
    pokemonActuel = getPokemonOfJoueur(joueurActuelIndex)
    attaque = pokemonActuel.attack;
    pokemonAdverse = getPokemonOfJoueur(joueurAdverseIndex);
    degat = Math.max(attaque - pokemonAdverse.defense, 0);
    pokemonAdverse.pv -= degat;
    pokemonAdverse.defense = 0;
    description += pokemonActuel.name + " effectue une attaque<br>"
    description += pokemonActuel.name + " inflige " + degat + " à " + pokemonAdverse.name + "<br>";
}

function faireAttaqueSpe(){
    pokemonActuel = getPokemonOfJoueur(joueurActuelIndex);
    if(pokemonActuel.pt.special_attack == 0){
        action = Action.attaque
        faireAttaque();
        return;
    }
    pokemonActuel.pt.special_attack -= 1;
    attaque = getPokemonOfJoueur(joueurActuelIndex).special_attack;
    pokemonAdverse = getPokemonOfJoueur(joueurAdverseIndex);
    degat = Math.max(attaque - pokemonAdverse.defense, 0);
    pokemonAdverse.pv -= degat;
    pokemonAdverse.defense = 0;
    description += pokemonActuel.name + " effectue une attaque spéciale<br>"
    description += pokemonActuel.name + " inflige " + degat + " point de dégât à " + pokemonAdverse.name + "<br>";
}

function faireDefenseSpe(){
    pokemonActuel = getPokemonOfJoueur(joueurActuelIndex);
    if(pokemonActuel.pt.special_defense == 0){
        action = Action.attaque
        faireAttaque();
        return;
    }
    pokemonActuel.pt.special_defense -= 1;
    pokemonActuel.defense = pokemonActuel.special_defense;
    description += pokemonActuel.name + " effectue defense spécial<br>"
    description += pokemonActuel.name + " reçoit " + pokemonActuel.defense + " point de défense<br>";
}

function faireFuite(){
    sauvegarderAction();
    description = joueurs[joueurActuelIndex].name + " fuit le combat<br>"
    gagnant = joueurs[joueurAdverseIndex];
    fin();
}

function pokemonAdverseIsDead(){
    pokemonAdverse = getPokemonOfJoueur(joueurAdverseIndex);
    if(pokemonAdverse.pv <= 0){
        description += pokemonAdverse.name + " est KO<br>"
        return true;
    }
    return false;
}

function pokemonAdverseSuivant(){
    if(++pokemonActuelIndex[joueurAdverseIndex] == 3){
        gagnant = joueurs[joueurActuelIndex];
        fin();
    };    
}

function fin(){
    game = Game.fini;
    description += gagnant.name + ' est le vainqueur<br><a class="btn btn-success" href=".." role="button">Retour</a>'
    if(idBattleType != 4)
        sauvegarderPartie();
}

function jouer(actionChoisi){
    if(game == Game.fini){
        return;
    }
    action = actionChoisi;
    faireAction();
    sauvegarderAction();
    if(pokemonAdverseIsDead()){
        pokemonAdverseSuivant();
    }
    joueurSuivant();
    if(idBattleType == 4 && game != Game.fini)
        checkReplayFini();
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
    if(idBattleType == 3 || idBattleType == 4)
        return;
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
    if(idBattleType == 3){
        $("#commandeBox button").attr("onclick", "jouer(Action.automatique)").html("Automatique");
    }
    if(idBattleType == 4){
        $("#commandeBox button").attr("onclick", "jouer(Action.replay)").html("Replay");
        checkReplayFini();
    }
    updateAffichage();
})

let actions = [];
function sauvegarderAction(){
    actions.push(action);
};

function sauvegarderPartie(){
    partieInfo = {idPartie: idPartie, actions: actions, gagnant: gagnant};
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '../combat',
        type: 'PUT',
        data: partieInfo,
        dateType: 'text',
        success: function(data){
            console.log(data);
        }
    })
}

function faireAutomatique(){
    pokemonActuel = getPokemonOfJoueur(joueurActuelIndex)
    if(pokemonActuel.pt.special_attack != 0){
        action = Action.attaqueSpe;
        faireAttaqueSpe();
        return;
    }
    if(pokemonActuel.pt.special_defense != 0){
        action = Action.defenseSpe;
        faireDefenseSpe();
        return;
    }
    action = Action.attaque;
    faireAttaque();
}

function checkReplayFini(){
    if(actionsReplay.length == 0){
        game = Game.fini;
        description = 'Match non fini<br>Match non enregistré<br><a class="btn btn-success" href=".." role="button">Retour</a>'
    }
}

function faireReplay(){
    action = actionsReplay[0];
    actionsReplay.splice(0, 1);
    faireAction();
}