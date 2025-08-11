<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register-Account</title>
    
    <!-- link path -->
    <?php include 'app/views/includes/links.php' ?>
    <!-- link path -->
</head>
<body>
    <div class="container-fluid d-none d-lg-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="col-lg-4 px-5 py-4 rounded-4 shadow-lg">
            <div class="text-center">
                <img src="app/assets/image/logo.png" alt="" width="120px">
                <h2 class="mb-0">Pizza. <span class="text-warning">KH</span> </h2>
                <p class="text-secondary">Please field the form to create account.</p>
            </div>
           <form id="signupform">
                <input required id="username" name="username" type="text" class="form-control my-3 shadow-none border" placeholder="Username">
                <input required id="email" name="email" type="email" class="form-control my-3 shadow-none border" placeholder="Email">
                <input required id="password" name="password" type="password" class="form-control my-3 shadow-none border" placeholder="Password">
                <hr>
                <button class="btn btn-success w-100">
                    Sign Up
                </button>
                <p class="text-center mt-2">
                    Do you have account ?
                    <a href="index.php?page=auth">
                        Sign In
                    </a>
                </p>
           </form>
        </div>
    </div>

    <!-- link notfound page -->
    <?php include 'app/views/includes/notfound.php' ?>
    <!-- link notfound page -->
   
</body>
<script>
    // jquery syntax
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
                dataType: 'json',
                success: function(res){
                    // success message
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
</script>
</html>