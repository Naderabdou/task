<!-- start footer -->
<footer>
    <!-- start Newsletter -->
    <section class="newsletter">
        <div class="main-container">
            <div class="title">
                <h2> انضم الآن إلى قائمتنا البريدية</h2>
            </div>

            @include('site.mailList')
        </div>
    </section>
    <!-- start Newsletter -->


    <div class="main_footer">
        {{-- <div class="whatsapp_footer">
            <a href="https://wa.me/{{ getSetting('phone')->value }}" target="_blank" class="btn-whatsapp-pulse btn-whatsapp-pulse-border">
                <i class="fab fa-whatsapp"></i>
            </a>
        </div> --}}

        <div class="element_footer">
            <ul>
                <li><a href="{{ route('site.home') }}">الصفحة الرئسية </a></li>
                <li><a href="{{ route('site.about') }}"> السيرة الذاتية </a></li>
                <li><a href="{{ route('site.videos.index') }}">المكتبة الالكترونية </a></li>
                <li><a href="{{ route('site.contact') }}"> تواصل معنا</a></li>
            </ul>
        </div>



        <div class="main-container">
            <div class="end_page">
                <a href="https://jaadara.com/"> صنع بكل حب <i class="bi bi-heart-fill"></i> في معامل
                    جدارة</a>
                <p> جميع الحقوق محفوظة &copy; لـ أ.د علي بن إبراهيم النملة </p>

            </div>
        </div>
    </div>

</footer>
<!-- end footer -->



















<!-- start menu responsive ===
======== -->
<div class="bg_menu ">
</div>
<div class="menu_responsive" id="menu-div">
    <div class="logo_menu">
        <a href="index.html"> <img src="{{ url('site') }}/images/logo.png" alt=""> </a>
    </div>
    <div class="element_menu_responsive">
        <ul>
            <li><a href="{{ route('site.home') }}"> الصفحة الرئسية</a></li>
            <li><a href="{{ route('site.about') }}"> السيرة الذاتية</a></li>
            <li><a href="{{ route('site.books.index') }}">الكتب و المؤلفات</a></li>
            <li><a href="{{ route('site.articles.index') }}">المقالات و البحوث</a></li>
            <li><a href="{{ route('site.videos.index') }}">المكتبة الالكترونية </a></li>
            <li><a href="{{ route('site.contact') }}"> تواصل معنا </a></li>
        </ul>
    </div>



</div>

<!-- end menu responsive ===
======== -->

</div>

@include('site.layouts.script')



</body>
<!-- end-body
=================== -->

</html>
