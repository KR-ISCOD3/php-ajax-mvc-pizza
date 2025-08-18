 <!-- section size -->
<section class="border-top">

    <div class="d-flex justify-content-between align-items-center">
        
        <div>
            <h2 class="m-0 mt-3">Size Overview</h2>
            <p class="text-secondary">You can create your own category now</p>
        </div>

        <div>
            <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalsize">
                Add Size +
            </button>
        </div>
        
    </div>

    <div class="border">
        <table class="table">
            <thead>
                <tr>
                    <td class="text-secondary">#ID</td>
                    <td class="text-secondary">Size</td>
                    <td class="text-secondary">Price</td>
                    <td class="text-secondary">Create at</td>
                    <td class="text-secondary text-center">Action</td>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($sizes as $s){
                        $id = $s['id'];
                        $size = $s['size'];
                        $price = $s['price'];

                        echo <<<HTML
                                <tr class="align-middle">
                                    <td>$id</td>
                                    <td>$size</td>
                                    <td>$$price</td>
                                    <td>
                                        <span class="bg-secondary-subtle text-secondary px-3 rounded-3">2025-07-31</span>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modaleditsize">
                                            <i class="bi bi-vector-pen text-light"></i>
                                        </button>

                                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modaldeletesize">
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>
                                    </td>
                                </tr>
                        HTML;
                    }
                ?>

                <tr class="align-middle">
                    <td>1</td>
                    <td>Small</td>
                    <td>$1.00</td>
                    <td>
                        <span class="bg-secondary-subtle text-secondary px-3 rounded-3">2025-07-31</span>
                    </td>
                    <td class="text-center">
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modaleditsize">
                            <i class="bi bi-vector-pen text-light"></i>
                        </button>

                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modaldeletesize">
                            <i class="bi bi-trash3-fill"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- modal add size -->
    <div class="modal fade" id="modalsize" >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Add Size</h1>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="addForm">
                        <div class="d-flex mb-2">
                            <div class="col-6 pe-2">
                                <label for="">Size</label>
                                <input class="form-control shadow-none border" type="text" placeholder="Enter Size" name="size" id="size">
                            </div>
                            <div class="col-6">
                                <label for="">Price</label>
                                <input class="form-control shadow-none border"  type="text" placeholder="Enter Price" name="price" id="price">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Add Size +</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    

    <!-- modal edit size -->
    <div class="modal fade" id="modaleditsize" >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Update Size</h1>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="d-flex mb-2">
                            <div class="col-6 pe-2">
                                <label for="">Size</label>
                                <input class="form-control shadow-none border" type="text" placeholder="Enter Size" name="size" id="size">
                            </div>
                            <div class="col-6">
                                <label for="">Price</label>
                                <input class="form-control shadow-none border"  type="text" placeholder="Enter Price" name="price" id="price">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-warning">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- modal delete size -->
    <div class="modal fade" id="modaldeletesize" >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Delete Size</h1>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        
                        <p class="text-center fs-4">Are u sur u want to <span class="text-danger">delete</span>?🤔</p>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>

<script>
    $(document).ready(function(){
        $('#addForm').on('submit',function(e){
            e.preventDefault();

            let size = $('#size').val();
            let price = $('#price').val();

            // console.log(size,price);
            
            $.ajax({
                url: 'index.php?page=sizepage',
                method: 'post',
                data: {
                    func: 'create_size',
                    size: size,
                    price: price
                },
                success: function(res){
                    $('#modalsize').modal('hide');

                    location.reload();
                    // if(res){
                    //     alert(res);
                    // }
                }
            });

            $('#size').val('');
            $('#price').val('');


            
        })
            
    })
</script>