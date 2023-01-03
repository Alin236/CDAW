<meta name="csrf-token" content="{{ csrf_token() }}">

<button onclick="test()">Bouton</button>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script type="text/javascript">
    function test(){
        
        json = {name: 'test', color: 'red'};

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.post({
            url: 'postTest', 
            data: json,
            dateType: 'json',
            success: function(data){
                console.log(data);
            },
        })
    }
</script>