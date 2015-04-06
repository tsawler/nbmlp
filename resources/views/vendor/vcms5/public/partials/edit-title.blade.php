@if ((Auth::user()) && (Auth::user()->hasRole('pages')))
    <h4>
        <article style='width: 100%; display: inline'>
            <span id="editablecontenttitle" class="editablecontenttitle">{!! $page_title or ' ' !!}</span>
        </article>
    </h4>
@else
    <h4>{!! $page_title or ' ' !!}</h4>
@endif