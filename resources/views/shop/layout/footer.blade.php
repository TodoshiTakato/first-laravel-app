<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="inner-content">
                    <p>Copyright &copy; 2020 Sixteen Clothing Co., Ltd.

                        - Design: <a rel="nofollow noopener" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>



<!-- Bootstrap core JavaScript -->'
<script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>


<!-- Additional Scripts -->
<script src="{{ asset('assets/js/custom.js')}}"></script>
<script src="{{ asset('assets/js/owl.js')}}"></script>
<script src="{{ asset('assets/js/slick.js')}}"></script>
<script src="{{ asset('assets/js/isotope.js')}}"></script>
<script src="{{ asset('assets/js/accordions.js')}}"></script>

<script src="{{ asset('assets/js/alertify.min.js')}}"></script>


<script language = "text/javascript">
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t){                   //declaring the array outside of the
        if(! cleared[t.id]){                      // function makes it static and global
            cleared[t.id] = 1;  // you could use true and false, but that's more typing
            t.value='';         // with more chance of typos
            t.style.color='#fff';
        }
    }

    $(document).ready(function () {
        cartload();

        $(document).on('click', '#add_to_cart_btn', function(event) {
                event.preventDefault();
                $.ajaxSetup(
                    {
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    }
                );

                let add_to_cart_btn = $(this);
                let product_id = add_to_cart_btn.closest('#product_data').find('#product_id').val();

                $.ajax(
                    {
                        url: "/shop/products/"+product_id,
                        method: "POST",

                        success: function (response) {
                            cartload();
                            let value = response; //Single Data Viewing

                            alertify.set('notifier','position','top-right');
                            alertify.success(response.status);

                            let buttons = add_to_cart_btn.closest('.buttons');
                            // let buttons_content = buttons.val();
                            buttons.html('');
                            buttons.append(
                                $(
                                    '<div class="d-flex justify-content-between item">' +
                                        '<button class="btn btn-primary btn-vsm disabled"> ' +
                                            '<i class="fas fa-shopping-cart fa-1x"></i>' +
                                            'Уже в корзине(<div id="qty" class="d-inline">' + value['item_quantity'] + ' штук</div>)' +
                                        '</button>' +
                                        '<div id="product_data">' +
                                            '<input type="hidden" id="product_id" value="' + product_id +'">' +
                                            '<button id="add_another_one_btn" class="btn btn-success btn-vsm">' +
                                                '<i class="fas fa-plus-square"></i>' +
                                            '</button>' +
                                        '</div>' +
                                        '<div id="product_data">' +
                                            '<input type="hidden" id="product_id" value="' + product_id +'">' +
                                            '<button id="subtract_one_from_cart_btn" class="btn btn-danger btn-vsm">' +
                                                '<i class="fas fa-minus-square"></i>' +
                                            '</button>' +
                                        '</div>' +
                                        '<div id="product_data">' +
                                            '<input type="hidden" id="product_id" value="' + product_id +'">' +
                                            '<button id="remove_from_cart_btn" class="btn btn-danger btn-vsm">' +
                                                '<i class="fas fa-shopping-cart fa-1x"></i>' +
                                            '</button>' +
                                        '</div>' +
                                    '</div>'
                                )
                            );
                        },
                    }
                );

            }
        );

        $(document).on('click', '#remove_from_cart_btn', function(event) {
                event.preventDefault();
                $.ajaxSetup(
                    {
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    }
                );
                let remove_from_cart_btn = $(this);
                let product_id = $(this).closest('#product_data').find('#product_id').val();
                $.ajax(
                    {
                        url: "/shop/products/"+product_id,
                        method: "DELETE",

                        success: function (response) {
                            cartload();

                            alertify.set('notifier','position','top-right');
                            alertify.success(response.status);

                            let buttons = remove_from_cart_btn.closest('.buttons');
                            buttons.html('');
                            buttons.append(
                                $('<div id="product_data">' +
                                      '<input type="hidden" id="product_id" value="' + product_id +'">' +
                                      '<button id="add_to_cart_btn" class="btn btn-success">' +
                                          '<i class="fas fa-cart-plus fa-1x"></i> Добавить в корзину' +
                                      '</button>' +
                                  '</div>'
                                )
                            );
                        },
                    }
                );
            }
        );

        $(document).on('click', '#add_another_one_btn', function(event) {
                event.preventDefault();
                $.ajaxSetup(
                    {
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    }
                );
                let add_another_one_btn = $(this);
                let product_id = $(this).closest('#product_data').find('#product_id').val();
                $.ajax(
                    {
                        url: "/shop/products/"+product_id,
                        method: "POST",

                        success: function (response) {
                            cartload();

                            alertify.set('notifier','position','top-right');
                            alertify.success(response.status);

                            // let value = jQuery.parseJSON(response); //Single Data Viewing
                            let value = response; //Single Data Viewing

                            let item_qty = add_another_one_btn.closest('.item').find('#qty');
                            item_qty.html(value['item_quantity']+' штук');
                        },
                    }
                );
            }
        );

        $(document).on('click', '#subtract_one_from_cart_btn', function(event) {
                event.preventDefault();
                $.ajaxSetup(
                    {
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    }
                );
                let subtract_one_from_cart_btn = $(this);
                let product_id = $(this).closest('#product_data').find('#product_id').val();
                $.ajax(
                    {
                        url: "/shop/products/"+product_id,
                        method: "PUT",

                        success: function (response) {
                            cartload();

                            alertify.set('notifier','position','top-right');
                            alertify.success(response.status);

                            // let value = jQuery.parseJSON(response); //Single Data Viewing
                            let value = response; //Single Data Viewing

                            let buttons = subtract_one_from_cart_btn.closest('.buttons');
                            let item_qty = subtract_one_from_cart_btn.closest('.item').find('#qty');
                            if(value['delete']) {
                                buttons.html('');
                                buttons.append(
                                    $(
                                        '<div id="product_data">' +
                                        '<input type="hidden" id="product_id" value="' + product_id +'">' +
                                        '<button id="add_to_cart_btn" class="btn btn-success">' +
                                        '<i class="fas fa-cart-plus fa-1x"></i> Добавить в корзину' +
                                        '</button>' +
                                        '</div>'
                                    )
                                );
                            }
                            else {
                                item_qty.html(value['item_quantity']+' штук');
                            }
                        },
                    }
                );
            }
        );

        $(document).on('click', '.clear_cart', function(event) {
            event.preventDefault();
            $.ajax({
                url: '{{route("shop.clear_cart")}}',
                type: 'GET',
                success: function (response) {
                    window.location.reload();
                }
            });
        });

        function cartload()
        {
            $.ajaxSetup(
                {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                }
            );

            $.ajax(
                {
                    url: "{{route('shop.load_cart_data')}}",
                    method: "GET",
                    success: function (response) {
                        let counter = $('.basket-item-count');
                        counter.html('');
                        var value = jQuery.parseJSON(response); //Single Data Viewing
                        counter.append($('<span class="badge badge-pill badge-danger">('+ value['totalcart'] +')</span>'));
                    }
                }
            );
        }
    });
</script>
