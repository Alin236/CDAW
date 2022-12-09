$(document).ready( function () {
    $('#pokedex').DataTable({
        dom : 'lfBrtip',
        buttons: [
            {
                text: 'Mes pokémons',
                action: afficheMesPokemons,
            }
        ]
    });

    $('#box').hide();

    $('#pokedex > tbody > tr')
        .mouseenter(function(event){
            let id = event.currentTarget.children[0].innerHTML;
            $.get({
                url: 'api/pokemon/' + id,
                success: function(pokemon){
                    $("#box span")[0].innerHTML = pokemon.name;
                    $("#box span")[1].innerHTML = pokemon.level;
                    $("#box span")[2].innerHTML = pokemon.pv_max;
                    $("#box span")[3].innerHTML = pokemon.attack;
                    $("#box span")[4].innerHTML = pokemon.special_attack;
                    $("#box span")[5].innerHTML = pokemon.special_defense;
                    $('#box').show();
                },
                datatype: 'json',
            });
        })
        .mousemove(function(event){
            $('#box').css({left: event.pageX + 20, top: event.pageY});
        })
        .mouseleave(function(event){
            $('#box').hide();
        })
});

let mesMaitrise = '';
function afficheMesPokemons(){
    if($('#pokedex').DataTable().column(2).search() == ''){
        $('#pokedex').DataTable().column(2).search(mesMaitrise, true).draw();
        $(".dt-button:first span").html('Tous les pokémons');
    }
    else{
        $('#pokedex').DataTable().column(2).search('').draw();
        $(".dt-button:first span").html('Mes pokémons');
    }
}