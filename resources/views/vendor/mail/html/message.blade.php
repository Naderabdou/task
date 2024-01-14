@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => url('/')])
{{ getSetting('main_fullname')->value }}
@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
{{ getSetting('about')->value }} <br>
© {{ date('Y') }} . @lang('All rights reserved.')
@endcomponent
@endslot
@endcomponent
