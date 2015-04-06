<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="clear">
                        <span class="block m-t-xs text-center">
                            <span>
                                @if ((Auth::user()->prefs) && (Auth::user()->prefs->avatar != null))
                                    <img alt="image" class="img-circle"
                                         src="/vendor/vcms5/assets/avatars/{!! Auth::user()->prefs->avatar !!}" />
                                @else
                                    <img alt="image" class="img-circle" src="/vendor/vcms5/assets/img/avatar.png" />
                                @endif
                            </span>
                            <br>
                            <strong class="font-bold">
                                {!! Auth::user()->first_name !!} {!! Auth::user()->last_name !!}
                            </strong>
                        </span>
                        <span class="text-muted text-xs block text-center">
                            Account <b class="caret"></b>
                        </span>
                    </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="/admin/users/profile">Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="/admin/logout">Logout</a></li>
                    </ul>
                </div>
            </li>

            @if (Request::segment(2) == 'dashboard')
                <li class='active'>
            @else
                <li>
            @endif
                <a href="/admin/dashboard"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span>
                    <span class="fa arrow"></span></a>
            </li>

            @if (Auth::user()->hasRole('pages'))
                @if (Request::segment(2) == 'page')
                    <li class='active'>
                @else
                    <li>
                @endif
                    <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Site Pages</span><span
                                class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="/admin/page/all-pages">All Pages</a></li>
                        <li><a href="/admin/page/page?id=0">Add Page</a></li>
                    </ul>
                </li>
            @endif

            @if (Auth::user()->hasRole('events'))
                @if (Request::segment(2) == 'calendar')
                    <li class='active'>
                @else
                    <li>
                @endif
                    <a href=""><i class="fa fa-calendar"></i> <span class="nav-label">Events</span><span
                                class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="/admin/calendar">Calendar</a></li>
                    </ul>
                </li>
            @endif

            @if (Auth::user()->hasRole('faqs'))
                @if (Request::segment(2) == 'faqs')
                    <li class='active'>
                @else
                    <li>
                @endif
                    <a href=""><i class="fa fa-question"></i> <span class="nav-label">FAQs</span><span
                                class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="/admin/faqs/all-faqs">All FAQs</a></li>
                        <li><a href="/admin/faqs/faq?id=0">Add FAQ</a></li>
                    </ul>
                </li>
            @endif

            @if (Auth::user()->hasRole('news'))
                @if (Request::segment(2) == 'news')
                    <li class='active'>
                @else
                    <li>
                @endif
                    <a href=""><i class="fa fa-newspaper-o"></i> <span class="nav-label">News</span><span
                                class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="/admin/news/all-newsitems">All News Items</a></li>
                        <li><a href="/admin/news/newsitem?id=0">Add News Item</a></li>
                    </ul>
                </li>
            @endif

            @if (Auth::user()->hasRole('blogs'))
                @if (Request::segment(2) == 'blogs')
                    <li class='active'>
                @else
                    <li>
                @endif
                <a href="#"><i class="fa fa-pencil"></i> <span class="nav-label">Blogs</span><span
                            class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="/admin/blogs/all-blogs">All Blogs</a></li>
                        <li><a href="/admin/blogs/blog?id=0">Add Blog</a></li>
                        <li><a href="/admin/blogs/posts">Blog Posts</a></li>
                    </ul>
                </li>
            @endif

            @if (Auth::user()->hasRole('galleries'))
                @if (Request::segment(2) == 'galleries')
                    <li class='active'>
                @else
                    <li>
                @endif
                    <a href="#"><i class="fa fa-picture-o"></i> <span
                                class="nav-label">Gallery</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="/admin/galleries/all-galleries">All Galleries</a></li>
                        <li><a href="/admin/galleries/gallery?id=0">Add Gallery</a></li>
                    </ul>
                </li>
            @endif

            @if (Auth::user()->hasRole('users'))
                @if (Request::segment(2) == 'users')
                    <li class='active'>
                @else
                    <li>
                @endif
                    <a href="#"><i class="fa fa-users"></i> <span
                                class="nav-label">Users</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="/admin/users/all-users">All Users</a></li>
                        <li><a href="/admin/users/user?id=0">Add User</a></li>
                    </ul>
                </li>
            @endif

            <li>
                <a href="/"><i class="fa fa-external-link"></i> <span class="nav-label">Public Site</span>
                    <span class="fa arrow"></span></a>
            </li>

        </ul>

    </div>
</nav>