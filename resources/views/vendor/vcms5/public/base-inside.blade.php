@include('vcms5::public.partials.top-of-page')

@include('vcms5::public.partials.top-menu')

<div class="breadcrumb-wrap @yield('bg-class', 'breadcrumb-light')">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                @include('vcms5::public.partials.edit-title')
            </div>
            <div class="col-sm-6 hidden-xs text-right">
                <ol class="breadcrumb">
                    <li><a href="/">{!! Lang::get('vcms5::vcms5.home') !!}</a></li>
                    @yield('breadcrumb')
                    <li>{!! $page_title or ' ' !!}</li>
                </ol>
            </div>
        </div>
    </div>
</div><!--breadcrumbs-->

<div class="divide80"></div>

<div class="container">
    @yield('content')
</div>

<div class="divide60"></div>

@include('vcms5::public.partials.bottom-of-page')
