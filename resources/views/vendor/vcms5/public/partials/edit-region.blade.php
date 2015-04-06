@if ((Auth::user()) && (Auth::user()->hasRole('pages')))

    {!! Form::open(array('url' => '/page/savepage', 'id' => 'savetitledata', 'name' => 'savetitledata')) !!}
    <span style="display: none" id="theeditmsg"></span>
    <article id="editablecontent" class='editablecontent' itemprop="description" style='width: 100%; line-height: 2em;'>
        {!! $page_content  or ' ' !!}
    </article>

    <article class="admin-hidden">
        <input type="hidden" name="page_id" value="{!! $page_id or 0 !!}">
        <input type="hidden" name="thetitledata" id="thetitledata">
    </article>
    <article class="admin-hidden">
        <a class="btn btn-primary" href="#!" onclick="saveEditedPage()">Save</a>
        <a class="btn btn-info" href="#!" onclick="turnOffEditing()">Cancel</a>
        &nbsp;&nbsp;&nbsp;
    </article>
    <input type="hidden" name="thedata" id="thedata">
    {!! Form::close() !!}

    <input type="hidden" id="oldtitle">
    <input type="hidden" id="old">

@else
    {!! $page_content or ' ' !!}
@endif
