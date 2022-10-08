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
                <a href="{{ route('homepage') }}" class="Nav_item-link">Trang chủ</a>
            </li>
            <li class="Nav_item">
                <a href="" class="Nav_item-link">Sản Phẩm</a>
            </li>
            <li class="Nav_item">
                <a href="/about-us" class="Nav_item-link">Giới thiệu</a>
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
    <div class="about">
        <div class="about_title">
            <h2>GIỚI THIỆU</h2>
            <h3>TRANG CHỦ / GIỚI THIỆU</h3>
        </div>
        <div class="about_info">
            <h2>
                Công ty thiết kế nội thất văn phòng MONA-architects
            </h2>
            <div class="box">
                <h3>
                    QUÁ TRÌNH HÌNH THÀNH VÀ PHÁT TRIỂN
                </h3>
                <div class="box_content">
                    <img src="./style/img/about1.jpg" alt="">
                    <div class="box_content-p">
                        <p>Năm 2006, MONA-architects được thành lập với sự sáng lập của 2 thành viên. Và văn phòng đầu
                            tiên của công ty được xây dựng tại TP. Hồ Chí Minh trong một khuôn viên nhỏ chỉ 10m2, bắt
                            đầu bằng thông điệp “Tất cả được tạo nên từ những điều cơ bản nhất”.</p>
                        <p>Ý tưởng đầu tiên của sáng lập viên là xây dựng một công ty thiết kế nội thất văn phòng tại
                            Việt Nam có sự tập trung chuyên sâu vào lĩnh vực thiết kế thi công nội thất văn phòng – nơi
                            đem đến cho khách hàng những trải nghiệm tuyệt vời về dịch vụ với một văn phòng sáng tạo
                            trong mức ngân sách hợp lý.</p>
                        <p>Với hơn 10 năm phát triển, MONA-architects trở thành đơn vị hàng đầu trong dịch vụ thiết kế
                            văn phòng tại Việt Nam thông qua việc nắm bắt được xu hướng của những mô hình văn phòng mới
                            trên thế giới. Thiết kế nội thất văn phòng của MONA-architects không chỉ đẹp, mà còn hỗ trợ
                            khách hàng trong việc gia tăng năng suất & hiệu quả của doanh nghiệp bằng cách phản ánh
                            chiến lược, văn hoá & đặc trưng kinh doanh của công ty trong thiết kế của mình.</p>
                        <p>Tính đến thời điểm hiện tại, MONA-architects đã kiến tạo hơn 600 văn phòng cho những tập đoàn
                            danh tiếng tại Việt Nam & hơn 90% khách hàng của MONA-architects là những công ty đa quốc
                            gia hàng đầu – họ là những doanh nghiệp luôn tìm kiếm một dịch vụ chuyên nghiệp với những ý
                            tưởng độc đáo & mới lạ.</p>
                    </div>
                </div>
            </div>
            <div class="box">
                <h3>
                    ĐỊNH HƯỚNG THIẾT KẾ THI CÔNG NỘI THẤT VĂN PHÒNG
                </h3>
                <div class="box_content">
                    <div class="box_content-p">
                        <p>Thông qua việc hiểu rõ những kỳ vọng trong kinh doanh của cấp điều hành, tìm tòi sự khác biệt
                            trong văn hoá và đặc trưng ngành nghề cũng như vị thế của từng khách hàng, không ngừng
                            nghiên cứu về những xu hướng văn phòng hiện đại và áp dụng những công nghệ mới trong không
                            gian làm việc, đưa ra những giải pháp tốt nhất giải quyết các vấn đề của khách hàng. </p>
                        <p>Tạo ra trải nghiệm làm việc mà khách hàng yêu thích thông qua sự chu đáo và tư vấn tận tình
                            cho nhu cầu của khách hàng là những gì MONA-architects hướng tới; từ đó giúp mang lại những
                            giá trị và lợi ích tối ưu, nâng cao thành quả và tiết kiệm thời gian cho khách hàng. </p>
                        <p>MONA-architects đã giúp cho rất nhiều khách hàng tạo ra một không gian làm việc mới góp phần
                            nâng cao sự hài lòng của nhân viên, gia tăng hiệu quả công việc, thể hiện rõ hơn vị thế của
                            công ty cũng như hỗ trợ về chiến lược và mục tiêu kinh doanh của từng khách hàng. </p>
                        <p>MONA-architects đang không ngừng sáng tạo những ý tưởng, giải pháp thiết kế mới, không bị
                            giới hạn và gò bó bởi những tư duy đã có hay tiêu chuẩn được thiết lập sẵn có và để từ đó,
                            tự hào trở thành công ty hàng đầu về dịch vụ thiết kế không gian làm việc cho doanh nghiệp
                            tại Việt Nam.</p>
                    </div>
                    <img src="./style/img/about2.jpg" alt="">
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
