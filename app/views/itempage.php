<!-- section item -->
<section class="border-top">
    <div class="d-flex justify-content-between align-items-center">
        
        <div>
            <h2 class="m-0 mt-3">Item Overview</h2>
            <p class="text-secondary">You can create your own category now</p>
        </div>

        <div>
            <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalitem">
                Add item +
            </button>
        </div>

    </div>

    <div class="border">
        <table class="table">
            <thead>
                <tr>
                    <td class="text-secondary">#ID</td>
                    <td class="text-secondary">Image</td>
                    <td class="text-secondary">Name</td>
                    <td class="text-secondary">User</td>
                    <td class="text-secondary">Create at</td>
                    <td class="text-secondary text-center">Action</td>
                </tr>
            </thead>
            <tbody>
                <tr class="align-middle">
                    <td>1</td>
                    <td>
                        <div style="width: 40px;height: 40px;" class="overflow-hidden bg-success rounded-3">
                            <img src="" alt="" class="w-100 h-100 object-fit-cover">
                        </div>
                    </td>
                    <td>
                        <span class="text-success">Pizza Lomdab ISO 2025</span>
                    </td>
                    <td>
                        <span class="text-secondary">Add BY: <span class="text-dark">Tea K'pa</span></span>
                    </td>
                    <td>
                        <span class="bg-secondary-subtle text-secondary px-3 rounded-3">2025-07-31</span>
                    </td>
                    <td class="text-center">
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalupitem">
                            <i class="bi bi-vector-pen text-light"></i>
                        </button>
                        
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modaldeleteitem">
                            <i class="bi bi-trash3-fill"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- modal add item -->
    <div class="modal fade" id="modalitem" >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Add Item</h1>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        
                        <div>
                            <label for="">Image</label>
                            <div id="previewimage" class="w-100 bg-secondary overflow-hidden border" style="height: 250px;">
                                <img src="app/assets/image/placeholderpizza.png" style="height: 100%; width: auto;" class="w-100 h-100 object-fit-cover">
                            </div>
                            <input required type="file" name="image" id="image" class="form-control shadow-none border">
                        </div>
                        <div class="my-2">
                            <label for="">Item Name</label>
                            <input required class="form-control shadow-none border"  type="text" placeholder="Enter Name" name="price" id="price">
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Add Item +</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- modal update item -->
    <div class="modal fade" id="modalupitem" >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Update Item</h1>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        
                        <div>
                            <label for="">Image</label>
                            <div id="previewimage" class="w-100 bg-secondary overflow-hidden border" style="height: 250px;">
                                <img src="app/assets/image/placeholderpizza.png" style="height: 100%; width: auto;" class="w-100 h-100 object-fit-cover">
                            </div>
                            <input required type="file" name="image" id="image" class="form-control shadow-none border">
                        </div>
                        <div class="my-2">
                            <label for="">Item Name</label>
                            <input required class="form-control shadow-none border"  type="text" placeholder="Enter Name" name="price" id="price">
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-warning">Update Items</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- modal delete size -->
    <div class="modal fade" id="modaldeleteitem" >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Delete Item</h1>
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
<!-- section item -->