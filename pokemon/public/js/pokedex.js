$(document).ready( function () {
    $('#pokedex').DataTable({
        dom : 'lfBrtip',
    });
    $('#divSwitch').appendTo('.dt-buttons');
    $('#switch').attr('onclick', 'afficheMesPokemons(this)');
    $('#labelSwitch2').css('color', 'lightgray');

    $('#box').hide();

    $('#pokedex > tbody > tr')
        .mouseenter(function(event){
            let id = event.currentTarget.children[0].innerHTML;
            $.get({
                url: 'api/pokemon/' + id,
                success: function(pokemon){
                    $("#box h5")[0].innerHTML = pokemon.name;
                    $("#box span")[0].innerHTML = pokemon.level;
                    $("#box span")[1].innerHTML = pokemon.pv_max;
                    $("#box span")[2].innerHTML = pokemon.attack;
                    $("#box span")[3].innerHTML = pokemon.special_attack;
                    $("#box span")[4].innerHTML = pokemon.special_defense;
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
        $('#labelSwitch1').css('color', 'lightgray');
        $('#labelSwitch2').css('color', 'black');
    }
    else{
        $('#pokedex').DataTable().column(2).search('').draw();
        $('#labelSwitch1').css('color', 'black');
        $('#labelSwitch2').css('color', 'lightgray');
    }
}