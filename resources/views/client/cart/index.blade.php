<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/home_assets/style/grid.css">
    <link rel="stylesheet" href="/home_assets/style/base.css">
    <link rel="stylesheet" href="/home_assets/style/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Akshar:wght@300;400;500&family=Barlow:ital,wght@0,100;0,200;1,100&family=Poppins:ital,wght@0,200;0,300;1,100&family=Roboto:wght@100;300&family=Source+Sans+Pro:wght@200;300;400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="/home_assets/style/font/fontawesome-free-6.1.1-web/css/all.css">
    @toastr_css
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
</head>

<body>
    <div class="Nav">
        <img src="/home_assets/style/img/logo.png" alt="" class="Nav_logo">
        <ul class="Nav_List">
            <li class="Nav_item">
                <a href="{{ route('homepage') }}" class="Nav_item-link">Trang chủ</a>
            </li>
            <li class="Nav_item">
                <a href="" class="Nav_item-link">Sản Phẩm</a>
            </li>
            <li class="Nav_item">
                <a href="" class="Nav_item-link">Giới thiệu</a>
            </li>
            <li class="Nav_item">
                <a href="" class="Nav_item-link">Dự án</a>
            </li>
            <li class="Nav_item">
                <a href="" class="Nav_item-link">Tin tức</a>
            </li>
            <li class="Nav_item">
                <a href="{{ route('cart.index') }}" class="Nav_item-link">Giỏ hàng
                </a>
            </li>
            <li class="Nav_item">
                <a href="" class="Nav_item-link Nav_item-link--share">Liên hệ</a>
                <div class="Nav_item-share">
                    <img class="qr-share" src="/home_assets/style/img/qr.png" alt="">
                    <div class="img-mobile">
                        <img src="/home_assets/style/img/appstore.png" alt="" class="img-app">
                        <img src="/home_assets/style/img/gg.png" alt="" class="img-app">
                    </div>
                </div>
            </li>
            <li class="Nav_item">
                <a href="{{ route('cart.index') }}" class="Nav_item-link" id="cart-items">

                </a>
            </li>
        </ul>
    </div>
    <div class="cart">
        <div class="about_title">
            <h2>SẢN PHẨM</h2>
            <h3>TRANG CHỦ /GIỎ HÀNG</h3>
        </div>
        <div class="grid wide">
            <div class="row cart-r">
                <div class="col c-6 cart-col">
                    <h2 class="car-col--tiltle">
                        Giỏ hàng của bạn
                    </h2>
                    <form id="cart">

                    </form>

                    <div class="total">
                        <p class="text">TẠM TÍNH <br>
                            <span>(Chưa bao gồm phí vận chuyển)</span>
                        </p>
                        <p class="price" id="temp-price"></p>
                    </div>
                    <div class="total">
                        <p class="text">PHÍ VẬN CHUYỂN<br>

                        </p>
                        <p class="price">0 VND</p>
                    </div>
                    <div class="total">
                        <p class="text">TỔNG CỘNG<br>
                        </p>
                        <p class="price" id='total-price'></p>
                    </div>
                </div>
                <div class="col c-6 cart-col">
                    <h2 class="car-col--tiltle">
                        Thông tin khách hàng
                    </h2>
                    <form id="customer-form">
                        <input class="cart-input" type="text" name="full_name" placeholder="Họ & Tên">
                        <input class="cart-input" type="text" name="phone_number" placeholder="Số điện thoại">
                        <input class="cart-input" type="text" name="address" placeholder="Địa chỉ">
                        <input class="cart-input" type="text" name="promotion" placeholder="Mã Giảm Giá">
                        <input class="cart-input cart-input--l" type="text" name="description"
                            placeholder="Ghi chú thêm(Không bắt buộc)">
                    </form>
                    <h2 class="car-col--tiltle">
                        Chọn hình thức nhận hàng
                    </h2>
                    <span class="cart-options">
                        <input type="radio" id="home" name="type" value="0">
                        <label for="home">Nhận hàng tại nhà</label>
                    </span>
                    <span class="cart-options">
                        <input type="radio" id="store" name="type" value="1">
                        <label for="store">Đến siêu thị nhận hàng</label>
                    </span>
                    <button class="cart-btn" style="cursor: pointer" type="button" id="order">
                        <p>THANH TOÁN TẠI NHÀ</p>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="footer">
            <h1>
                LXC Architects ®
            </h1>
            <div class="footer-box">

                <div class="footer-box1">
                    <h2>Trụ sở chính
                    </h2>
                    <a href="" class="footer-box--link">
                        <i class="fa-solid fa-map-location-dot"></i>
                        373/226 Lý Thường Kiệt, Phường 8, Quận Tân Bình, Tp.HCM</a>
                    <a href="" class="footer-box--link">
                        <i class="fa-solid fa-phone-volume"></i>
                        1900 636 648
                    </a>
                    <a href="" class="footer-box--link">
                        <i class="fa-solid fa-envelope-open-text"></i>
                        lexuanchau@dtu.edu.vn
                    </a>
                    <a href="" class="footer-box--link">
                        <i class="fa-brands fa-skype"></i>
                        lexuanchau
                    </a>
                </div>
                <div class="footer-box1">
                    <h2>Chi nhánh Hà Nội
                    </h2>
                    <a href="" class="footer-box--link">
                        <i class="fa-solid fa-map-location-dot"></i>
                        373/226 Lý Thường Kiệt, Phường 8, Quận Tân Bình, Tp.HCM</a>
                    <a href="" class="footer-box--link">
                        <i class="fa-solid fa-phone-volume"></i>
                        1900 636 648
                    </a>
                    <a href="" class="footer-box--link">
                        <i class="fa-solid fa-envelope-open-text"></i>
                        lexuanchau@dtu.edu.vn
                    </a>
                    <a href="" class="footer-box--link">
                        <i class="fa-brands fa-skype"></i>
                        lexuanchau
                    </a>
                </div>
                <div class="footer-box1">
                    <h2>Chi nhánh Hà Nội
                    </h2>
                    <p>
                        Nhập email của bạn và chúng tôi sẽ cập nhật cho bạn tin tức và cập nhật!
                    </p>
                    <input type="text" class="footer-box1-input" size="40" placeholder="Nhập họ và tên">
                    <input type="text" class="footer-box1-input" size="40" placeholder="Email">
                </div>
            </div>
            <button>
                GỬI
            </button>
        </div>

        <div class="footer2">
            © Bản quyền thuộc về . Thiết kế
            <i class="fa-solid fa-compass-drafting"></i>
            Lê Xuân Châu
        </div>

    </footer>
</body>

@yield('js')
@jquery
@toastr_js
@toastr_render
<script>
    var cart = [];
    $(document).ready(function() {
        if (JSON.parse(localStorage.getItem('cart')) == null) {
            localStorage.cart = JSON.stringify(cart);
        } else {
            cart = JSON.parse(localStorage.cart);
        }
        var myquantity = 0;
        if (cart.length != 0) {
            $.each(cart, function(k, v) {
                myquantity += v.quantity;
            });
            var html = ` <span class="fa-stack fa-1x has-badge" data-count="` + myquantity + `" id="cart-num">
                        <i class="fa fa-stack-1x"></i>
                        <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
                    </span>`;
            $('#cart-items').html(html);
        }

    })
</script>
<script>
    $(document).ready(function() {
        var html = '';
        var pattern = '.';
        var price = 0;
        $.each(cart, function(k, v) {
            price += parseInt(v.price.replaceAll('.', '')) * v.quantity;
            html += `
                 <div class="car-col--info">
                    <img src="` + v.img + `" alt="">
                    <div class="info-s">
                        <input type="hidden" name="id[]" value="` + v.id + `">
                        <input type="hidden" name="quantity[]" value="` + v.quantity + `">
                        <input type="hidden" name="price[]" value="` + v.price + `">
                        <p class="name">
                            ` + v.name + ` * ` + v.quantity + `
                        </p>
                    <span class="c-price">
                        ` + v.price + ` VND
                    </span>
                    <p class="remove" >
                        <i class="fa-solid fa-delete-left "></i>
                        Xóa
                    </p>
                </div>
            </div>`;
        })
        price = price.toLocaleString('it-IT', {
            style: 'currency',
            currency: 'VND'
        });
        $('#temp-price').text(price);
        $('#total-price').text(price);
        $('#cart').html(html);
    })
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    function getFormData(form) {
        var unindexed_array = form.serializeArray();
        var indexed_array = {};
        $.map(unindexed_array, function(n, i) {
            indexed_array[n["name"]] = n["value"];
        });

        return indexed_array;
    }
    $(document).ready(function() {
        var fd = {};
        var id = [];
        $("form#cart input[name='id[]']").each(function() {
            id.push($(this).val());
        });
        var price = [];
        $("form#cart input[name='price[]']").each(function() {
            price.push($(this).val().replaceAll('.', ''));
        });
        var quantity = [];
        $("form#cart input[name='quantity[]']").each(function() {
            quantity.push($(this).val());
        });
        fd.product = {
            'id': id,
            'price': price,
            'quantity': quantity,
        }
        fd.payment = {
            'type': $("input[name='type']").val(),
            'total_price': $('#total-price').text(),
        }
        $('#order').click(function() {
            var customer = getFormData($('#customer-form'));
            fd.customer = customer;
            $.ajax({
                url: "{{ route('order.store') }}",
                type: 'POST',
                data: fd,
                success: function(res) {
                    toastr.success(res.msg);
                    var cart = [];
                    localStorage.cart = JSON.stringify(cart);
                    setTimeout(() => {
                        window.location.href = res.href;
                    }, 2000);
                },
                error: function(res) {
                    toastr.error(res.msg);
                }
            })
        })
    })
</script>

</html>
