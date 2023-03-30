<div class="background-white1">

    <section class="section7">
        <!-- <div class="img">
            <img src="../img/partner-1.jpg" alt="">
            <img src="../img/partner-2.jpg" alt="">
            <img src="../img/partner-3.jpg" alt="">
            <img src="../img/partner-4.jpg" alt="">
            <img src="../img/partner-5.jpg" alt="">
        </div> -->
        <div class="send_mail">
            <div class="content">
                <h2>Theo dõi bản tin của chúng tôi</h2><br>
                <p>Nhận thông tin cập nhật qua email về các cửa hàng mới nhất của chúng tôi và các ưu đãi
                    đặc biệt</p>
            </div>
            <div class="content">
                <input type="text" placeholder="Nhập địa chỉ email" name="" id="">
                <button type="submit">Đặt ngay</button>
            </div>
        </div>
    </section>

    <div class="class-helo">
        <div id="backTop">
            <i class="fas fa-chevron-up animate__animated animate__fadeInUp  animate__infinite"></i>
        </div>
    </div>

    <!-- FOOTER -->
    <div class="footer">
        <footer>
            <div class="content1">
                <h2>Vegefoods</h2>

                <p>Far far away, behind the word mountains,
                    far from the countries Vokalia and Consonantia.</p>
                <div class="icon">
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-instagram"></i>
                </div>
            </div>
            <div class="content1">
                <h2>Menu</h2>
                <span>Trang chủ</span><br><br>
                <span>Giới thiệu</span><br><br>
                <span>Tin tức</span><br><br>
                <span>Liên hệ</span>

            </div>
            <div class="content1">
                <h2>Trợ giúp</h2>
                <span>Thông tin vận chuyển FAQs</span><br><br>
                <span>Trả hàng và trao đổi Liên hệ</span><br><br>
                <span>Điều khoản và dịch vụ</span><br><br>
                <span>Chính sách bảo mật</span>

            </div>

            <div class="content1">
                <h2>Giải đáp thắc mắc</h2>
                <i class="fas fa-map-marker-alt"></i> <span>26 Trịnh Văn Bô, Nam Từ Liêm, Hà Nội</span>
                <div class="icon-header">
                    <i class="fas fa-phone-alt"></i>
                    <span>+ 1235 2355 98</span>

                </div>
                <div class="icon-header">
                    <i class="fab fa-telegram-plane"></i>
                    <span> YOUREMAIL@EMAIL.COM</span>

                </div>


            </div>


        </footer>
        <p style=" text-align: center; padding: 50px 0;"> ©2021 Bảo lưu quyền Thực Phẩm| Thực hiện bởi Nhóm
            3
        </p>
    </div>
</div>
</div>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
    $(document).ready(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop()) {
                $('header').addClass('sticky');
            } else {
                $('header').removeClass('sticky');

            }
        });
    });
</script>
<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 30,
        freeMode: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
</script>


<!-- Back_up -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop()) {
                $('#backTop').fadeIn();
            } else {
                $('#backTop').fadeOut();

            }
        });
        $("#backTop").click(function() {
            $('html, body').animate({
                scrollTop: 0
            }, 2000);
        })
    });

    // getDate 
    var full = new Date("jan 1,2022 00:00:00").getTime()
    setInterval(function() {

        var noW = new Date().getTime()
        var D = full - noW
        var days = Math.floor(D / (1000 * 60 * 60 * 24))
        var hours = Math.floor(D / (1000 * 60 * 60))
        var minutes = Math.floor(D / (1000 * 60))
        var seconds = Math.floor(D / (1000))

        hours %= 24
        minutes %= 60
        seconds %= 60

        document.getElementById("days").innerText = days
        document.getElementById("hours").innerText = hours
        document.getElementById("minutes").innerText = minutes
        document.getElementById("seconds").innerText = seconds

    }, 1000);
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>

</html>