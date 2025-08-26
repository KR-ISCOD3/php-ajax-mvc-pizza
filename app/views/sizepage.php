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
            <tbody id="tb">
               
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
                    <form action="" id="upform">
                        <input type="hidden" name="id" id="upid">
                        <div class="d-flex mb-2">
                            <div class="col-6 pe-2">

                                <label for="">Size</label>
                                <input name="size" id="upsize" class="form-control shadow-none border" type="text" placeholder="Enter Size" >
                            </div>
                            <div class="col-6">
                                <label for="">Price</label>
                                <input name="price" id="upprice" class="form-control shadow-none border"  type="text" placeholder="Enter Price" >
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-warning">Update</button>
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

                    <form id="delForm">

                        <input type="hidden" name="delid" id="delid">
                        <p class="text-center fs-4">Are u sur u want to <span class="text-danger">delete</span>?🤔</p>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>

<script>
    $(document).ready(function(){

        function fetchData(){
            $.ajax({
                url: 'index.php?page=sizepage',
                method: 'post',
                data: {
                    func: 'fetchdata',
                },
                success: function(res){
                    // $('#tb').html(''); 
                    $('#tb').html(res);         
                }
            });
        }

        fetchData();


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

                   fetchData();
                    // if(res){
                    //     alert(res);
                    // }
                }
            });

            $('#size').val('');
            $('#price').val('');
            
        })      

        
        // delegated binding (works even after AJAX)
        $(document).on('click','.btn-edit',function(){

            var id = $(this).data("id");
            var size = $(this).data("size");
            var price = $(this).data("price");

            $('#upid').val(id);
            $('#upsize').val(size);
            $('#upprice').val(price);
        });


        // updarte
        $('#upform').on('submit',function(e){
            e.preventDefault();

            let id = $('#upid').val()
            let size = $('#upsize').val();
            let price = $('#upprice').val();

            // console.log(id,size,price);
           
             $.ajax({
                url: 'index.php?page=sizepage',
                method: 'post',
                data: {
                    func: 'update_size',
                    id: id,
                    size: size,
                    price: price
                },
                success: function(res){
                    $('#modaleditsize').modal('hide');

                   fetchData();
                    // if(res){
                    //     alert(res);
                    // }
                }
            });

            $('#upsize').val('');
            $('#upprice').val('');
        })      


        
        $(document).on('click','.btn-delete',function(){

            var id = $(this).data('id');

            $('#delid').val(id);        
        });


        $('#delForm').on('submit',function(e){

            e.preventDefault();

            let id = $('#delid').val();

            // alert(id);

            $.ajax({
                url:"index.php?page=sizepage",
                method: 'post',
                data:{
                    func:'delete_size',
                    id:id,
                },
                success: function(res){
                    $('#modaldeletesize').modal('hide');
                    res = res.trim();
                    if(res == 'success'){
                        alert("Delete Success");
                    }

                    fetchData();
                }
            })
        })
    })
</script>