<div class="left-side-bar">
  <div class="brand-logo">
    <a href="{{ route('admin.dashboard') }}" data-color="#100F0F">
      {{ env('APP_NAME') }}
    </a>
    <div class="close-sidebar" data-toggle="left-sidebar-close">
      <i class="ion-close-round"></i>
    </div>
  </div>
  <div class="menu-block customscroll">
    <div class="sidebar-menu">
      <ul id="accordion-menu">
        <li class="dropdown {{ Request::routeIs('admin.manage.*') ? 'show' : '' }}">
          <a href="javascript:;" class="dropdown-toggle">
            <i class="micon dw dw-settings1"></i><span class="mtext">Settings</span>
          </a>
          <ul class="submenu">
            <li><a href="{{ route('admin.manage.index') }}" class="{{ Request::routeIs('admin.manage.*') ? 'active' : '' }}">Admins</a></li>
          </ul>
        </li>
        <li>
          <a href="{{ route('admin.patient.index') }}" class="dropdown-toggle no-arrow {{ Request::routeIs('admin.patient.*') ? 'active' : '' }}">
            <i class="micon dw dw-user-11"></i> <span class="mtext">Patients</span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.doctor.index') }}" class="dropdown-toggle no-arrow {{ Request::routeIs('admin.doctor.*') ? 'active' : '' }}">
            <i class="micon dw dw-first-aid-kit"></i> <span class="mtext">Doctors</span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.pharmacy.index') }}" class="dropdown-toggle no-arrow {{ Request::routeIs('admin.pharmacy.*') ? 'active' : '' }}">
            <i class="micon dw dw-briefcase"></i> <span class="mtext">Pharmacies</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>
