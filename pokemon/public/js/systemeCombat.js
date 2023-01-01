// let joueurs = [j1, j2]
let joueurActuelIndex = Math.floor(Math.random() * 2);
let joueurAdverseIndex = (joueurActuelIndex+1)%2;
// let pokemons = [[pokemon11, pokemon12, pokemon13], [pokemon21, pokemon22, pokemon23]]
let tour = 1;
let defenses = [0, 0];
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
    })
});

function joueurSuivant(){
    joueurAdverseIndex = joueurActuelIndex;
    joueurActuelIndex = (joueurActuelIndex+1)%2;
}

function faireAction(){
    switch(action){
        case Action.attaque:
            faireAction;
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
    degat = Math.max(attaque - defenses[joueurAdverseIndex], 0)
    getPokemonOfJoueur(joueurAdverseIndex).pv -= degat;
    defenses[joueurAdverseIndex] = 0;
}

function faireAttaqueSpe(){
    attaque = getPokemonOfJoueur(joueurActuelIndex).attack;
    degat = Math.max(attaque - defenses[joueurAdverseIndex], 0)
    getPokemonOfJoueur(joueurAdverseIndex).pv -= degat;
    defenses[joueurAdverseIndex] = 0;
}

function faireDefenseSpe(){

}

function faireFuite(){
    //abondonner
}