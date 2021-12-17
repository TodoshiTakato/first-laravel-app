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


<script language = "text/javascript">
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t){                   //declaring the array outside of the
        if(! cleared[t.id]){                      // function makes it static and global
            cleared[t.id] = 1;  // you could use true and false, but that's more typing
            t.value='';         // with more chance of typos
            t.style.color='#fff';
        }
    }
</script>

{{--<script type="text/javascript">--}}
{{--    function getCookie(name) {--}}
{{--        var cookieValue = null;--}}
{{--        if (document.cookie && document.cookie !== '') {--}}
{{--            var cookies = document.cookie.split(';');--}}
{{--            for (var i = 0; i < cookies.length; i++) {--}}
{{--                var cookie = cookies[i].trim();--}}
{{--                // Does this cookie string begin with the name we want?--}}
{{--                if (cookie.substring(0, name.length + 1) === (name + '=')) {--}}
{{--                    cookieValue = decodeURIComponent(cookie.substring(name.length + 1));--}}
{{--                    break;--}}
{{--                }--}}
{{--            }--}}
{{--        }--}}
{{--        return cookieValue;--}}
{{--    }--}}

{{--    function uuidv4() {--}}
{{--        return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {--}}
{{--            var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);--}}
{{--            return v.toString(16);--}}
{{--        });--}}
{{--    }--}}

{{--    let device = getCookie('device');--}}
{{--    if (device == null || device == undefined){--}}
{{--        device = uuidv4();--}}
{{--    }--}}

{{--    let today = new Date();--}}
{{--    today.setFullYear(today.getFullYear()+1);--}}
{{--    document.cookie ='device=' + device + ";domain=;path=/;max-age=31536000;expires=today.toUTCString();samesite=strict"--}}
{{--    // Cookie.set('name', value);--}}
{{--</script>--}}

{{--<script type="text/javascript">--}}
{{--    $(document).ready(function () {--}}
{{--        $('#add-to-cart-btn').click(function (e) {--}}
{{--            e.preventDefault();--}}

{{--            $.ajaxSetup({--}}
{{--                headers: {--}}
{{--                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                }--}}
{{--            });--}}

{{--            var product_id = $(this).closest('#product_data').find('#product_id').val();--}}
{{--            // var quantity = $(this).closest('#product_data').find('#qty-input').val();--}}

{{--            $.ajax({--}}
{{--                url: "{{route('shop.add_to_cart')}}/"+product_id,--}}
{{--                method: "POST",--}}
{{--                // data: {--}}
{{--                //     'quantity': quantity,--}}
{{--                //     'product_id': product_id,--}}
{{--                // },--}}
{{--                // success: function (response) {--}}
{{--                //     alertify.set('notifier', 'position', 'top-right');--}}
{{--                //     alertify.success(response.status);--}}
{{--                // },--}}
{{--            });--}}
{{--        });--}}
{{--    });</script>--}}
