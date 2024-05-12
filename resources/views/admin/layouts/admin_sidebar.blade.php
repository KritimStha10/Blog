<ul class="nav">
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
    <li class="nav-item @if(Request::segment(2) == 'sliders') active @endif">
        <a class="nav-link" href="{{url('super-admin/sliders')}}" aria-expanded="false" aria-controls="ui-basic">
            <div class="sidebar-icon">
                <i class="bi bi-sliders"></i>
                <span class="menu-title">Sliders</span>
            </div>
        </a>
    </li>
    


</ul>


