$(document).ready(function(){
        // listen to id signupform that submit data or not
        $('#signupform').on('submit',function(e){

            e.preventDefault(); // prevent reload page

            // declare var to get value from name in <input>
            let name = $('#username').val() 
            let email = $('#email').val()
            let pass = $('#password').val()

            // console.log(name,email,pass);

            // syntax ajax
            $.ajax({
                url:'index.php?page=signup',
                method:'post',
                data:{
                    func:'register',
                    name:name,
                    email:email,
                    pass:pass
                },
                // dataType: 'json',
                success: function(res){
                    if (res) {
                        window.location.href = 'index.php'; 
                    } else {
                        alert('Error: ' + res);
                    }
                },
                error:function(){
                    // error message
                }
            })

            // clear input form
            $('#username').val('')
            $('#email').val('')
            $('#password').val('')
            
        })
})