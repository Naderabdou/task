@extends('site.layouts.app')
@section('meta_description', getSetting('about')->value)
@section('content')
    <!-- start app -->
    <main id="app" class="apps">
        <!-- start nav_bar -->
        <section class="nav_bar">
            <div class="main-container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="text_nav_bar">
                            <h1> نبذة عن</h2>
                                <h2>{{ getSetting('main_fullname')->value }}</h2>
                                <p>
                                    {{ getSetting('about')->value }}
                                </p>

                                <a href="{{ route('site.about') }}" class="ctm-btn"> أعرف المزيد</a>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="img_nav_bar">
                            <img src="{{ asset('storage/' . getSetting('main_image')->value) }}"
                                alt="{{ getSetting('main_fullname')->value }}">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ende nav_bar -->



        <!-- start new_articles -->
        <section class="new_articles">
            <div class="main-container">
                <div class="title">
                    <h2>أحدث المقالات </h2>
                </div>
                <div class="link_new_articles">
                    <a href="{{ route('site.articles.index') }}"> مشاهدة المزيد </a>
                </div>
                <div class="main_new_articles">
                    <div class="row">

                        @foreach ($articles as $article)
                            <!-- start sub_new_articles  -->
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="sub_new_articles">
                                    <div class="img_new_articles">
                                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}">
                                    </div>
                                    <div class="text_new_articles">
                                        <h2> {{ $article->title }} </h2>
                                        <div class="sub_text_new_articles">
                                            <p> <i class="bi bi-eye-fill"></i> <span> {{ $article->views }} </span></p>
                                            <p> تاريخ الإضافة <span> {{ $article->publish_date }} </span></p>
                                        </div>
                                        <div class="btn_sub_new_articles">
                                            <a href="{{ route('site.articles.show.article', $article->id) }}"
                                                class="ctm-btn-1"> قراءة المقال </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end sub_new_articles  -->
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
        <!-- end new_articles -->


        <!-- start literature_index -->
        <section class="literature_index">
            <div class="main-container">
                <div class="title">
                    <h2>أهم المؤلفات </h2>
                </div>
                <div class="link_new_articles">
                    <a href="{{ route('site.books.index') }}"> مشاهدة المزيد </a>
                </div>
                <div class="main_literature_index">
                    <div class="owl-carousel owl-theme maincarousel" id="slider_1">

                        @foreach ($books as $book)
                            <div class="item">
                                <div class="sub_literature_index">
                                    <div class="img_literature_index">
                                        <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}">
                                    </div>

                                    <div class="text_literature_index">
                                        <h2>
                                            {{ $book->title }}
                                        </h2>
                                        <p>عدد الصفحات <span> {{ $book->pages }} صفحة</span></p>

                                        <a href="{{ route('site.books.show', $book->id) }}" class="ctm-btn-1"> مشاهدة
                                            التفاصيل</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
        <!-- end literature_index -->




        <!-- start videos_index -->
        <section class="videos_index">
            <div class="main-container">
                <div class="title2">
                    <h2>المكتبة المرئية </h2>
                </div>


                <div class="main_videos_index">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="links_tabs_videos">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                                    @foreach ($videos as $index => $video)
                                        <li class="nav-item">
                                            <a class="nav-link" id="videos_1_tab" data-toggle="pill"
                                                href="#videos_{{ $index }}" role="tab"
                                                aria-controls="videos_{{ $index }}" aria-selected="true">
                                                <div class="sub_links_tabs_videos">
                                                    <h2> {{ $video->title }} </h2>
                                                    <div class="img_links_tabs_videos">

                                                        @php
                                                            $url = $video->url;
                                                            $url_components = parse_url($url);

                                                            if (array_key_exists('query', $url_components)) {
                                                                parse_str($url_components['query'], $params);
                                                                if (isset($params['v'])) {
                                                                    $key = $params['v'];
                                                                } else {
                                                                    $key = str_replace('/', '', $url_components['path']);
                                                                }
                                                            } else {
                                                                $key = str_replace('/', '', $url_components['path']);
                                                            }
                                                        @endphp


                                                        <img src="http://img.youtube.com/vi/{{ $key }}/mqdefault.jpg"
                                                            alt="{{ $video->title }}">
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>

                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="sub_videos_index">
                                <div class="tab-content" id="pills-tabContent">
                                    @foreach ($videos as $index => $video)
                                        <div class="tab-pane fade {{ $index == 0 ? 'active show' : '' }}"
                                            id="videos_{{ $index }}" role="tabpanel" aria-labelledby="videos_1_tab">
                                            <div class="videos_index_iframe">

                                                @php
                                                    $url = $video->url;
                                                    $url_components = parse_url($url);

                                                    if (array_key_exists('query', $url_components)) {
                                                        parse_str($url_components['query'], $params);
                                                        if (isset($params['v'])) {
                                                            $key = $params['v'];
                                                        } else {
                                                            $key = str_replace('/', '', $url_components['path']);
                                                        }
                                                    } else {
                                                        $key = str_replace('/', '', $url_components['path']);
                                                    }
                                                @endphp

                                                <iframe width="" height=""
                                                    src="https://www.youtube.com/embed/{{ $key }}"
                                                    title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end videos_index -->

    </main>
@endsection
