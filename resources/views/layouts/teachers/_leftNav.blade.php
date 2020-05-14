<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <div class="user-info">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{ auth()->user()->name }}</a>
                </div>

                <p class="text-muted m-0"><i class="fa fa-dot-circle-o text-success"></i> Teacher</p>
            </div>
        </div>
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ route('teacher.dashboard') }}" class="waves-effect"><i class="ti-home"></i><span> Dashboard </span></a>
                </li>

                <li>
                    <a href="{{ route('teacherProfile.index') }}" class="waves-effect"><i class="ti-home"></i><span> Profile </span></a>
                </li>

                {{-- <li>
                    <a href="{{ route('teacher.schedule.index') }}" class="waves-effect"><i class="ti-home"></i><span> Schedule </span></a>
                </li> --}}
                <li>
                    <a href="{{ route('teacher.schedule.view') }}" target="_blank" class="waves-effect"><i class="ti-calendar"></i><span> View Class Routine </span></a>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>