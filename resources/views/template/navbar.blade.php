  <div class="header">
    <div class="header-left">
      <div class="menu-icon bi bi-list"></div>
    </div>
    <div class="header-right">
      <div class="user-notification">
        <div class="dropdown">
          <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
            <i class="icon-copy dw dw-notification"></i>
            <span class="badge notification-active"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <div class="notification-list mx-h-350 customscroll">
              <ul>
                <li>
                  <a href="#">
                    <img src="#" alt="" />
                    <h3>John Doe</h3>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipisicing
                      elit, sed...
                    </p>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="user-info-dropdown">
        <div class="dropdown">
          <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
            <span class="user-icon">
              <img src="#" alt="" />
            </span>
            <span class="user-name">
              @if (auth()->guard('doctor')->check())
                {{ auth('doctor')->user()->first_name }}
              @elseif (auth()->guard('admin')->check())
                {{ auth('admin')->user()->last_name }}
              @elseif (auth()->guard('pharmacy')->check())
                {{ auth('pharmacy')->user()->name }}
              @else
                {{ auth()->user()->last_name }}
              @endif
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
            @if (auth()->guard('doctor')->check())
              <a class="dropdown-item" href="{{ route('doctor.profile', auth()->user()->id) }}"><i class="dw dw-user1"></i> Profile</a>
            @elseif (auth()->guard('admin')->check())
              <a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Profile</a>
            @elseif (auth()->guard('pharmacy')->check())
              <a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Profile</a>
            @else
              <a class="dropdown-item" href="{{ route('patient.profile', auth()->user()->id) }}"><i class="dw dw-user1"></i> Profile</a>
            @endif

            @if (auth()->guard('doctor')->check())
              <a class="dropdown-item" href="{{ route('doctor.logout') }}"><i class="dw dw-logout"></i> Log Out</a>
            @elseif (auth()->guard('admin')->check())
              <a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="dw dw-logout"></i> Log Out</a>
            @elseif (auth()->guard('pharmacy')->check())
              <a class="dropdown-item" href="{{ route('pharmacy.logout') }}"><i class="dw dw-logout"></i> Log Out</a>
            @else
              <a class="dropdown-item" href="{{ route('logout') }}"><i class="dw dw-logout"></i> Log Out</a>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
