<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

</script>


<script>

    $(document).ready(function(){
        $(document).on('click','.a_product', function(e){
            e.preventDefault();
            let name = $('#name').val();
            let price = $('#price').val();

            $.ajax({
                type:"POST",
                url:"{{ route('add_product') }}",
                data:{ name:name, price:price },
                success:function(res){

                    if(res.status == 'success'){
                        $('#exampleModal').modal('hide');
                        $('#addProduct')[0].reset();
                        $('.table').load(location.href+' .table');
                    }

                }, error:function(err){
                    let error = err.responseJSON;
                    $('.errormessage').empty('');
                    $.each(error.errors, function(key, value){

                        $('.errormessage').append('<span class="text-danger" >'+value+'</span>'+'<br>');

                    });
                }
            });

        });

    });

</script>

<script>

    $(document).ready(function(){
        $(document).on('click','.up_product', function(e){
            e.preventDefault();
            let up_id = $('#up_id').val();
            let up_name = $('#up_name').val();
            let up_price = $('#up_price').val();

            $.ajax({
                type:"POST",
                url:"{{ route('update_product') }}",
                data:{up_id:up_id, up_name:up_name, up_price:up_price},
                success:function(res){

                    if(res.status == 'success'){
                        $('#updatemodal').modal('hide');
                        $('#updateProduct')[0].reset();
                        $('.table').load(location.href+' .table');
                    }

                }, error:function(err){
                    let error = err.responseJSON;
                    $('.errormessage').empty('');
                    $.each(error.errors, function(key, value){

                        $('.errormessage').append('<span class="text-danger" >'+value+'</span>'+'<br>');

                    });
                }
            });

        });

    });

</script>

<script>
    $(document).ready(function(){
        $(document).on('click','.delete_product', function(e){
            e.preventDefault();
            let id = $(this).data('id');

            if(confirm('are you sure to delete product ??')){
                $.ajax({
                    type:"POST",
                    url:"{{ route('delete_product') }}",
                    data:{id:id},
                    success:function(res){

                        if(res.status == 'success'){
                            $('.table').load(location.href+' .table');
                        }

                    }
                });
            }

        });

    });
</script>

<script>
    $(document).ready(function(){
        $(document).on('click','.update_product_form',function(){

            let id = $(this).data('id');
            let name = $(this).data('name');
            let price = $(this).data('price');

            $('#up_id').val(id);
            $('#up_name').val(name);
            $('#up_price').val(price);

        })
    });
</script>
