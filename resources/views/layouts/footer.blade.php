<!-- ##### Footer Area Start ##### -->
<footer class="footer-area">
    <div class="container">
        <div class="row">

            <!-- Footer Widget Area -->
            <div class="col-12 col-sm-6 col-lg-5">
                <div class="footer-widget">

                    <!-- Logo -->
                    <h6 class="widget-title">{{ setting('site.title') }}</h6>
                    <a href="#" class="foo-logo pull-left mr-2">
                        <img src="/img/core-img/logo1.png" alt="" style="height: 60px;">
                    </a>
                    <a href="#" class="foo-logo">
                        <img src="/img/core-img/favicon.ico" alt="" style="height: 60px;">
                    </a>
                    <p style="color: #9e9e9e;">{{ setting('site.site_details') }}</p>
                    <div class="footer-social-info">
                        <a href="https://www.facebook.com/LEAGUADOJO/" class="facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                        <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
            </div>

            <!-- Footer Widget Area -->
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="footer-widget">
                    <h6 class="widget-title">Các thể loại</h6>
                    <nav class="footer-widget-nav">
                        <ul>
                            @foreach($categories as $category)
                            <li>
                                <a href="#">
                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                    {{$category->name}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>

            <!-- Footer Widget Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="footer-widget">
                    <h6 class="widget-title">Các cơ sở</h6>
                    <ul class="footer-tags">
                        <li><a href="https://www.facebook.com/LEAGUADOJO/">Karate League Dojo</a></li>
                        <li><a href="https://www.facebook.com/karatenongnghiep/">Karate Nông Nghiệp</a></li>
                        <li><a href="https://www.facebook.com/KarateTHNguyenBaNgoc/">Karate TH Nguyễn Bá Ngọc</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ##### Footer Area End ##### -->