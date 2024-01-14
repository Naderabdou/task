 <!-- start heeder -->
 <header class="header">
    <div class="main-container">
        <div class="top_bar">
            <div class="logo">
                <a href="{{ route('site.home') }}">
                    <img src="{{ url('site') }}/images/logo.png" alt="">
                </a>
            </div>

            <div class="element">
                <ul>
                    <li><a href="{{ route('site.home') }}"> الصفحة الرئسية</a></li>
                    <li><a href="{{ route('site.about') }}"> السيرة الذاتية</a></li>
                    <li><a href="{{ route('site.books.index') }}">الكتب و المؤلفات</a></li>
                    <li><a href="{{ route('site.articles.index') }}">المقالات و البحوث</a></li>
                    <li><a href="{{ route('site.videos.index') }}">المكتبة الالكترونية </a></li>
                    <li><a href="{{ route('site.contact') }}"> تواصل معنا </a></li>
                </ul>
            </div>
            <div class="search_header">
                <form action="">
                    <input type="text" placeholder="ابحث عن" id="input_search" data-url="{{ route('site.search') }}" class="form-control" name="search">
                    <button> <img src="{{ url('site') }}/images/search.png" alt=""></button>
                </form>

                <div class="details_search" style="display: none;">
                    <ul id="search_result">

                    </ul>
                </div>
            </div>

            <div class="content" id="times-ican">
                <a href="#" title="Navigation menu" class="navicon" aria-label="Navigation">
                    <span class="navicon__item"></span>
                    <span class="navicon__item"></span>
                    <span class="navicon__item"></span>
                    <span class="navicon__item"></span>
                </a>
            </div>


        </div>
    </div>
</header>
<!-- end heeder -->
