@if((Auth::check()) && (Auth::user()->hasRole('menus')))

    <div class="modal fade" id="ddmenuItemModal" tabindex="-1" role="dialog" aria-labelledby="ddmyModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="ddmyModalLabel">Drop Down Menu Item</h4>
                </div>
                <div class="modal-body" id="ddmodalbody">

                    {!! Form::open(['url' => '/menu/saveddmenuitem', 'name' => 'ddmenuItemForm',
                        'class' => 'form-horizontal',
                        'method' => 'post',
                        'id' => 'ddmenuItemForm']) !!}

                        <div class="tabs">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#dddetails">Details</a></li>
                                <li id="ddsortmenuitems"><a data-toggle="tab" href="#ddplacement">Placement</a></li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane active" id="dddetails">
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">

                                            <!-- Menu_text form input -->
                                            <div class="form-group">
                                                {!! Form::label('ddmenu_text','Menu text:') !!}
                                                {!! Form::text('menu_text', null, ['class' => 'form-control', 'id' => 'ddmenu_text']) !!}
                                            </div>


                                            <div class="form-group">
                                                {!! Form::label('ddmenu_active','Menu active:') !!}
                                                {!! Form::select('menu_active', array('1' => 'Yes', '0' => 'No'),
                                                null,
                                                array('id' => 'ddmenu_active', 'class' => 'form-control')) !!}
                                            </div>


                                            <div class="form-group">
                                                {!! Form::label('ddmenu_page_id','Link:') !!}
                                                <select name="menu_page_id" id="ddmenu_page_id" class="form-control">
                                                    <option value="0">Does not link to page</option>
                                                    @foreach(Tsawler\Vcms5\models\Page::orderBy('page_title', 'ASC')->get() as $item)
                                                        <option value="{!! $item->id !!}">{!! $item->page_title !!}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="ddmenu_url" class="control-label">URL</label>
                                                <input type="text" name="menu_url" id="ddmenu_url" class="form-control">
                                            </div>

                                            <input type="hidden" name="menu_item_id" id="ddmenu_item_id" value="0">
                                            <input type="hidden" name="parent_menu_item_id" id="dd_parent_menu_item_id"
                                                   value="0">
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                                <div class="tab-pane" id="ddplacement">
                                </div>
                            </div>
                        </div>

                        <input type='hidden' id="ddoutput" name="sortorder">
                    {!! Form::close() !!}

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left delbtn" onclick="deleteDDMenuItem()">Delete</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="$('#ddmenuItemForm').submit()">Save</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="menuItemModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Menu Item</h4>
                </div>
                <div class="modal-body" id="modalbody">

                    {!! Form::open(['url' => '/menu/savemenuitem', 'name' => 'menuItemForm',
                        'class' => 'form-horizontal',
                        'method' => 'post',
                        'id' => 'menuItemForm']) !!}

                        <div class="tabs">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#details">Details</a></li>
                                <li id="sortmenuitems"><a data-toggle="tab" href="#placement">Placement</a></li>
                            </ul>

                            <div class="tab-content">

                                <div class="tab-pane active" id="details">

                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">

                                            <!-- Menu_text form input -->
                                            <div class="form-group">
                                                {!! Form::label('menu_text','Menu text:') !!}
                                                {!! Form::text('menu_text', null, ['class' => 'form-control', 'id' => 'menu_text']) !!}
                                            </div>


                                            <div class="form-group">
                                                {!! Form::label('menu_active','Menu active:') !!}
                                                {!! Form::select('menu_active', array('1' => 'Yes', '0' => 'No'),
                                                null,
                                                array('id' => 'menu_active', 'class' => 'form-control')) !!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('has_children','Drop down list?') !!}
                                                {!! Form::select('has_children', array('1' => 'Yes', '0' => 'No'),
                                                null,
                                                array('id' => 'has_children', 'class' => 'form-control')) !!}
                                            </div>


                                            <div class="form-group">
                                                {!! Form::label('menu_page_id','Link:') !!}
                                                <select name="menu_page_id" id="menu_page_id" class="form-control">
                                                    <option value="0">Does not link to page</option>
                                                    @foreach(Tsawler\Vcms5\models\Page::orderBy('page_title', 'ASC')->get() as $item)
                                                        <option value="{!! $item->id !!}">{!! $item->page_title !!}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="menu_url" class="control-label">URL</label>
                                                <input type="text" name="menu_url" id="menu_url" class="form-control">
                                            </div>

                                            <input type="hidden" name="menu_item_id" id="menu_item_id" value="0">
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>

                                </div>

                                <div class="tab-pane" id="placement">

                                </div>
                                <!-- close tab pane -->
                            </div>
                        </div>
                        <input type='hidden' id="output" name="sortorder">
                    {!! Form::close() !!}

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left delbtn" onclick="deleteMenuItem()">Delete</button>
                    &nbsp;&nbsp;
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="$('#menuItemForm').submit()">Save</button>
                </div>
            </div>
        </div>
    </div>


    {!! Form::open(['url' => '/admin/deletemenuitem', 'name' => 'deletemenuitemform', 'id' => 'deletemenuitemform']) !!}
        <input type="hidden" name="deleteid" id="deleteid">
    {!! Form::close() !!}

    {!! Form::open(['url' => '/admin/deleteddmenuitem', 'name' => 'deletemenuitemform', 'id' => 'deleteddmenuitem']) !!}
        <input type="hidden" name="deleteid" id="deleteid">
    {!! Form::close() !!}

@endif

<script src="/vendor/vcms5/public-assets/admin/js/jquery-validate/jquery.validate.min.js"></script>
@if (Session::get('lang') == 'fr')
    <script type="text/javascript" src="/vendor/vcms5/public-assets/admin/js/jquery-validate/localization/messages_fr.min.js"></script>
@endif
@if (Session::get('lang') == 'es')
    <script type="text/javascript" src="/vendor/vcms5/public-assets/admin/js/jquery-validate/localization/messages_es.min.js"></script>
@endif
<script src="/vendor/vcms5/public-assets/admin/js/pnotify.custom.min.js"></script>
<script src="/vendor/vcms5/public-assets/admin/fullcal/lib/moment.min.js"></script>
<script>
    PNotify.prototype.options.styling = "fontawesome";
</script>
<script src="/vendor/vcms5/public-assets/admin/fullcal/fullcalendar.min.js"></script>
@if (Config::get('vcms5.use_fr'))
    @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
        <script src="/vendor/vcms5/public-assets/admin/fullcal/lang/fr-ca.js"></script>
    @endif
@endif
@if (Config::get('vcms5.use_es'))
    @if ((Session::has('lang')) && (Session::get('lang') == 'es'))
        <script src="/vendor/vcms5/public-assets/admin/fullcal/lang/es.js"></script>
    @endif
@endif
<script src="/vendor/vcms5/public-assets/admin/js/bootbox.min.js"></script>
<script src="/vendor/vcms5/public-assets/admin/js/bootstrap-datepicker.min.js"></script>

@if((Auth::check()) && (Auth::user()->access_level == 3))
    <script src="/vendor/vcms5/ck/ckeditor.js"></script>
    <script src="/vendor/vcms5/ck/adapters/jquery.js"></script>
    <script src="/vendor/vcms5/public-assets/admin/js/jquery.form.min.js"></script>
    <script src="/vendor/vcms5/public-assets/admin/js/jquery.contextMenu.min.js"></script>
    <script src="/vendor/vcms5/public-assets/admin/js/contextmenu/jquery.ui.position.js"></script>
    <script src="/vendor/vcms5/public-assets/admin/js/jquery.sortable.min.js"></script>

    <script>
        CKEDITOR.disableAutoInline = true;

        function statusMsg(responseText) {
            new PNotify({
                icon: false,
                type: 'success',
                text: responseText,
                close: true
            });
        }

        function showResponse(responseText, statusText, xhr, $form) {
            new PNotify({
                icon: false,
                type: 'success',
                text: responseText,
                close: true
            });
        }

        var editor;

        function makePageEditable(item) {
            if (($(".editablecontent").length != 0) || ($('.editable').length != 0)) {
                $("#postdate").addClass("hidden");
                $(".admin-hidden").addClass('admin-display').removeClass('admin-hidden');
                $(item).attr("onclick", "turnOffEditing(this)");
                $(item).html("Turn off editing");
                $(".editablecontent").attr("contenteditable", "true");
                $(".editablecontenttitle").attr("contenteditable", "true");
                $(".editablecontent").addClass("outlined");
                $(".editablecontenttitle").addClass("outlined");
                $("#old").val($("#editablecontent").html());
                $("#oldtitle").val($("#editablecontenttitle").html());

                $('.editable').attr('contenteditable', 'true');
                $('.editable').addClass('outlined');

                $(".editablefragment").addClass("outlined");
                $(".editablefragment").attr("contenteditable", "true");

                var editoroptions = {
                    toolbar: 'MiniToolbar',
                    allowedContent: true,
                    floatSpaceDockedOffsetX: 150
                }

                var elements = document.getElementsByClassName('editablecontent');
                for (var i = 0; i < elements.length; ++i) {
                    CKEDITOR.inline(elements[i], editoroptions);
                }

                var elements = document.getElementsByClassName('editablefragment');
                for (var i = 0; i < elements.length; ++i) {
                    CKEDITOR.inline(elements[i], editoroptions);
                }

                CKEDITOR.on('instanceLoaded', function (event) {
                    editor = event.editor;
                });
            } else if ($(".editablefragment").length != 0) {
                $(item).attr("onclick", "turnOffEditing(this)");
                $(item).html("Turn off editing");

                $("#oldcontent1").val($("#f1").html());
                $("#oldcontent2").val($("#f2").html());
                $("#oldcontent3").val($("#f3").html());
                $("#oldcontent4").val($("#f4").html());

                $(".admin-hidden").addClass('admin-display').removeClass('admin-hidden');

                $(".editablefragment").addClass("outlined");
                $(".editablefragment").attr("contenteditable", "true");
                var editoroptions = {
                    toolbar: 'MiniToolbar',
                    allowedContent: true,
                    floatSpaceDockedOffsetX: 150
                }
                var elements = document.getElementsByClassName('editablefragment');
                for (var i = 0; i < elements.length; ++i) {
                    CKEDITOR.inline(elements[i], editoroptions);
                }

                CKEDITOR.on('instanceLoaded', function (event) {
                    editor = event.editor;
                });
            } else {
                bootbox.alert("No editable content on this page!");
            }
        }

        function saveChanges() {
            var data = CKEDITOR.instances['editablecontent'].getData();
            // save the changed data
            $("#thedata").val(data);
            var options = {target: '#theeditmsg', success: showResponse};
            $("#savedata").unbind('submit').ajaxSubmit(options);
            $("#old").val('');
            turnOffEditing();
            return false;
        }

        function saveEditedPage() {
            // get the changed data;
            var data = $('#editablecontenttitle').html();
            $("#thetitledata").val(data);

            // get the changed data;
            var pagedata = editor.getData();
            // save the changed data
            $("#thedata").val(pagedata);

            var options = {target: '#theeditmsg', success: showResponse};
            $("#savetitledata").unbind('submit').ajaxSubmit(options);
            $("#oldtitle").val('');
            $("#old").val('');
            turnOffEditing();
            return false;
        }

        function saveEditedNews() {
            // get the changed data;
            var data = $('#editablecontenttitle').html();
            $("#thetitledata").val(data);

            // get the changed data;
            var pagedata = editor.getData();
            // save the changed data
            $("#thedata").val(pagedata);

            var options = {target: '#theeditmsg', success: showResponse};
            $("#savetitledata").unbind('submit').ajaxSubmit(options);
            $("#oldtitle").val('');
            $("#old").val('');
            turnOffEditing();
            return false;
        }

        function turnOffEditing(item) {
            var maxfrags = 5;
            for (name in CKEDITOR.instances) {
                CKEDITOR.instances[name].destroy()
            }
            $(".admin-display").addClass('admin-hidden').removeClass('admin-display');
            $("#postdate").removeClass("hidden");
            $(".menu-item").attr("onclick", "makePageEditable(this)");
            $(".menu-item").html("Edit content");
            $(".editablecontent").attr("contenteditable", "false");
            $(".editablecontenttitle").attr("contenteditable", "false");
            $(".editablecontenttitle").removeClass("outlined");
            $(".editablecontent").removeClass("outlined");
            $('.editable').attr('contenteditable', 'false');
            $('.editable').removeClass('outlined');
            if ($('#oldtitle').val() != '') {
                $("#editablecontenttitle").html($("#oldtitle").val());
            }
            if ($('#old').val() != '') {
                $(".editablecontent").html($("#old").val());
            }
            for (i = 1; i <= maxfrags; i++) {
                if ($("#oldcontent" + i).val() != 0) {
                    $("#f" + i).html($("#oldcontent" + i).val());
                }
            }

            $(".editablefragment").removeClass("outlined");
            $(".editablefragment").attr("contenteditable", "false");
        }

        function stub() {
            bootbox.alert("This functionality is not yet implemented!");
        }

        function saveEditedFragment(x) {
            var value = CKEDITOR.instances['f' + x].getData();
            $("#thedata" + x).val(value);
            if ($("#thetitledata" + x).length != 0) {
                $("#thetitledata" + x).val($("#thetitle" + x).html());
            }
            var options = {target: '#theeditmsg', success: showResponse};
            $("#savefrag" + x).unbind('submit').ajaxSubmit(options);
            $("#oldcontent" + x).val('');
            turnOffEditing();
            return false;
        }

        // start of ddmenu
        @if (Auth::user()->hasRole('menus'))
        $(function () {
            $.contextMenu({
                selector: '.ddmitem',
                callback: function (key, options) {
                    // get the id of the menu item
                    var id = $(this).data('ddmitem-id');
                    var mid = $(this).data('mitem-id')
                    // call ajax to get menu item details;
                    getDataForDDMenuItem(id, mid);
                    $("#ddplacement").removeClass("hidden");
                    $("#ddsortmenuitems").removeClass("hidden");
                    $("#dddeletebutton").removeClass("hidden");
                    $('#ddmenuItemModal').modal();
                },
                items: {
                    "edit": {name: " Edit", icon: ""}
                }
            });
        });


        function getDataForDDMenuItem(menu_item_id, parent_item_id) {
            var theHtml = "";
            $("#ddmenu_item_id").val(menu_item_id);
            $("#dd_parent_menu_item_id").val(parent_item_id);
            getDDSortableList(parent_item_id);
            $.ajax({
                type: 'GET',
                url: '/menu/ddmenujson',
                data: {id: menu_item_id},
                dataType: 'json',
                success: function (_data) {
                    var json = $.parseJSON(JSON.stringify(_data));
                    $("#ddmenu_text").val(json.menu_text);
                    $("#ddmenu_active").val(json.active);
                    $("#ddmenu_page_id").val(json.page_id);
                    $("#ddmenu_url").val(json.url);
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("Status: " + textStatus);
                    alert("Error: " + errorThrown);
                }
            });
        }

        function getDDSortableList(x) {

            $.ajax({
                type: 'GET',
                url: '/menu/ddsortitems',
                data: {id: x},
                dataType: 'html',
                success: function (_data) {
                    var theHtml = _data;
                    $("#ddplacement").html(theHtml);
                    var a = {};
                    $("#ddsortable li").each(function (i, el) {
                        a[$(el).data('id')] = $(el).index() + 1;
                    });
                    sorteda = JSON.stringify(a);
                    $("#ddoutput").val(sorteda);

                    $('#ddsortable').sortable().bind('sortupdate', function () {
                        var a = {};
                        $("#ddsortable li").each(function (i, el) {
                            a[$(el).data('id')] = $(el).index() + 1;
                        });
                        sorteda = JSON.stringify(a);
                        $("#ddoutput").val(sorteda);
                    });

                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("Status: " + textStatus);
                    alert("Error: " + errorThrown);
                }
            });
        }

        // end of ddmenu

        // start of menu

        $(function () {
            $.contextMenu({
                selector: '.mitem',
                callback: function (key, options) {
                    // get the id of the menu item
                    var id = $(this).data('mitem-id');
                    // call ajax to get menu item details;
                    getDataForMenuItem(id);
                },
                items: {
                    "edit": {name: " Edit", icon: ""}
                }
            });
        });

        function getDataForMenuItem(menu_item_id) {
            var theHtml = "";
            $("#menu_item_id").val(menu_item_id);
            getSortableList();
            $.ajax({
                type: 'GET',
                url: '/menu/menujson',
                data: {id: menu_item_id},
                dataType: 'json',
                success: function (_data) {
                    var json = $.parseJSON(JSON.stringify(_data));
                    $("#menu_text").val(json.menu_text);
                    $("#menu_active").val(json.active);
                    $("#menu_page_id").val(json.page_id);
                    $("#menu_url").val(json.url);
                    $("#has_children").val(json.has_children);
                    $("#placement").removeClass("hidden");
                    $("#sortmenuitems").removeClass("hidden");
                    $("#deletebutton").removeClass("hidden");
                    $(".delbtn").removeClass("hidden");
                    $('#menuItemModal').modal();
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("Status: " + textStatus);
                    alert("Error: " + errorThrown);
                }
            });
        }

        function getSortableList() {
            $.ajax({
                type: 'GET',
                url: '/menu/sortitems',
                dataType: 'html',
                success: function (_data) {
                    var theHtml = _data;
                    $("#placement").html(theHtml);
                    var a = {};
                    $("#sortable li").each(function (i, el) {
                        a[$(el).data('id')] = $(el).index() + 1;
                    });
                    sorteda = JSON.stringify(a);
                    $("#output").val(sorteda);

                    $('#sortable').sortable().bind('sortupdate', function () {
                        var a = {};
                        $("#sortable li").each(function (i, el) {
                            a[$(el).data('id')] = $(el).index() + 1;
                        });
                        sorteda = JSON.stringify(a);
                        $("#output").val(sorteda);
                    });

                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("Status: " + textStatus);
                    alert("Error: " + errorThrown);
                }
            });
        }

        // end of menu

        function addMenuItem() {
            $("#menu_text").val('');
            $("#menu_active").val(0);
            $("#menu_page_id").val(0);
            $("#menu_url").val('');
            $("#menu_item_id").val(0);
            $('#menuItemModal').modal();
            $('#deletebutton').addClass("hidden");
            $("#sortmenuitems").addClass("hidden");
            $("#placement").addClass("hidden");
            $(".delbtn").addClass("hidden");
        }

        function addDDMenuItem(x) {
            $("#ddmenu_text").val('');
            $("#ddmenu_active").val(0);
            $("#ddmenu_page_id").val(0);
            $("#ddmenu_url").val('');
            $("#ddmenu_item_id").val(0);
            $("#ddsortmenuitems").addClass("hidden");
            $("#ddplacement").addClass("hidden");
            $('#ddmenuItemModal').modal();
            $("#dddeletebutton").addClass("hidden");
            $("#dd_parent_menu_item_id").val(x);
            $(".delbtn").addClass("hidden");
        }

        function deleteMenuItem() {
            bootbox.confirm("Are you sure?", function (result) {
                if (result == true) {
                    $("#deleteid").val($("#menu_item_id").val())
                    $("#deletemenuitemform").submit();
                }
            });
        }

        function deleteDDMenuItem() {
            bootbox.confirm("Are you sure?", function (result) {
                if (result == true) {
                    $("#dddeleteid").val($("#ddmenu_item_id").val())
                    $("#deleteddmenuitemform").submit();
                }
            });
        }
        @endif

        $(document).ready(function () {

                    $('#ddmenuItemModal').on('hidden', function () {
                        $("#ddplacement").html('');
                    });

                    $('#menuItemModal').on('hidden', function () {
                        $("#placement").html('');
                    });

                    $("#menuItemForm").validate({
                        rules: {
                            verify_email: {
                                required: true,
                                equalTo: "#email",
                                email: true
                            }
                        },
                        highlight: function (element) {
                            $(element).closest('.control-group').addClass('error');
                        },
                        unhighlight: function (element) {
                            $(element).closest('.control-group').removeClass('error');
                            $(element).closest('.control-group').addClass('success');
                        },
                        errorElement: 'span',
                        errorClass: 'help-inline',
                        errorPlacement: function (error, element) {
                            error.insertAfter(element.parent());
                        }
                    });
                    $("#ddmenuItemForm").validate({
                        rules: {
                            verify_email: {
                                required: true,
                                equalTo: "#email",
                                email: true
                            }
                        },
                        highlight: function (element) {
                            $(element).closest('.control-group').addClass('error');
                        },
                        unhighlight: function (element) {
                            $(element).closest('.control-group').removeClass('error');
                            $(element).closest('.control-group').addClass('success');
                        },
                        errorElement: 'span',
                        errorClass: 'help-inline',
                        errorPlacement: function (error, element) {
                            error.insertAfter(element.parent());
                        }
                    });
                });

        function savePostChanges() {
            // save the changed data
            var data = $('#editablecontent').html();
            $("#content").val(data);
            $("#old").val('');

            // get the changed data;
            var titledata = $('#editablecontenttitle').html();
            $("#title").val(titledata);
            var options = {target: '#theeditmsg', success: showResponse};
            $("#savetitledata").unbind('submit').ajaxSubmit(options);
            $("#oldtitle").val('');
            return false;
        }
        function deletePost() {
            var r = confirm("Are you sure you want to delete this post?");
            if (r) {
                $("#deleteform").submit();
            } else {
                return false;
            }
        }
    </script>
@endif