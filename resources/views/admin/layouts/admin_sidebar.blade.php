<ul class="nav">
    @if(Auth::user()->user_type == 1)
        <li class="nav-item">
            <a class="nav-link" href="{{url('super-admin')}}" aria-expanded="false" aria-controls="ui-basic">
                <div class="sidebar-icon">
                    <i class="bi bi-speedometer"></i>
                    <span class="menu-title">Dashboard</span>
                </div>
            </a>
        </li>
        <li class="nav-item @if(Request::segment(2) == 'posts') active @endif">
            <a class="nav-link" href="{{url('super-admin/posts')}}" aria-expanded="false" aria-controls="ui-basic">
                <div class="sidebar-icon">
                    <i class="bi bi-gear"></i>
                    <span class="menu-title">Posts</span>
                </div>
            </a>
        </li>
        <li class="nav-item @if(Request::segment(2) == 'news') active @endif">
            <a class="nav-link" href="{{url('super-admin/news')}}" aria-expanded="false" aria-controls="ui-basic">
                <div class="sidebar-icon">
                    <i class="bi bi-sliders"></i>
                    <span class="menu-title">News</span>
                </div>
            </a>
        </li>

        <li class="nav-item @if(Request::segment(2) == 'categories') active @endif">
            <a class="nav-link" href="{{url('super-admin/categories')}}" aria-expanded="false" aria-controls="ui-basic">
                <div class="sidebar-icon">
                    <i class="bi bi-sliders"></i>
                    <span class="menu-title">Category</span>
                </div>
            </a>
        </li>
        @elseif(Auth::user()->user_type == 2)
        <li class="nav-item">
            <a class="nav-link" href="{{url('super-admin')}}" aria-expanded="false" aria-controls="ui-basic">
                <div class="sidebar-icon">
                    <i class="bi bi-speedometer"></i>
                    <span class="menu-title">Dashboard</span>
                </div>
            </a>
        </li>
        <li class="nav-item @if(Request::segment(2) == 'news') active @endif">
            <a class="nav-link" href="{{url('super-admin/news')}}" aria-expanded="false" aria-controls="ui-basic">
                <div class="sidebar-icon">
                    <i class="bi bi-sliders"></i>
                    <span class="menu-title">News</span>
                </div>
            </a>
        </li>

        @elseif(Auth::user()->user_type == 3)
        <li class="nav-item">
            <a class="nav-link" href="{{url('super-admin')}}" aria-expanded="false" aria-controls="ui-basic">
                <div class="sidebar-icon">
                    <i class="bi bi-speedometer"></i>
                    <span class="menu-title">Dashboard</span>
                </div>
            </a>
        </li>
        <li class="nav-item @if(Request::segment(2) == 'posts') active @endif">
            <a class="nav-link" href="{{url('super-admin/posts')}}" aria-expanded="false" aria-controls="ui-basic">
                <div class="sidebar-icon">
                    <i class="bi bi-gear"></i>
                    <span class="menu-title">Posts</span>
                </div>
            </a>
        </li>
    @endif



</ul>


