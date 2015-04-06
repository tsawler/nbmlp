@if ((Auth::user()) && (Auth::user()->hasRole('news')))
    <h1>
        <article style='width: 100%; display: inline'>
            <span id="editablecontenttitle" class="editablecontenttitle">{!! $news_title !!}</span>
        </article>
    </h1>
@else
    <h1>{!! $news_title !!}</h1>
@endif