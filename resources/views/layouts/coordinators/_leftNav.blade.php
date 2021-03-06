<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <div class="user-info">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{ auth()->user()->name }}</a>
                </div>

                <p class="text-muted m-0"><i class="fa fa-dot-circle-o text-success"></i> Coordinator</p>
            </div>
        </div>
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect"><i class="ti-home"></i><span> Dashboard </span></a>
                </li>

                <li>
                    <a href="{{ route('coordinatorProfile.index') }}" class="waves-effect"><i class="ti-home"></i><span> Profile </span></a>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-files"></i><span> Class Schedule </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('schedule.index') }}">List</a></li>
                        <li><a href="{{ route('coordinator.classSchedule.view') }}">View</a></li>
                        <li><a href="{{ route('schedule.create') }}">Create New</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>