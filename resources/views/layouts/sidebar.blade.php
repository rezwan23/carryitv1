<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      @auth 

      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="/uploads/{{auth()->user()->image??'profile.png'}}" width="60" height="60" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">{{auth()->user()->name}}</p>
        </div>
      </div>
      @endauth
      <ul class="app-menu">
        @auth
        <li><a class="app-menu__item" href="{{route('dashboard')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        @endauth
        <li><a class="app-menu__item" href="{{route('carrier-post.create')}}"><i class="app-menu__icon fa fa-car"></i><span class="app-menu__label">Create Post</span></a></li>
        <li><a class="app-menu__item" href="{{route('carrier-post.index')}}"><i class="app-menu__icon fa fa-snowflake-o"></i><span class="app-menu__label">My Posts</span></a></li>
        <li><a class="app-menu__item" href="{{route('request-post.create')}}"><i class="app-menu__icon fa fa-id-badge"></i><span class="app-menu__label">Create Request</span></a></li>
        <li><a class="app-menu__item" href="{{route('request-post.index')}}"><i class="app-menu__icon fa fa-grav"></i><span class="app-menu__label">My Requests</span></a></li>
        <li><a class="app-menu__item" href="{{route('search')}}"><i class="app-menu__icon fa fa-search"></i><span class="app-menu__label">Search</span></a></li>
        <li><a class="app-menu__item" href="{{route('profile')}}"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Profile</span></a></li>
        
        <!-- <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">UI Elements</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="bootstrap-components.html"><i class="icon fa fa-circle-o"></i> Bootstrap Elements</a></li>
          </ul>
        </li>
        <li><a class="app-menu__item" href="charts.html"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Charts</span></a></li> -->
      </ul>
    </aside>