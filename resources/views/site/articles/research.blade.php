@extends('site.layouts.app')
@section('meta_description', $research->desc ? $research->desc : '' )
@if ($research->keywords)
    @php
        $key = [];
        foreach (json_decode($research->keywords) as $keyword) {
            $key[] = $keyword;
        }

    @endphp
@endif
@section('meta_keywords' , isset($key) ? implode(',', $key) : '')
@section('content')
    <!-- start app -->
    <main id="app">


        <div class="detalis_books">
            <div class="main-container">
                <div class="bread_crump_pages">
                    <p> <a href="{{ route('site.articles.index') }}">المقالات و البحوث </a> <i class="bi bi-chevron-double-left"></i>
                        <span> {{ $research->title }} </span>
                    </p>
                </div>


                <div class="main_detalis_books">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="img_detalis_books">
                                <img src="{{ asset('storage/' . $research->image) }}" alt="{{ $research->title }}">
                            </div>
                        </div>

                        <div class="col-lg-9">
                            <div class="text_detalis_books">
                                <h2> {{ $research->title }} </h2>
                                <ul>
                                    <li> <img src="{{ url('site') }}/images/d2.png" alt=""> <span>تاريخ النشر </span> <b>
                                            {{ $research->publish_date }}م </b> <b> {{ $research->hijri_date }}هـ </b>
                                    </li>
                                    <li> <img src="{{ url('site') }}/images/d3.png" alt=""> <span>عدد الصفحات </span>
                                        {{ $research->pages }} </li>
                                    <li> <img src="{{ url('site') }}/images/d4.png" alt=""> <span> عدد المجلدات </span>
                                        {{ $research->folders }} </li>
                                    <li> <img src="{{ url('site') }}/images/d5.png" alt=""> <span>عدد التحميلات</span>
                                        {{ $research->downloads }} </li>
                                    <li> <img src="{{ url('site') }}/images/d6.png" alt=""> <span>نبذة عن الكتاب </span> </li>
                                </ul>

                                <p> {!! $research->desc ? $research->desc : '' !!} </p>

                                <div class="btn_download_books">
                                    <div class="download_pdf">
                                        <a href="{{ route('site.articles.downloadResearch', $research->id) }}">
                                            <i class="bi bi-cloud-arrow-down-fill"></i>
                                            تحميل ملف الكتاب PDF
                                        </a>
                                    </div>
                                    <div class="reading_books">
                                        <a href="{{ asset('storage/' . $research->file) }}" target="_blank">
                                            <i class="bi bi-eye-fill"></i>
                                            قراءة الكتاب
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="books_more">
                <div class="main-container">
                    <div class="title">
                        <h2>كتب أخرى ذات صلة</h2>
                    </div>
                    <div class="main_literature_index">
                        <div class="owl-carousel owl-theme maincarousel" id="slider_1">

                            @foreach ($researches as $research)
                                <div class="item">
                                    <div class="sub_new_articles">
                                        <div class="img_new_articles">
                                            <img src="{{ url('storage/' . $research->image) }}" alt="{{ $research->title }}">
                                        </div>
                                        <div class="text_new_articles">
                                            <h2>{{ $research->title }} </h2>
                                            <div class="sub_text_new_articles">
                                                <p> <i class="bi bi-eye-fill"></i> <span> {{ $research->views }} </span></p>
                                                <p> تاريخ الإضافة <span> {{ $research->publish_date }} </span></p>
                                            </div>
                                            <div class="btn_sub_new_articles">
                                                <a href="{{ route('site.articles.show.research', $research->id  ) }}" class="ctm-btn-1"> مشاهدة التفاصيل </a>
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
