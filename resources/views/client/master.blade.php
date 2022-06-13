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
    <title>Document</title>
</head>

<body>
    <div class="Nav">
        <img src="/home_assets/style/img/logo.png" alt="" class="Nav_logo">
        <ul class="Nav_List">
            <li class="Nav_item">
                <a href="" class="Nav_item-link">Trang chủ</a>
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
                <a href="/cart" class="Nav_item-link">Giỏ hàng </a>
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
    <div class="product">
        <div class="product">
            <div class="about_title">
                <h2>SẢN PHẨM</h2>
                <h3>TRANG CHỦ / SẢN PHẨM</h3>
            </div>
            <div class="grid wide">
                <div class="category">
                    <p>Danh Mục :</p>
                    <ul class="category-list" style="margin-top:40px">
                        @foreach ($categories as $category)
                            <li class="category-item">
                                <a href="{{ route('furniture.category.detail', $category->id) }}"
                                    class="category-link">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="grid wide">
                <div class="row product-row">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>

@yield('js')
@jquery
@toastr_js
@toastr_render
<script>
    $(document).ready(function() {
        var cart = [];
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

</html>
