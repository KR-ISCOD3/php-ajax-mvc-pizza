<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Account</title>

    <!-- Link CSS -->
    <link rel="stylesheet" href="app/assets/style/style.css">
    <!-- Link CSS -->

    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <!-- Link Bootstrap -->

    <!-- link jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- link jquery -->
</head>
<body>
    <div class="container-fluid d-none d-lg-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="col-4 px-5 py-4 rounded-4 shadow-lg">
            <div class="text-center">
                <img src="app/assets/image/logo.png" alt="" width="120px">
                <h2 class="mb-0">Pizza. <span class="text-warning">KH</span> </h2>
                <p class="text-secondary">Please field the form to create account.</p>
            </div>
           <form action="">
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
</html>