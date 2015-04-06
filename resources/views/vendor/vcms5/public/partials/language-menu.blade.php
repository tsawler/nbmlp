@if ((Config::get('vcms5.use_fr')) || (Config::get('vcms5.use_es')))
        &nbsp;&nbsp;
        <a class='btn btn-xs btn-outline' href="/changelanguage?lang=en&amp;url={!! URL::current() !!}" style="color: black;">
            @if (Session::get('lang') == 'en')
                <span class="text-danger">EN</span>
            @else
                EN
            @endif
        </a>
        <a class='btn btn-xs btn-outline' href="/changelanguage?lang=fr&amp;url={!! URL::current() !!}" style="color: black;">
            @if (Session::get('lang') == 'fr')
                <span class="text-danger">FR</span>
            @else
                FR
            @endif
        </a>

        <a class='btn btn-xs btn-outline' href="/changelanguage?lang=es&amp;url={!! URL::current() !!}" style="color: black;">
            @if (Session::get('lang') == 'es')
                <span class="text-danger">ES</span>
            @else
                ES
            @endif
        </a>

@endif