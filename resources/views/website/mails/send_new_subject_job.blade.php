@component('mail::message')
    <div dir="rtl" style="text-align: right">
        <div class="image" style="text-align: center; margin: auto; display: block;">
            <img src="{!! asset('assets/website/images/logo.png') !!}" alt="شعار المنصة" style="width: 100px; height: auto;">
        </div>

        {!! '<h2>مرحباً!</h2>' !!}
        {!! '<p>لديك اقتراح وظيفة جديدة:</p>' !!}

        {{-- تفاصيل الوظيفة --}}
        {!! '<p>اسم الوظيفة: ' . $adv_name . '</p>' !!}

        {{-- زر عرض الوظيفة --}}
        @component('mail::button', ['url' => url("/jobs/{$adv_slug}")])
            عرض الوظيفة
        @endcomponent

        {!! '<p>نتمنى لك التوفيق!</p>' !!}

        {!! config('app.name') !!}
    </div>
@endcomponent
