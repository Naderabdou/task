@extends('site.layouts.app')
@section('meta_description', Str::limit($article->desc, 150))
@if ($article->keywords)
    @php
        $key = [];
        foreach (json_decode($article->keywords) as $keyword) {
            $key[] = $keyword;
        }

    @endphp
@endif
@section('meta_keywords' , isset($key) ? implode(',', $key) : '')
@section('content')
    <!-- start app -->
    <main id="app">

        <div class="articles_detalis">
            <div class="main-container">
                <div class="bread_crump_pages">
                    <p> <a href="{{ route('site.articles.index') }}"> المقالات و البحوث </a> <i class="bi bi-chevron-double-left"></i>
                        <span> {{ $article->title }} </span>
                    </p>
                </div>


                <div class="main_articles_detalis">
                    <div class="img_articles_detalis">
                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}">
                    </div>
                    <div class="date_articles_detalis">
                        <ul>
                            <li> <img src="images/d2.png" alt=""> تاريخ النشر <span> {{ $article->publish_date }}م </span> <span>
                                {{ $article->hijri_date }}هـ </span> </li>

                            <li><img src="images/d7.png" alt=""> عدد الزيارات <span>{{ $article->views }}</span></li>
                        </ul>
                    </div>

                    <div class="title2">
                        <h2> المقال كامل</h2>
                    </div>
                    <p class="text_articles_detalis">
                        {!! $article->desc !!}
                    </p>
                </div>
            </div>
        </div>

    </main>
@endsection
