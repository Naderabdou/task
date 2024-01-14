@extends('site.layouts.app')

@section('content')
    <!-- start app -->
    <main id="app">

        <div class="contactus_page">
            <div class="main-container">
                <div class="title2">
                    <h2>تواصل معنا</h2>
                    <p>إذا كنت ترغب في التواصل مع الإدارة ما عليك سوى ادخال بياناتك في النموذج أدناه
                        و سوف يتم الرد عليك في الحال
                    </p>
                </div>

                <div class="main_contactus_page">
                    <form action="{{ route('site.contact.sendContact') }}" method="POST" id="contactForm">
                        @csrf
                        <div class="row align-item-center">
                            <div class="col-lg-6">
                                <div class="input_contactus_page">
                                    <label for="">الاسم بالكامل</label>
                                    <input type="text" placeholder="ادخل اسمك الثلاثي هنا" class="form-control"
                                        name="fullname">
                                </div>
                                <div class="input_contactus_page">
                                    <label for="">رقم الجوال</label>
                                    <input type="tel" placeholder="ادخل رقم جوالك" class="form-control" name="phone">
                                </div>

                                <div class="input_contactus_page">
                                    <label for="">البريد الإلكتروني</label>
                                    <input type="email" placeholder="ادخل بريدك الاكتروني" class="form-control"
                                        name="email">
                                </div>

                                <div class="input_contactus_page">
                                    <label for="">الرسالة</label>
                                    <textarea name="message" class="form-control" id="" cols="" rows=""></textarea>
                                </div>

                                <div class="btn_contactus_page">
                                    <button class="ctm-btn"> إرسال</button>
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="img_contactus_page">
                                    <img src="{{ url('site') }}/images/c1.png" alt="">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


        </div>

    </main>

    @push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/jquery.validate.min.js"
            integrity="sha512-FOhq9HThdn7ltbK8abmGn60A/EMtEzIzv1rvuh+DqzJtSGq8BRdEN0U+j0iKEIffiw/yEtVuladk6rsG4X6Uqg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/localization/messages_ar.min.js"></script>

        <script src="{{ url('site') }}/js/custom/contactForm.js"></script>
    @endpush
@endsection
