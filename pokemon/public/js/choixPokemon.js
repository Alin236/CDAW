function authenticate(){
    email = $("#authentifier input").eq(0).val();
    password = $("#authentifier input").eq(1).val();
    json = {email: email, password: password};

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.post({
        url: 'user', 
        data: json,
        dateType: 'json',
        success: function(data){
            if(data == false){
                $("#authentifier p").html("Problème lors de la connexion");
                return;
            }
            $("#authentifier").hide();
            joueurs[0] = data.joueur1;
            joueurs[1] = data.joueur2;
            joueurActuelIndex = Math.floor(Math.random()*2);
            pokemons[0] = data.pokemons1;
            pokemons[1] = data.pokemons2;
            joueurs[0].nombreDePokemon = 0;
            joueurs[1].nombreDePokemon = 0;
            updateAffichage();
            if(battleType.id == 1){
                $("#choix").show();
            }
            else{
                choixAleatoire()
            }
        },
    })
}

let battleType = 0;

function joueurSuivant(){
    joueurActuelIndex = (joueurActuelIndex+1)%2;
}

function createCard(pokemon){
    str = '<div class="card" onclick="add(' + pokemon.id + ')"><div class="card-body"><img src="' + pokemon.path + '"></div></div>';
    $(".card-columns").append(str);
}

let joueurs = [];
let pokemons = [];
let joueurActuelIndex;
let pokemonsChoisi = [];
pokemonsChoisi[0] = [];
pokemonsChoisi[1] = []

function createAllCard(){
    $(".card-columns").html("");
    pokemons[joueurActuelIndex].forEach(pokemon => {
        createCard(pokemon);
    });
}

function updateAffichage(){
    $("h2").children().eq(0).html(joueurs[joueurActuelIndex].name);
    $("h2").children().eq(1).html(joueurs[joueurActuelIndex].nombreDePokemon+1);
    createAllCard();
}

function add(pokemonId){
    pokemonsChoisi[joueurActuelIndex].push(pokemonId);
    joueurs[joueurActuelIndex].nombreDePokemon++;
    remove(pokemonId);
    joueurSuivant();
    if(joueurs[joueurActuelIndex].nombreDePokemon == 3){
        $(".card-columns").html("");
        fin();
        return;
    }
    updateAffichage();
}

function remove(pokemonId){
    var indexToRemove = 0;
    pokemons[joueurActuelIndex].forEach(function(value, i){
        if(value.id == pokemonId)
            indexToRemove = i;
    })
    pokemons[joueurActuelIndex].splice(indexToRemove, 1);
}

function fin(){
    form = $("#formInput input")
    form.eq(0).val(joueurs[0].id);
    form.eq(1).val(joueurs[1].id);
    form.eq(2).val(pokemonsChoisi[0][0]);
    form.eq(3).val(pokemonsChoisi[0][1]);
    form.eq(4).val(pokemonsChoisi[0][2]);
    form.eq(5).val(pokemonsChoisi[1][0]);
    form.eq(6).val(pokemonsChoisi[1][1]);
    form.eq(7).val(pokemonsChoisi[1][2]);
    form.eq(8).val(joueurs[joueurActuelIndex].id);
    form.eq(9).val(battleType.id);
    $("form").submit();
}

$("#choix").hide();

function choixAleatoire(){
    $pokemonChoisi = pokemons[joueurActuelIndex][Math.floor(Math.random() * pokemons[joueurActuelIndex].length)];
    add($pokemonChoisi.id);
    if(joueurs[joueurActuelIndex].nombreDePokemon != 3){
        choixAleatoire()
    }
}