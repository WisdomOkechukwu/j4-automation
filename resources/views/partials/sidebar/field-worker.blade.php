<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-item {{ Route::currentRouteName() == 'field.worker.index' ? 'active' : '' }} ">
            <a href="{{ route('field.worker.index') }}" class='sidebar-link'>
                <i class="bi bi-house-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="sidebar-item {{ Route::currentRouteName() == 'field.worker.schedule' ? 'active' : '' }}  ">
            <a href="{{ route('field.worker.schedule') }}" class='sidebar-link'>
                <i class="bi bi-calendar-date-fill"></i>
                <span>Schedule</span>
            </a>
        </li>

        <li class="sidebar-item {{ Route::currentRouteName() == 'field.worker.messages' ? 'active' : '' }}  ">
            <a href="{{ route('field.worker.messages') }}" class='sidebar-link'>
                <i class="bi bi-chat-left-text-fill"></i>
                <span>Messages </span> 
                @if(Auth::user()->messages->where('is_read', 0)->count() != 0)
                <span id="message-list-count" class="badge bg-danger">{{ Auth::user()->messages->where('is_read', 0)->count() }}</span>
                @endif
            </a>
        </li>

        <li class="sidebar-item {{ Route::currentRouteName() == 'field.worker.profile' ? 'active' : '' }}  ">
            <a href="{{ route('field.worker.profile') }}" class='sidebar-link'>
                <i class="bi bi-person-circle"></i>
                <span>My Profile</span> 
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

