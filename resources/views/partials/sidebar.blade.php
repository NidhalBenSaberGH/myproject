@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

             

            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('quickadmin.qa_dashboard')</span>
                </a>
            </li>

            @can('user_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>@lang('quickadmin.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('role_access')
                    <li>
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span>@lang('quickadmin.roles.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('user_access')
                    <li>
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user"></i>
                            <span>@lang('quickadmin.users.title')</span>
                        </a>
                    </li>@endcan
                    
                </ul>
            </li>@endcan
            
            @can('generated_report_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i>
                    <span>@lang('quickadmin.generated-reports.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('video_access')
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-video-camera"></i>
                            <span>@lang('quickadmin.videos.title')</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            @can('view_access')
                            <li>
                                <a href="{{ route('admin.views.index') }}">
                                    <i class="fa fa-eye"></i>
                                    <span>@lang('quickadmin.views.title')</span>
                                </a>
                            </li>@endcan
                            
                            @can('like_access')
                            <li>
                                <a href="{{ route('admin.likes.index') }}">
                                    <i class="fa fa-thumbs-up"></i>
                                    <span>@lang('quickadmin.likes.title')</span>
                                </a>
                            </li>@endcan

                             @can('dislike_access')
                             <li>
                                <a href="{{ route('admin.dislikes.index') }}">
                                    <i class="fa fa-thumbs-down"></i>
                                    <span>@lang('quickadmin.dislikes.title')</span>
                                </a>
                             </li>@endcan

                             @can('comment_total_access')
                             <li>
                                <a href="{{ route('admin.comment_total.index') }}">
                                    <i class="fa fa-comments"></i>
                                    <span>@lang('quickadmin.comment_total.title')</span>
                                </a>
                             </li>@endcan

                             @can('categories_access')
                             <li>
                                <a href="{{ route('admin.categories.index') }}">
                                    <i class="fa fa-list-alt"></i>
                                    <span>@lang('quickadmin.categories.title')</span>
                                </a>
                             </li>@endcan

                             @can('channels_access')
                             <li>
                                <a href="{{ route('admin.channels.index') }}">
                                    <i class="fa fa-youtube"></i>
                                    <span>@lang('quickadmin.channel.title')</span>
                                </a>
                             </li>@endcan

                        </ul>
                    </li>@endcan
                </ul>

                <ul class="treeview-menu">
                    @can('comment_access')
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-comment"></i>
                                <span>@lang('quickadmin.comment.title')</span>
                                <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            </a>
                            <ul class="treeview-menu">
                                @can('comment_likes_access')
                                    <li>
                                        <a href="{{ route('admin.comment_likes.index') }}">
                                            <i class="fa fa-thumbs-up"></i>
                                            <span>@lang('quickadmin.comment_likes.title')</span>
                                        </a>
                                    </li>@endcan

                                @can('channels_access')
                                    <li>
                                        <a href="{{ route('admin.comment_replies.index') }}">
                                            <i class="fa fa-reply-all"></i>
                                            <span>@lang('quickadmin.comment_replies.title')</span>
                                        </a>
                                    </li>@endcan

                            </ul>
                        </li>@endcan
                </ul>


            </li>@endcan

            <li>@can('upload_access')
                <a href="{{ route('admin.upload.create') }}">
                    <i class="fa fa-upload"></i>
                    <span class="title">@lang('quickadmin.upload.title')</span>
                </a>@endcan
            </li>

            <li>@can('jobs_access')
                    <a href="{{ route('admin.jobs.index') }}">
                        <i class="fa fa-tasks"></i>
                        <span class="title">@lang('quickadmin.jobs.title')</span>
                    </a>@endcan
            </li>

            

            



            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">@lang('quickadmin.qa_change_password')</span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.qa_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>

