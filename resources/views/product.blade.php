<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bootstrap demo</title>
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>

<body>


    <div class="container mt-5">
        <div class="row">
            <div class="card">


             <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">

                    <form action="" method="POST"  id="addProduct">
                        @csrf

                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body">

                                    <div class="errormessage ml-2">

                                    </div>

                                    <label class="my-2">Product Name</label>
                                    <input type="text" class="form-control"  id="name">

                                    <label class="my-2">Product Price</label>
                                    <input type="text" class="form-control" id="price">

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary a_product">save Product</button>
                                </div>
                            </div>

                        </div>
                    </form>
               </div>
        <!-- Modal -->


        <div class="card-header d-flex " style="display:flex;align-items:center;justify-content:space-between;">
            <h3>All Products</h3>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Product</button>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Sr.no</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                  @foreach ($products as $key=>$product)
                      <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $product->name }}</td>
                          <td> {{ $product->price }}</td>
                          <td>
                              <a data-bs-toggle="modal" data-bs-target="#updatemodal" data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-price="{{ $product->price }}" class="btn btn-sm btn-warning update_product_form"><i class="las la-edit"></i></a>
                              <a href="" class="btn btn-sm btn-danger delete_product "  data-id={{ $product->id }} ><i class="las la-trash"></i></a>
                          </td>
                      </tr>
                  @endforeach
                </tbody>
            </table>
            {!! $products->links() !!}
        </div>
    </div>
    </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


    @include('modal.update_modal')
    @include('js.product_js')

</body>

</html>
