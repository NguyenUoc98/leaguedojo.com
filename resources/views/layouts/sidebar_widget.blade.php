<!-- Sidebar Widget -->
<div class="single-sidebar-widget p-4">

    <!-- Social Followers Info -->
    <div class="social-followers-info">

        <!-- YouTube -->
        <a href="https://www.youtube.com/channel/UCl81LfmyxDUZ1ygd4RNhsAw" class="youtube-subscribers pull-left"
            style="width: 50px;">
            <i class="fa fa-youtube" style="font-size: larger;"></i>
        </a>
        <h5 style="font-size: 16px;margin-bottom:5px">Karate League Dojo</h5>
        <div class="g-ytsubscribe" data-channelid="UCl81LfmyxDUZ1ygd4RNhsAw" data-layout="default" data-count="default">
        </div>

        <!-- Facebook -->
        <a href="https://www.facebook.com/LEAGUEDOJO/" class="facebook-fans mt-3">
            <i class="fa fa-facebook" style="font-size: larger;"></i>
            <span>Karate League Dojo - K.L.D</span>
        </a>
        <div class="fb-page" data-href="https://www.facebook.com/LEAGUEDOJO/" vdata-small-header="false"
            data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
            <blockquote cite="https://www.facebook.com/LEAGUEDOJO/" class="fb-xfbml-parse-ignore">
                <a href="https://www.facebook.com/LEAGUEDOJO/">Karate League Dojo - K.L.D</a>
            </blockquote>
        </div>
    </div>

    <!-- Category -->
    <div class="section-heading mt-3">
        <h5>Các thể loại</h5>
    </div>
    <ul class="catagory-widgets">
        @foreach($categories as $category)
        <li>
            <a href="{{ route('categories.show', $category->slug) }}" class="pb-3"
                style="border-bottom: 1px solid #ebebeb;">
                <span>
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    {{ $category->name }}
                </span>
                <span>{{ count($category->post) }}</span>
            </a>
        </li>
        @endforeach
    </ul>

</div>

<!-- Image PR -->
<div class="single-sidebar-widget">

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- Ad_doc_sidebar -->
    <ins class="adsbygoogle"
        style="display:block"
        data-ad-client="ca-pub-1747924550904432"
        data-ad-slot="3006063446"
        data-ad-format="auto"
        data-full-width-responsive="true"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    
    <!-- <a href="#" class="add-img">
        <img src="/img/core-img/event.png" alt="">
    </a> -->
</div>



<!-- DOJOS -->
<!-- <div class="single-sidebar-widget p-30">
    <div class="section-heading">
        <h5>Các cơ sở</h5>
    </div>
    <div class="single-youtube-channel d-flex">
        <div class="youtube-channel-thumbnail">
            <img src="/img/dojos/LeagueDojo.jpg" alt="" style="border: 2px solid #e9ebee;">
        </div>
        <div class="youtube-channel-content">
            <a href="#" class="channel-title">Karate League Dojo</a>
            <a href="https://www.facebook.com/LEAGUADOJO/" class="btn subscribe-btn">
                <i class="fa fa-caret-square-o-right" aria-hidden="true"></i>
                Ghé thăm
            </a>
        </div>
    </div>
    <div class="single-youtube-channel d-flex">
        <div class="youtube-channel-thumbnail">
            <img src="/img/dojos/NongNgiep.jpg" alt="" style="border: 2px solid #e9ebee;">
        </div>
        <div class="youtube-channel-content">
            <a href="#" class="channel-title">Karate Nông Nghiệp</a>
            <a href="https://www.facebook.com/karatenongnghiep/" class="btn subscribe-btn">
                <i class="fa fa-caret-square-o-right" aria-hidden="true"></i>
                Ghé thăm
            </a>
        </div>
    </div>
    <div class="single-youtube-channel d-flex">
        <div class="youtube-channel-thumbnail">
            <img src="/img/dojos/NguyenBaNgoc.jpg" alt="" style="border: 2px solid #e9ebee;">
        </div>
        <div class="youtube-channel-content">
            <a href="#" class="channel-title">Karate TH Nguyễn Bá Ngọc</a>
            <a href="https://www.facebook.com/KarateTHNguyenBaNgoc/" class="btn subscribe-btn">
                <i class="fa fa-caret-square-o-right" aria-hidden="true"></i>
                Ghé thăm
            </a>
        </div>
    </div>
</div> -->
