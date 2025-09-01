<!-- section home -->
<input type="hidden" name="userid" id="userid" value="<?= $_SESSION['user']['user_id'] ?>">

<section>
    <h2 class="m-0 mt-3">Welcome back admin!</h2>
    <p class="text-secondary">You Can order Pizza now for customer</p>

    <div class="row m-0 p-0">
        <!-- card -->
        <div class="col-3 ps-0 pe-2">
            <div class="border px-4 py-2 d-flex align-items-center ">
                <h1 style="font-size: 58px;"
                    class="text-success m-0 border-end border-3 pe-3 border-secondary-subtle">
                    <i class="bi bi-person-fill-up"></i>
                </h1>
                <div class="ms-3">
                    <p class="m-0 text-secondary">Total order / month</p>
                    <h2>450</h2>
                </div>
            </div>
        </div>
        <div class="col-3 ps-0 pe-2">
            <div class="border px-4 py-2 d-flex align-items-center ">
                <h1 style="font-size: 58px;"
                    class="text-success m-0 border-end border-3 pe-3 border-secondary-subtle">
                    <i class="bi bi-fork-knife"></i>
                </h1>
                <div class="ms-3">
                    <p class="m-0 text-secondary">Total Items</p>
                    <h2>450</h2>
                </div>
            </div>
        </div>
        <div class="col-3 ps-0 pe-2">
            <div class="border px-4 py-2 d-flex align-items-center ">
                <h1 style="font-size: 58px;"
                    class="text-success m-0 border-end border-3 pe-3 border-secondary-subtle">
                    <i class="bi bi-people-fill"></i>
                </h1>
                <div class="ms-3">
                    <p class="m-0 text-secondary">Total Customers</p>
                    <h2>12</h2>
                </div>
            </div>
        </div>
        <div class="col-3 ps-0 pe-2">
            <div class="border px-4 py-2 d-flex align-items-center ">
                <h1 style="font-size: 58px;"
                    class="text-success m-0 border-end border-3 pe-3 border-secondary-subtle">
                    <i class="bi bi-person-fill-gear"></i>
                </h1>
                <div class="ms-3">
                    <p class="m-0 text-secondary">Total Users</p>
                    <h2>150</h2>
                </div>
            </div>
        </div>
        
        <!-- card -->
        
    </div>

    <!-- order content -->
    <div class="pe-2">       
        <div class="row m-0 p-0">
            <div class="col-7 py-3 px-0 pe-3">

                <!-- search -->
                <div class="d-flex justify-content-between">
                    <h4 class="m-0 text-secondary">Order now ⬇️</h4>
                    <form action="" class="col-5 mb-2 d-flex border rounded-3">
                        <input type="text" name="" id="" class="form-control shadow-none border-0" placeholder="Search items...">
                        <button class="btn border-0">
                            <i class="bi bi-search"></i>
                        </button>
                    </form>
                </div>

                <div class="overflow-auto" style="height:380px;">
                    <table class="table table-striped border">
                        <thead class="sticky-top">
                            <tr>
                                <td class="bg-success text-light col-2 text-center">No<sup>o</sup></td>
                                <td class="bg-success text-light">Items </td>
                            </tr>
                        </thead>
                        <tbody id="tb">
                            <!-- Data load -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-5 py-3">
                <div class="border p-3">
                    <div class="text-center">
                        <h3 class="text-decoration-underline">Order Cart</h3>
                    </div>
                    <div style="height: 220px;" class="overflow-auto">
                        <table class="table">
                            <thead class="sticky-top">
                                <tr>
                                    <td class="text-secondary">#</td>
                                    <td class="text-secondary">Item</td>
                                    <td class="text-secondary">Size</td>
                                    <td class="text-secondary">Qty</td>
                                    <td class="text-secondary">Subtotal</td>
                                </tr>
                            </thead>
                            <tbody id="cartTable">
                                <!-- Cart data -->
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-secondary">
                            <p class="m-0 fs-5">Tax: 10%</p>
                            <p class="m-0 fs-5">Total: <span class="fw-bold">$4.50</span></p>
                        </div>
                        <div>
                        <button class="text-end btn btn-success">
                            Process Order
                        </button>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
    <!-- order content -->
     
</section>
<!-- section home -->

<script>
    $(document).ready(function(e){

        let sizeOptions = "";

        function getItem(){
            $.ajax({
                url:'index.php?page=homepage',
                method:'post',
                data:{
                    func: 'getItem',
                    userid: $('#userid').val()
                },
                success: function(echo){
                    $('#tb').html(echo);
                }
            })
        }
        
        function getSize(){
            $.ajax({
                url:'index.php?page=homepage',
                method:'post',
                data:{
                    func: 'getSize',
                },
                success: function(echo){
                    sizeOptions = echo;
                }
            })
        }
        getSize();
        getItem();

        let cart = []; // cart array
     
        // Add to cart
        $(document).on('click','.btn-order',function(){

            const itemid = $(this).data('id');
            const name = $(this).data('name');

            const sizeId = parseInt($('#size option:selected').data('id') || 0);
            const price = parseFloat($('#size option:selected').data('price') || 0);

            // check if item with the same id AND size exists
            let exists = cart.find(item => item.itemid === itemid);
            if(exists){
                alert(`Item with this size already in cart ✅`);
                return;
            }

            let qty = 0; // default quantity
            let tax = 0;
            let subtotal = price * qty;

            // push item to cart array
            cart.push({ itemid, name, sizeId, qty, tax, subtotal });

            // build table row
            let row = `
                <tr class="align-middle" data-itemid="${itemid}" data-sizeid="${sizeId}">
                    <td>${itemid}</td>
                    <td>${name}</td>
                    <td class="col-3">
                        <select class="form-select shadow-none border cart-size">
                            ${sizeOptions}
                        </select>
                    </td>
                    <td class="col-2">
                        <input min="1" type="number" value="${qty}" class="form-control shadow-none border cart-qty">
                    </td>
                    <td class="item-total">$${subtotal.toFixed(2)}</td>
                </tr>
            `;

            $('#cartTable').append(row);
            console.table(cart);
        });

        // Update array when size or quantity changes
        $(document).on('change input','.cart-size, .cart-qty',function(){

            let row = $(this).closest('tr');
            const itemid = row.data('itemid');
            const oldsizeid = row.data('sizeid');

            const newsizeId = parseInt(row.find('.cart-size option:selected').data('id') || 0);
            const price = parseFloat(row.find('.cart-size option:selected').data('price') || 0);
            const qty = parseInt(row.find('.cart-qty').val() || 0);
            const subtotal = price * qty;

            // update table
            row.find('.item-total').text(`$${subtotal.toFixed(2)}`);
            row.data('sizeid', newsizeId);

            // update cart array
            const cartItemIndex = cart.findIndex(item => item.itemid === itemid && item.sizeId === oldsizeid);
            if(cartItemIndex !== -1){
                cart[cartItemIndex].sizeId = newsizeId;
                cart[cartItemIndex].qty = qty;
                cart[cartItemIndex].subtotal = subtotal;
            }

            console.table(cart);
        });

    })

</script>