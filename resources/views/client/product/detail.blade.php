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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    @toastr_css
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
                <a class="Nav_item-link">
                    Giỏ hàng
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
    <div class="detail">
        <div class="about_title">
            <h2>SẢN PHẨM</h2>
            <h3>TRANG CHỦ /CHI TIẾT SẢN PHẨM</h3>
        </div>
        <div class="grid wide box-detail">
            <div style="font-size:16px ; color: black;"> TRANG CHỦ/NỘI THẤT/BÀN</div>
            <div class="row detail-r">
                <div class="col c-6 detail-col">
                    <img src="{{ $product->image->path }}" alt="" class="detail-img">
                    <div class="feature">
                        <p>Tính năng nổi bật:</p>
                        <ul class="feature-list">
                            <li class="feature-item">
                                <?php echo $product->description; ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col c-6 detail-col1">
                    <div class="Purchase_head">
                        <h2>{{ $product->name }}</h2>
                        <div class="Purchase_head-info">
                            <span>
                                {{ $product->category->name }}
                            </span>
                        </div>
                    </div>
                    <div class="Purchase_price">
                        <p>GIÁ BÁN</p>
                        <span class="current_price">{{ number_format($product->price, 0, '', '.') }}đ</span>
                    </div>

                    <div class="Purchase-btn">
                        <button class="btn btn_buy" id="buy" data-id="{{ $product->id }}"
                            data-name="{{ $product->name }}" data-img="{{ $product->image->path }}"
                            data-price="{{ number_format($product->price, 0, '', '.') }}">
                            <p>MUA NGAY</p>
                            (Giao hàng tận nơi)
                        </button>
                        <button class="btn btn_call">
                            <p><i class="fa-solid fa-phone"></i> Gọi lại cho tôi <br></p>
                            (043249234)
                        </button>
                    </div>
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
@jquery
@toastr_js
@toastr_render
<script>
    var products = {!! json_encode($product->toArray()) !!}
    $(document).ready(function() {
        var cart = [];
        if (JSON.parse(localStorage.getItem('cart')) == null) {
            localStorage.cart = JSON.stringify(cart);
        } else {
            cart = JSON.parse(localStorage.cart);
        }

        function save() {
            localStorage.setItem('cart', JSON.stringify(cart));
        }

        function removeProduct() {
            var id = parseInt($(this).data('id'));
            for (j = 0; j < cart.length; j++) {
                if (cart[j].id == id) {
                    if (confirm('Do you want to delete this product ?')) {
                        cart.splice(j, 1);
                        save();
                        loadData(cart);
                    }
                }
            }
        }


        function count() {
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
        }

        count();

        $('#buy').click(function() {
            cart = JSON.parse(localStorage.cart);
            var data = {
                'id': $(this).data('id'),
                'name': $(this).data('name'),
                'img': $(this).data('img'),
                'price': $(this).data('price'),
                'quantity': 1,
            }
            var product = cart.find(element => {
                if (element.id === data.id) {
                    return true;
                }
                return false;
            });
            if (cart.length == 0) {
                cart.push(data);
                localStorage.cart = JSON.stringify(cart);
                toastr.success('Add to cart success');
                count();
            } else {
                if (product) {
                    for (let i = 0; i < cart.length; i++) {
                        if (cart[i].id == data.id) {
                            if (cart[i].quantity >= products.quantity) {
                                toastr.error('Out of order');
                            } else {
                                data.quantity = cart[i].quantity + 1;
                                cart[i] = data;
                                localStorage.cart = JSON.stringify(cart);
                                toastr.success('Add to cart success');
                                count();
                            }
                        }
                    }
                } else {
                    cart.push(data);
                    localStorage.cart = JSON.stringify(cart);
                    toastr.success('Add to cart success');
                    count();
                }
            }
        })

    })
</script>

</html>
