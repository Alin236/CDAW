// let joueurs = [j1, j2]
let joueurActuelIndex = Math.floor(Math.random() * 2);
let joueurAdverseIndex = (joueurActuelIndex+1)%2;
// let pokemons = [[pokemon11, pokemon12, pokemon13], [pokemon21, pokemon22, pokemon23]]
let tour = 1;
let action;
const Action = {
    attaque: 'Attaque',
    attaqueSpe: 'Attaque spécial',
    defenseSpe: 'Défense spécial',
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
    attaque = getPokemonOfJoueur(joueurActuelIndex).attack;
    pokemonAdverse = getPokemonOfJoueur(joueurAdverseIndex);
    degat = Math.max(attaque - pokemonAdverse.defense, 0);
    pokemonAdverse.pv -= degat;
    pokemonAdverse.defense = 0;
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
}

function faireFuite(){
    pokemons[joueurActuelIndex].forEach(pokemon => {
        pokemon.pv = 0;
    })
}

function pokemonAdverseIsDead(){
    if(getPokemonOfJoueur(joueurAdverseIndex).pv <= 0)
        return true;
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