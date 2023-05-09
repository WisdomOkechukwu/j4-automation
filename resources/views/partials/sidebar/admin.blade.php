<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item {{ Route::currentRouteName() == 'admin.index' ? 'active' : '' }} ">
            <a href="{{ route('admin.index') }}" class='sidebar-link'>
                <i class="bi bi-house-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="sidebar-item {{ Route::currentRouteName() == 'admin.user.schedules' ? 'active' : '' }}  ">
            <a href="{{ route('admin.user.schedules') }}" class='sidebar-link'>
                <i class="bi bi-calendar-date-fill"></i>
                <span>Schedule</span>
            </a>
        </li>
        
         <li class="sidebar-item {{ Route::currentRouteName() == 'admin.assign.tickets' ? 'active' : '' }}  ">
            <a href="{{ route('admin.assign.tickets') }}" class='sidebar-link'>
                <i class="bi bi-graph-up"></i>
                <span>Assign Tickets</span>
                {{-- Rework --}}
            </a>
        </li>

        <li class="sidebar-item {{ Route::currentRouteName() == 'admin.leave.tracker' ? 'active' : '' }}  ">
            <a href="{{ route('admin.leave.tracker') }}" class='sidebar-link'>
                <i class="bi bi-file-earmark-fill"></i>
                <span>Leave Tracker</span>
                {{-- Rework --}}
            </a>
        </li>

        <li class="sidebar-item {{ Route::currentRouteName() == 'admin.users' ? 'active' : '' }}  ">
            <a href="{{ route('admin.users') }}" class='sidebar-link'>
                <i class="bi bi-people-fill"></i>
                <span>Manage User's</span>
            </a>
        </li>

        <li class="sidebar-item {{ Route::currentRouteName() == 'admin.messages' ? 'active' : '' }}  ">
            <a href="{{ route('admin.messages') }}" class='sidebar-link'>
                <i class="bi bi-chat-left-text-fill"></i>
                <span>Messages </span>
                @if (Auth::user()->messages->where('is_read', 0)->count() != 0)
                    <span id="message-list-count"
                        class="badge bg-danger">{{ Auth::user()->messages->where('is_read', 0)->count() }}</span>
                @endif
                {{-- Rework --}}
            </a>
        </li>

        <li class="sidebar-item {{ Route::currentRouteName() == 'admin.user.operator.overview' ? 'active' : '' }}  ">
            <a href="{{ route('admin.user.operator.overview') }}" class='sidebar-link'>
                <i class="bi bi-clock-history"></i>
                <span>Operator's Overview</span>
            </a>
        </li>

        <li
            class="sidebar-item {{ Route::currentRouteName() == 'admin.user.field.worker.overview' ? 'active' : '' }}  ">
            <a href="{{ route('admin.user.field.worker.overview') }}" class='sidebar-link'>
                <i class="bi bi-clock-history"></i>
                <span>Field Worker's Overview</span>
            </a>
        </li>

        <li class="sidebar-item {{ Route::currentRouteName() == 'admin.user-profile' ? 'active' : '' }}  ">
            <a href="{{ route('admin.user-profile') }}" class='sidebar-link'>
                <i class="bi bi-person-circle"></i>
                <span>My Profile</span>
                {{-- Rework --}}
            </a>
        </li>

        <li class="sidebar-item {{ Route::currentRouteName() == 'logout' ? 'active' : '' }}  ">
            <a href="#" class="sidebar-link"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </a>
        </li>
    </ul>
</div>



<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
