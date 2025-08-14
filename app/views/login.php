<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Account</title>

     <!-- link path -->
    <?php include 'app/views/includes/links.php' ?>
    <!-- link path -->
</head>
<body>
    <div class="container-fluid d-none d-lg-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="col-4 px-5 py-4 rounded-4 shadow-lg">
            <div class="text-center">
                <img src="app/assets/image/logo.png" alt="" width="120px">
                <h2 class="mb-0">Pizza. <span class="text-warning">KH</span> </h2>
                <p class="text-secondary">Please field the form to create account.</p>
            </div>
           <form id="signinForm">
                <input required id="nameoremail" name="nameoremail" type="text" class="form-control my-3 shadow-none border" placeholder="Username or Email">
                <input required id="password" name="password" type="password" class="form-control my-3 shadow-none border" placeholder="Password">
                <hr>
                <button class="btn btn-success w-100">
                    Sign In
                </button>
                <p class="text-center mt-2">
                    Don't have account ?
                    <a href="index.php?page=signup">
                        Sign Up
                    </a>
                </p>
                
           </form>
        </div>
    </div>

    <!-- Page not found want on moble -->
    <div class="container-fluid d-flex justify-content-center align-items-center d-lg-none" style="height: 100vh;">
        <div class="text-center">
            <img src="app/assets/image/gifnotfound.gif" alt="" class="w-100">
            <h3 class="m-0">Page Not Found (BRO KO MES)</h3>
            <p class="text-secondary">Berk ler Laptop tv Bro</p>
        </div>
    </div>
    <!-- Page not found want on moble -->
</body>
<script>
    $(document).ready(function(){
        $('#signinForm').on('submit',function(e){
            e.preventDefault();

            let nameoremail = $('#nameoremail').val();
            let password = $('#password').val();

            console.log(nameoremail,password);

            // syntax ajax
            $.ajax({
                url:'index.php?page=signin',
                method:'POST',
                data:{   
                    func:'login',
                    nameoremail:nameoremail,
                    pass:password,
                },
                success: function(res){
                    if (res) {
                        window.location.href = 'index.php?page=homepage'; 
                    } else {
                        console.log('Error: ' + res);
                    }
                },
                error:function(res){
                    console.log(res);
                }
            })

            $('#nameoremail').val('');
            $('#password').val('')
        })
    })
</script>
</html>