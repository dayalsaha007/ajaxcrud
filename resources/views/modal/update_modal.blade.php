<!-- Modal -->
<div class="modal fade" id="updatemodal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <form action="" method="POST"  id="updateProduct">
        @csrf

        <input type="hidden" name="up_id" id="up_id">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updatemodal">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <div class="errormessage ml-2">

                    </div>

                    <label class="my-2">Product Name</label>
                    <input type="text" class="form-control" name="up_name"  id="up_name">

                    <label class="my-2">Product Price</label>
                    <input type="text" class="form-control" name="up_price" id="up_price">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary up_product">update Product</button>
                </div>
            </div>

        </div>
    </form>
</div>
<!-- Modal -->
