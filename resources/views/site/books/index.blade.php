@extends('site.layouts.app')

@section('content')
    <!-- start app -->
    <main id="app">

        <section class="books_pages">
            <div class="main-container">
                <div class="title2">
                    <h2>الكتب و المؤلفات</h2>
                </div>
                <div class="main_books_page">
                    <div class="row">

                        @foreach ($books as $book)
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="sub_literature_index">
                                    <div class="img_literature_index">
                                        <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}">
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
                            <div class="paginiation">
                                <ul>
                                    {{ $books->links('vendor.pagination.default') }}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>


    </main>
@endsection
