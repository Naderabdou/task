@extends('site.layouts.app')
@section('meta_description', $book->desc ? $book->desc : '')
@if ($book->keywords)
    @php
        $key = [];
        foreach (json_decode($book->keywords) as $keyword) {
            $key[] = $keyword;
        }

    @endphp
@endif
@section('meta_keywords', isset($key) ? implode(',', $key) : '')
@section('content')
    <!-- start app -->
    <main id="app">

        <div class="detalis_books">
            <div class="main-container">
                <div class="bread_crump_pages">
                    <p> <a href="{{ route('site.books.index') }}">الكتب و المؤلفات </a> <i
                            class="bi bi-chevron-double-left"></i> <span>
                            {{ $book->title }} </span></p>
                </div>


                <div class="main_detalis_books">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="img_detalis_books">
                                <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}">
                            </div>
                        </div>

                        <div class="col-lg-9">
                            <div class="text_detalis_books">
                                <h2> {{ $book->title }} </h2>
                                <ul>
                                    <li> <img src="{{ url('site') }}/images/d2.png" alt=""> <span>تاريخ النشر
                                        </span> <b> {{ $book->publish_date }}م </b> <b> {{ $book->hijri_date }}هـ </b>
                                    </li>
                                    <li> <img src="{{ url('site') }}/images/d3.png" alt=""> <span>عدد الصفحات
                                        </span> {{ $book->pages }} </li>
                                    <li> <img src="{{ url('site') }}/images/d4.png" alt=""> <span> عدد المجلدات
                                        </span> {{ $book->folders }} </li>
                                    <li> <img src="{{ url('site') }}/images/d5.png" alt=""> <span>عدد
                                            التحميلات</span> {{ $book->downloads }} </li>
                                    <li> <img src="{{ url('site') }}/images/d6.png" alt=""> <span>نبذة عن الكتاب
                                        </span> </li>
                                </ul>

                                <p> {!! $book->desc ? $book->desc : '' !!} </p>

                                <div class="btn_download_books">
                                    <div class="download_pdf">
                                        <a href="{{ route('site.books.downloadBook', $book->id) }}">
                                            <i class="bi bi-cloud-arrow-down-fill"></i>
                                            تحميل ملف الكتاب PDF
                                        </a>
                                    </div>
                                    <div class="reading_books">
                                        <a href="{{ asset('storage/' . $book->file) }}" target="_blank">
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
            </div>


        </div>


    </main>
@endsection
