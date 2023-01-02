function jouer(actionChoisi){
    action = actionChoisi;
    faireAction();
    if(pokemonAdverseIsDead()){
        pokemonAdverseSuivant();
    }
    updateAffichage();
    joueurSuivant();
}

function updateAffichage(){
    console.log(getPokemonOfJoueur(joueurActuelIndex));
    console.log(getPokemonOfJoueur(joueurAdverseIndex));
}

