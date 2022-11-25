$(document).ready( function () {
    $('#pokedex').DataTable();

    $('#box').hide();
    let temps = 0;
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
            $('#box').css({left: event.pageX, top: event.pageY});
        })
        .mouseleave(function(event){
            $('#box').hide();
        })
});