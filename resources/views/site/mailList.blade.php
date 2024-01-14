<div class="form_newsletter">
    <form method="POST" action="{{ route('site.mail') }}" id="mailListForm">
        @csrf
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="input_newsletter">
                    <input type="text" placeholder="الاسم بالكامل*" class="form-control" name="fullname">
                </div>
            </div>

            <div class="col-lg-5">
                <div class="input_newsletter">
                    <input type="email" placeholder="البريد الاكتروني *" class="form-control" name="email">
                </div>
            </div>

            <div class="col-lg-2">
                <div class="btn_newsletter">
                    <button class="ctm-btn-1"> اشترك الآن</button>
                </div>
            </div>

        </div>
    </form>
</div>

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/jquery.validate.min.js"
        integrity="sha512-FOhq9HThdn7ltbK8abmGn60A/EMtEzIzv1rvuh+DqzJtSGq8BRdEN0U+j0iKEIffiw/yEtVuladk6rsG4X6Uqg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/localization/messages_ar.min.js"></script>

    <script src="{{ url('site') }}/js/custom/mailListForm.js"></script>
@endpush
