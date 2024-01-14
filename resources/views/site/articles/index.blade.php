@extends('site.layouts.app')

@section('content')
    <!-- start app -->
    <main id="app">

        <div class="articles_page">
            <div class="main-container">
                <div class="title2">
                    <h2> المقالات </h2>
                </div>

                <div class="main_articles_page">
                    <div class="row">

                        @foreach ($articles as $article)
                            <!-- start sub_new_articles  -->
                            <div class="col-lg-4 col-md-6 col-sm-6">
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
                                            <a href="{{ route('site.articles.show.article', $article->id) }}" class="ctm-btn-1"> قراءة المقال </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end sub_new_articles  -->
                        @endforeach



                        <div class="col-lg-12">
                            <div class="paginiation">
                                <ul>
                                    {{ $articles->links('vendor.pagination.default') }}
                                </ul>
                            </div>
                        </div>


                    </div>
                </div>



                <div class="more_articles_page">
                    <div class="title2">
                        <h2> البحوث العلمية</h2>
                    </div>

                    <div class="main_artices_page">
                        <div class="owl-carousel owl-theme maincarousel" id="slider_1">

                            @foreach ($researches as $research)
                                <div class="item">
                                    <div class="sub_new_articles">
                                        <div class="img_new_articles">
                                            <img src="{{ asset('storage/' . $research->image) }}" alt="{{ $research->title }}">
                                        </div>
                                        <div class="text_new_articles">
                                            <h2>{{ $research->title }} </h2>
                                            <div class="sub_text_new_articles">
                                                <p> <i class="bi bi-eye-fill"></i> <span> {{ $research->views }} </span></p>
                                                <p> تاريخ الإضافة <span> {{ $research->publish_date }} </span></p>
                                            </div>
                                            <div class="btn_sub_new_articles">
                                                <a href="{{ route('site.articles.show.research', $research->id) }}" class="ctm-btn-1"> مشاهدة التفاصيل </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </main>
@endsection
