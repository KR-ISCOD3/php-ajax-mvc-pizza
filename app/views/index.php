<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- link path -->
    <?php include 'app/views/includes/links.php' ?>
    <!-- link path -->

</head>
<body class="font-fira">


    <div class="container-fluid p-0 d-none d-lg-flex ">
        
        <!-- sidebar -->
        <aside style="height: 100vh;" class="col-2 bg-success sticky-top">

            <!-- Logo -->
            <div class="w-100 text-center py-2 border-3ottom border-secondary-subtle mb-3">
                <img src="app/assets/image/logo.png" alt="No Image" class="w-25">
                <h2 class="text-light mb-0">Pizza. <span class="text-warning">KH</span> </h2>
                <p class="text-light">Yummy with me</p>
            </div>
            <!-- Logo -->

            <!-- Menu -->
            <ul class="list-unstyled ">
                <a href="index.php" class="text-light text-decoration-none">
                    <li class="ps-5 py-2 fs-5 hoverbg">
                        <i class="bi bi-house-door-fill"></i>
                        Home
                    </li>
                </a>
                <a href="index.php?page=sizepage" class="text-light text-decoration-none ">
                    <li class="ps-5 py-2 fs-5 hoverbg">
                        <i class="bi bi-bookmark-plus-fill"></i>
                        Size 
                    </li>
                </a>
                <a href="index.php?page=itempage" class="text-light text-decoration-none ">
                    <li class="ps-5 py-2 fs-5 hoverbg">
                        <i class="bi bi-fork-knife"></i>
                        Items
                    </li>
                </a>
                
            </ul>
            <div class="px-2 position-absolute bottom-0 w-100 mb-2">
                <button class="btn btn-danger w-100">
                    Logout
                </button>
            </div>
            <!-- Menu -->
        </aside>
        <!-- sidebar -->
        
        <!-- main content -->
        <main class="col-10 px-4 py-2">
            <header class="d-flex justify-content-between text-secondary border-bottom">
                <p class="m-0 mb-1">🍕 Our pizza is not fake like Thailand </p>
                <p class="m-0 mb-1">Mr. Tea K'pa</p>
            </header>
            
            <?php include $views ?>
           
        </main>
        <!-- main content -->
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
<script src="app/assets/js/preview.js"></script>
</html>