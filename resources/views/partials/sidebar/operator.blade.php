<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-item {{ Route::currentRouteName() == 'operator.index' ? 'active' : '' }} ">
            <a href="{{ route('operator.index') }}" class='sidebar-link'>
                <i class="bi bi-house-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="sidebar-item {{ Route::currentRouteName() == 'operator.schedule' ? 'active' : '' }}  ">
            <a href="{{ route('operator.schedule') }}" class='sidebar-link'>
                <i class="bi bi-calendar-date-fill"></i>
                <span>Schedule</span>
            </a>
        </li>

        

        <li class="sidebar-item {{ Route::currentRouteName() == 'operator.profile.messages' ? 'active' : '' }}  ">
            <a href="{{ route('operator.profile.messages') }}" class='sidebar-link'>
                <i class="bi bi-chat-left-text-fill"></i>
                <span>Messages </span> 
                @if(Auth::user()->messages->where('is_read', 0)->count() != 0)
                <span id="message-list-count" class="badge bg-danger">{{ Auth::user()->messages->where('is_read', 0)->count() }}</span>
                @endif
                {{-- Rework --}}
            </a>
        </li>

        <li class="sidebar-item {{ Route::currentRouteName() == 'operator.profile' ? 'active' : '' }}  ">
            <a href="{{ route('operator.profile') }}" class='sidebar-link'>
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
