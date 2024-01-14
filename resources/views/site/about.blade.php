@extends('site.layouts.app')

@section('content')
    <!-- start app -->
    <main id="app">
        <div class="aboutus">
            <div class="main-container">
                <div class="sub_aboutus">
                    <div class="text_main_aboutus">
                        <div class="title2">
                            <h2> السيرة الذاتية </h2>
                        </div>
                        <ul>
                            <li> <span>الاسم: </span> {{ getSetting('fullname')->value }} </li>
                            <li> <span>مكان الميلاد : </span> {{ getSetting('birthplace')->value }} </li>
                            <li> <span>تاريخ الميلاد : </span> {{ getSetting('birthdate')->value }} </li>
                        </ul>
                    </div>
                    <div class="img_main_aboutus">
                        <img src="{{ asset('storage/' . getSetting('about_image')->value) }}"
                            alt="{{ getSetting('fullname')->value }}">
                    </div>
                </div>


                <div class="sub_aboutus">
                    <div class="text_main_aboutus">
                        <div class="title2">
                            <h2>المؤهلات </h2>
                        </div>
                        <ul>
                            <li> <span>التعليم العام : </span> {{ getSetting('public_education')->value }} </li>
                            <li> <span>الدراسة الجامعية : </span> {{ getSetting('universty')->value }} </li>
                            <li> <span>الماجستير : </span> {{ getSetting('masters')->value }} </li>
                            <li> <span>الدكتوراه : </span> {{ getSetting('Phd')->value }} </li>
                        </ul>
                    </div>
                </div>



                <div class="sub_aboutus">
                    <div class="text_main_aboutus">
                        <div class="title2">
                            <h2>الحياة العملية </h2>
                        </div>
                        <ul>

                            @foreach ($features as $feature)
                                <li> {{ $feature }} </li>
                            @endforeach

                        </ul>
                    </div>
                </div>


            </div>


            <div class="tabs_aboutus">
                <div class="main-container">

                    <div class="title">
                        <h2> الحياة العلمية </h2>
                    </div>
                    <div class="links_tabs_aboutus">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link active" id="videos_01_tab" data-toggle="pill" href="#videos_01"
                                    role="tab" aria-controls="videos_01" aria-selected="true">
                                    الكتب و المؤلفات
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="videos_02_tab" data-toggle="pill" href="#videos_02" role="tab"
                                    aria-controls="videos_02" aria-selected="false">
                                    المقالات
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="videos_03_tab" data-toggle="pill" href="#videos_03" role="tab"
                                    aria-controls="videos_03" aria-selected="false">
                                    الأبحاث العلمية
                                </a>
                            </li>

                        </ul>

                    </div>



                    <div class="main_tabs_abouts">
                        <div class="tab-content" id="pills-tabContent">

                            <div class="tab-pane fade show active" id="videos_01" role="tabpanel"
                                aria-labelledby="videos_01_tab">

                                <div class="main_literature_index">
                                    <div class="row">

                                        @foreach ($books as $book)
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="sub_literature_index">
                                                    <div class="img_literature_index">
                                                        <img src="{{ asset('storage/' . $book->image) }}"
                                                            alt="{{ $book->title }}">
                                                    </div>

                                                    <div class="text_literature_index">
                                                        <h2>
                                                            {{ $book->title }}
                                                        </h2>
                                                        <p>عدد الصفحات <span> {{ $book->pages }} صفحة</span></p>

                                                        <a href="{{ route('site.books.show', $book->id) }}" class="ctm-btn-1"> مشاهدة التفاصيل</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach


                                        <div class="col-lg-12">
                                            <div class="more_main_tabs_abouts">
                                                <a href="{{ route('site.books.index') }}" class="ctm-btn"> مشاهدة جميع الكتب و المؤلفات </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="tab-pane fade" id="videos_02" role="tabpanel" aria-labelledby="videos_02_tab">
                                <div class="main_new_articles">
                                    <div class="row">

                                        @foreach ($articles as $article)
                                            <!-- start sub_new_articles  -->
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <div class="sub_new_articles">
                                                    <div class="img_new_articles">
                                                        <img src="{{ asset('storage/' . $article->image) }}"
                                                            alt="{{ $article->title }}">
                                                    </div>
                                                    <div class="text_new_articles">
                                                        <h2>{{ $article->title }} </h2>
                                                        <div class="sub_text_new_articles">
                                                            <p> <i class="bi bi-eye-fill"></i> <span>
                                                                    {{ $article->views }} </span></p>
                                                            <p> تاريخ الإضافة <span> {{ $article->publish_date }} </span>
                                                            </p>
                                                        </div>
                                                        <div class="btn_sub_new_articles">
                                                            <a href="{{ route('site.articles.show.article', $article->id) }}" class="ctm-btn-1"> قراءة المقال
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end sub_new_articles  -->
                                        @endforeach


                                        <div class="col-lg-12">
                                            <div class="more_main_tabs_abouts">
                                                <a href="{{ route('site.articles.index') }}" class="ctm-btn"> مشاهدة جميع المقالات </a>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane fade" id="videos_03" role="tabpanel" aria-labelledby="videos_03_tab">
                                <div class="main_new_articles">
                                    <div class="row">

                                        @foreach ($researches as $research)
                                            <!-- start sub_new_articles  -->
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <div class="sub_new_articles">
                                                    <div class="img_new_articles">
                                                        <img src="{{ asset('storage/' . $research->image) }}" alt="{{ $research->title }}">
                                                    </div>
                                                    <div class="text_new_articles">
                                                        <h2> {{ $research->title }} </h2>
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
                                            <!-- end sub_new_articles  -->
                                        @endforeach

                                        <div class="col-lg-12">
                                            <div class="more_main_tabs_abouts">
                                                <a href="{{ route('site.articles.index') }}" class="ctm-btn"> مشاهدة جميع الابحاث</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
