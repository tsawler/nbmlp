@if ((Auth::user()) && (Auth::user()->hasRole('news')))

    @if (($news_image != null) && (strlen($news_image) > 0))
        <div>
            <img class="img img-responsive" src="/news/{!! $news_image !!}"
                 alt="">
        </div>
    @endif

    {!! Form::open(array('url' => '/news/savenews', 'id' => 'savetitledata', 'name' => 'savetitledata')) !!}
    <span style="display: none" id="theeditmsg"></span>
    <article id="editablecontent" class='editablecontent' itemprop="description" style='width: 100%; line-height: 2em;'>
        {!! $news_text !!}
    </article>

    <article class="admin-hidden">
        <input type="hidden" name="news_id" value="{!! $news_id !!}">
        <input type="hidden" name="thetitledata" id="thetitledata">
    </article>
    <article class="admin-hidden">
        <a class="btn btn-primary" href="#!" onclick="saveEditedNews()">Save</a>
        <a class="btn btn-info" href="#!" onclick="turnOffEditing()">Cancel</a>
        &nbsp;&nbsp;&nbsp;
    </article>
    <input type="hidden" name="thedata" id="thedata">
    {!! Form::close() !!}

    <input type="hidden" id="oldtitle">
    <input type="hidden" id="old">

@else
    @if (($news_image != null) && (strlen($news_image) > 0))
        <div>
            <img class="img img-responsive" src="/news/{!! $news_image !!}"
                 alt="">
        </div>
    @endif
    {!! $news_text !!}
@endif
