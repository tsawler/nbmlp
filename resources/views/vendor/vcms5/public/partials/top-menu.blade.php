<div class="navbar navbar-default navbar-static-top yamm sticky" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><!-- <img src="img/logo.png" alt=""> --></a>
        </div>

        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">

                @if((Auth::check()) && (Auth::user()->access_level == 3))
                    @foreach((Tsawler\Vcms5\models\MenuItem::where('menu_id','=','1')
                            ->orderBy('sort_order')
                            ->get()) as $item)
                        @if ($item->has_children == 0)
                            @if ($item->active == 1)
                                @if ($item->page_id == 0)
                                    <li>
                                        <a class='mitem' data-mitem-id="{!! $item->id !!}" href='{!! $item->url !!}'>
                                            @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
                                                {!! $item->menu_text_fr !!}
                                            @elseif ((Session::has('lang')) && (Session::get('lang') == 'es'))
                                                    {!! $item->menu_text_es !!}
                                            @else
                                                {!! $item->menu_text !!}
                                            @endif
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <a class='mitem' data-mitem-id="{!! $item->id !!}"
                                           href='/{!! $item->targetPage->slug !!}'>
                                            @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
                                                {!! $item->menu_text_fr !!}
                                            @elseif ((Session::has('lang')) && (Session::get('lang') == 'es'))
                                                    {!! $item->menu_text_es !!}
                                            @else
                                                {!! $item->menu_text !!}
                                            @endif
                                        </a>
                                    </li>
                                @endif
                            @else
                                @if ($item->page_id == 0)
                                    <li>
                                        <a class='mitem' data-mitem-id="{!! $item->id !!}"
                                           href='{!! $item->url !!}'>
                                            @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
                                                <em class="text-warning">{!! $item->menu_text_fr !!}</em>
                                            @elseif ((Session::has('lang')) && (Session::get('lang') == 'es'))
                                                    <em class="text-warning">{!! $item->menu_text_es !!}</em>
                                            @else
                                                <em class="text-warning">{!! $item->menu_text !!}</em>
                                            @endif
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <a class='mitem' data-mitem-id="{!! $item->id !!}"
                                           href='/{!! $item->targetPage->slug !!}'>
                                            @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
                                                <em class="text-warning">{!! $item->menu_text_fr !!}</em>
                                            @elseif ((Session::has('lang')) && (Session::get('lang') == 'es'))
                                                <em class="text-warning">{!! $item->menu_text_es !!}</em>
                                            @else
                                                <em class="text-warning">{!! $item->menu_text !!}</em>
                                        </a>
                                        @endif
                                    </li>
                                @endif
                            @endif
                        @else
                            @if ($item->active == 1)
                                <li class="dropdown">
                                    <a href="#"
                                       class="mitem dropdown-toggle"
                                       data-mitem-id="{!! $item->id !!}"
                                       data-toggle="dropdown" role="button" aria-expanded="false">
                                        @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
                                            {!! $item->menu_text_fr !!}
                                        @elseif ((Session::has('lang')) && (Session::get('lang') == 'es'))
                                            {!! $item->menu_text_es !!}
                                        @else
                                            {!! $item->menu_text !!}
                                        @endif
                                        <span class="caret"></span>
                                    </a>
                            @else
                                <li class="dropdown">
                                    <a href="#"
                                       class="mitem dropdown-toggle"
                                       data-mitem-id="{!! $item->id !!}"
                                       data-toggle="dropdown" role="button" aria-expanded="false">
                                        @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
                                            <em class="text-warning">{!! $item->menu_text_fr !!}</em>
                                        @elseif ((Session::has('lang')) && (Session::get('lang') == 'es'))
                                            <em class="text-warning">{!! $item->menu_text_es !!}</em>
                                        @else
                                            <em class="text-warning">{!! $item->menu_text !!}</em>
                                        @endif
                                        <span class="caret"></span>
                                    </a>
                                    @endif
                                    <ul class="dropdown-menu" role="menu">
                                        @foreach ($item->dropdownItems as $dd)
                                            @if ($dd->active == 1)
                                                @if ($dd->page_id == 0)
                                                    <li>
                                                        <a class='ddmitem' data-ddmitem-id="{!! $dd->id !!}" data-mitem-id="{!! $item->id !!}"
                                                           href="{!! $dd->url !!}">
                                                            @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
                                                                {!! $dd->menu_text_fr !!}
                                                            @elseif ((Session::has('lang')) && (Session::get('lang') == 'es'))
                                                                {!! $dd->menu_text_es !!}
                                                            @else
                                                                {!! $dd->menu_text !!}
                                                            @endif
                                                        </a>
                                                    </li>
                                                @else
                                                    <li>
                                                        <a class='ddmitem' data-ddmitem-id="{!! $dd->id !!}" data-mitem-id="{!! $item->id !!}"
                                                           href="/{!! $dd->targetPage->slug !!}">
                                                            @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
                                                                {!! $dd->menu_text_fr !!}
                                                            @elseif ((Session::has('lang')) && (Session::get('lang') == 'es'))
                                                                {!! $dd->menu_text_es !!}
                                                            @else
                                                                {!! $dd->menu_text !!}
                                                            @endif
                                                        </a>
                                                    </li>
                                                @endif
                                            @else
                                                @if ($dd->page_id == 0)
                                                    <li>
                                                        <a class="ddmitem" data-ddmitem-id="{!! $dd->id !!}" data-mitem-id="{!! $item->id !!}"
                                                           href="{!! $dd->url !!}">
                                                            <em class='text-warning'>
                                                                @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
                                                                    {!! $dd->menu_text_fr !!}
                                                                @elseif ((Session::has('lang')) && (Session::get('lang') == 'es'))
                                                                    {!! $dd->menu_text_es !!}
                                                                @else
                                                                    {!! $dd->menu_text !!}
                                                                @endif
                                                            </em>
                                                        </a>
                                                    </li>
                                                @else
                                                    <li>
                                                        <a class="ddmitem" data-ddmitem-id="{!! $dd->id !!}"
                                                           data-mitem-id="{!! $item->id !!}"
                                                           href="/{!! $dd->targetPage->slug !!}">
                                                            <em class='text-warning'>
                                                                @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
                                                                    {!! $dd->menu_text_fr !!}
                                                                @elseif ((Session::has('lang')) && (Session::get('lang') == 'es'))
                                                                    {!! $dd->menu_text_es !!}
                                                                @else
                                                                    {!! $dd->menu_text !!}
                                                                @endif
                                                            </em>
                                                        </a>
                                                    </li>
                                                @endif
                                            @endif
                                        @endforeach
                                        <li><a href='#' onclick="addDDMenuItem(<?= $item->id ?>)">[Add item]</a></li>
                                    </ul>
                                    @endif
                                    @endforeach
                                    @else
                                        @foreach((Tsawler\Vcms5\models\MenuItem::where('menu_id','=','1')
                                                ->where('active','=','1')
                                                ->orderBy('sort_order')
                                                ->get()) as $item)
                                            @if ($item->has_children == 0)
                                                @if ($item->page_id == 0)
                                <li>
                                    <a href='{!! $item->url !!}'>
                                        @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
                                            {!! $item->menu_text_fr !!}
                                        @elseif ((Session::has('lang')) && (Session::get('lang') == 'es'))
                                            {!! $item->menu_text_es !!}
                                        @else
                                            {!! $item->menu_text !!}
                                        @endif
                                    </a>
                                </li>
                                @else
                                    <li>
                                        <a href='/{!! $item->targetPage->slug !!}'>
                                            @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
                                                {!! $item->menu_text_fr !!}
                                            @elseif ((Session::has('lang')) && (Session::get('lang') == 'es'))
                                                {!! $item->menu_text_es !!}
                                            @else
                                                {!! $item->menu_text !!}
                                            @endif
                                        </a>
                                    </li>
                                @endif
                                @else
                                    <li class="dropdown">
                                        <a href="#"
                                           class="dropdown-toggle"
                                           data-toggle="dropdown" role="button" aria-expanded="false">
                                            @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
                                                {!! $item->menu_text_fr !!}
                                            @elseif ((Session::has('lang')) && (Session::get('lang') == 'es'))
                                                {!! $item->menu_text_es !!}
                                            @else
                                                {!! $item->menu_text !!}
                                            @endif
                                            <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu" role="menu">
                                            @foreach ($item->dropdownItems as $dd)
                                                @if ($dd->active == 1)
                                                    @if ($dd->page_id == 0)
                                                        <li><a href="{!! $dd->url !!}">
                                                                @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
                                                                    {!! $dd->menu_text_fr !!}
                                                                @elseif ((Session::has('lang')) && (Session::get('lang') == 'es'))
                                                                    {!! $dd->menu_text_es !!}
                                                                @else
                                                                    {!! $dd->menu_text !!}
                                                                @endif
                                                            </a></li>
                                                    @else
                                                        <li><a href="/{!! $dd->targetPage->slug !!}">
                                                                @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
                                                                    {!! $dd->menu_text_fr !!}
                                                                @elseif ((Session::has('lang')) && (Session::get('lang') == 'es'))
                                                                    {!! $dd->menu_text_es !!}
                                                                @else
                                                                    {!! $dd->menu_text !!}
                                                                @endif
                                                            </a></li>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </ul>
                                        @endif
                                        @endforeach
                                        @endif

                                        @if((Auth::check()) && (Auth::user()->access_level == 3))
                                    <li class="dropdown">
                                        <a href="#"
                                           class="dropdown-toggle"
                                           data-toggle="dropdown" role="button" aria-expanded="false">
                                            <i class="fa fa-wrench"></i>
                                            <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="/admin/dashboard">Dashboard</a></li>
                                            <li><a href="#!" class="menu-item" onclick="makePageEditable(this)">Edit page</a></li>
                                            <li><a href="/admin/page/page?id=0">Add Page</a></li>
                                            <li><a href="#!" onclick="addMenuItem()">Add Menu Item</a></li>
                                            <li><a href="/admin/logout">Logout</a></li>
                                        </ul>
                                    </li>
                                    @else
                                        <li>
                                            <a href='/admin/login'>Login</a>
                                        </li>
                                    @endif

                                    <li class="dropdown " data-animate="animated fadeInUp" style="z-index:500;">
                                        <a href="#" class="dropdown-toggle " data-toggle="dropdown"><i class="fa fa-search"></i></a>
                                        <ul class="dropdown-menu search-dropdown animated fadeInUp">
                                            <li id="dropdownForm">
                                                <div class="dropdown-form">
                                                    {!! Form::open(array('url' => '/search', 'class' => 'form-inline', 'method' => 'post')) !!}
                                                    <div class="input-group">
                                                        {!! Form::text('q', null, array('class' => 'form-control', 'placeholder' => 'search...')) !!}
                                                            <span class="input-group-btn">
                                                                <input type="submit" class="btn btn-theme-bg" value="Go!">
                                                            </span>
                                                    </div>
                                                    {!! Form::close() !!}
                                                </div>
                                            </li>
                                        </ul>
                                    </li>

            </ul>

        </div>
    </div>
</div>