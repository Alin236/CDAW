// let joueurs = [j1, j2]
let joueurActuelIndex = Math.floor(Math.random() * 2);
let joueurAdverseIndex = (joueurActuelIndex+1)%2;
// let pokemons = [[pokemon11, pokemon12, pokemon13], [pokemon21, pokemon22, pokemon23]]
let tour = 1;
let description;
let action;
const Action = {
    attaque: 'Attaque',
    attaqueSpe: 'Attaque spéciale',
    defenseSpe: 'Défense spéciale',
    fuite: 'Fuite'
};

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
    pokemons[joueurActuelIndex].forEach(pokemon => {
        pokemon.pv = 0;
    })
}

function pokemonAdverseIsDead(){
    pokemonAdverse = getPokemonOfJoueur(joueurAdverseIndex);
    if(pokemonAdverse.pv <= 0){
        description += pokemonAdverse.name + " est KO"
        return true;
    }
    return false;
}

function pokemonAdverseSuivant(){
    if(++pokemonActuelIndex[joueurAdverseIndex] == 3){
        fin();
    };    
}

function fin(){
    console.log("fin");
}