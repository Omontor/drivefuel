<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li>
            <select class="searchable-field form-control">

            </select>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('audit_log_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.audit-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.auditLog.title') }}
                </a>
            </li>
        @endcan
        @can('client_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/clients*") ? "c-show" : "" }} {{ request()->is("admin/brands*") ? "c-show" : "" }} {{ request()->is("admin/projects*") ? "c-show" : "" }} {{ request()->is("admin/questionaries*") ? "c-show" : "" }} {{ request()->is("admin/trivia*") ? "c-show" : "" }} {{ request()->is("admin/answers*") ? "c-show" : "" }} {{ request()->is("admin/groups*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.clientManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('client_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.clients.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/clients") || request()->is("admin/clients/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-building c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.client.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('brand_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.brands.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/brands") || request()->is("admin/brands/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-code-branch c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.brand.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('project_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.projects.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/projects") || request()->is("admin/projects/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-window-restore c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.project.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('questionarie_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.questionaries.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/questionaries") || request()->is("admin/questionaries/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-list-ol c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.questionarie.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('trivia_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.trivia.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/trivia") || request()->is("admin/trivia/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-question c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.trivia.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('answer_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.answers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/answers") || request()->is("admin/answers/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-comments c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.answer.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('group_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.groups.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/groups") || request()->is("admin/groups/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-users-cog c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.group.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('event_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/routes*") ? "c-show" : "" }} {{ request()->is("admin/events*") ? "c-show" : "" }} {{ request()->is("admin/locations*") ? "c-show" : "" }} {{ request()->is("admin/witnesses*") ? "c-show" : "" }} {{ request()->is("admin/witnessposts*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.eventManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('route_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.routes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/routes") || request()->is("admin/routes/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-map c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.route.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('event_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.events.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/events") || request()->is("admin/events/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-calendar-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.event.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('location_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.locations.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/locations") || request()->is("admin/locations/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-map-pin c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.location.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('witness_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.witnesses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/witnesses") || request()->is("admin/witnesses/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-camera c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.witness.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('witnesspost_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.witnessposts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/witnessposts") || request()->is("admin/witnessposts/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.witnesspost.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('check_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/checkins*") ? "c-show" : "" }} {{ request()->is("admin/checkouts*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-location-arrow c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.check.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('checkin_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.checkins.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/checkins") || request()->is("admin/checkins/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-sign-in-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.checkin.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('checkout_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.checkouts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/checkouts") || request()->is("admin/checkouts/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-sign-out-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.checkout.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/user-alerts*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_alert_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.user-alerts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-bell c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.userAlert.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('communication_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/blogs*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.communication.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('blog_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.blogs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/blogs") || request()->is("admin/blogs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-rss c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.blog.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('capacitacion_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/courses*") ? "c-show" : "" }} {{ request()->is("admin/lessons*") ? "c-show" : "" }} {{ request()->is("admin/tests*") ? "c-show" : "" }} {{ request()->is("admin/questions*") ? "c-show" : "" }} {{ request()->is("admin/question-options*") ? "c-show" : "" }} {{ request()->is("admin/test-results*") ? "c-show" : "" }} {{ request()->is("admin/test-answers*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-book-open c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.capacitacion.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('course_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.courses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/courses") || request()->is("admin/courses/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.course.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('lesson_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.lessons.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/lessons") || request()->is("admin/lessons/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.lesson.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('test_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.tests.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/tests") || request()->is("admin/tests/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.test.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('question_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.questions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/questions") || request()->is("admin/questions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.question.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('question_option_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.question-options.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/question-options") || request()->is("admin/question-options/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.questionOption.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('test_result_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.test-results.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/test-results") || request()->is("admin/test-results/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.testResult.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('test_answer_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.test-answers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/test-answers") || request()->is("admin/test-answers/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.testAnswer.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.systemCalendar") }}" class="c-sidebar-nav-link {{ request()->is("admin/system-calendar") || request()->is("admin/system-calendar/*") ? "c-active" : "" }}">
                <i class="c-sidebar-nav-icon fa-fw fas fa-calendar">

                </i>
                {{ trans('global.systemCalendar') }}
            </a>
        </li>
        @php($unread = \App\Models\QaTopic::unreadCount())
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "c-active" : "" }} c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fa-fw fa fa-envelope">

                    </i>
                    <span>{{ trans('global.messages') }}</span>
                    @if($unread > 0)
                        <strong>( {{ $unread }} )</strong>
                    @endif

                </a>
            </li>
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li class="c-sidebar-nav-item">
                <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
    </ul>

</div>