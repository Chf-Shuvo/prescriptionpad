<div class="left-side-bar">
  <div class="brand-logo">
    <a href="{{ route('doctor.dashboard') }}" data-color="#100F0F">
      {{ env('APP_NAME') }}
    </a>
    <div class="close-sidebar" data-toggle="left-sidebar-close">
      <i class="ion-close-round"></i>
    </div>
  </div>
  <div class="menu-block customscroll">
    <div class="sidebar-menu">
      <ul id="accordion-menu">
        <li>
          <a href="{{ route('doctor.appointment.list') }}" class="dropdown-toggle no-arrow {{ Request::routeIs('doctor.appointment.*') ? 'active' : '' }}">
            <i class="micon dw dw-notepad-1"></i> <span class="mtext">My Appointments</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>
