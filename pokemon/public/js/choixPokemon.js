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
            console.log(data);
        },
    })

}