      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">{{Auth::user()->name}}</p>
          <p class="app-sidebar__user-designation">Record</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item dash" href="{{url('/')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        
        <li><a class="app-menu__item" href="charts.html"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Requests</span></a></li>

        <li><a class="app-menu__item" href="charts.html"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Payments</span></a></li>

        <li class="treeview pat"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Patients</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item search" href="{{route('searchpatient')}}"><i class="icon fa fa-circle-o"></i> Search Patients</a></li>
            <li><a class="treeview-item addpat" href="{{route('patient')}}"><i class="icon fa fa-circle-o"></i> Patients</a></li>
            <li><a class="treeview-item addpat" href="{{route('addpatient')}}"><i class="icon fa fa-circle-o"></i> New Patient</a></li>
          </ul>
        </li>

        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Signature </span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="blank-page.html"><i class="icon fa fa-circle-o"></i> Signatures</a></li>
            <li><a class="treeview-item" href="page-login.html"><i class="icon fa fa-circle-o"></i> Add Signature</a></li>
          </ul>
        </li>

        <li class="treeview user"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">User Managemnt</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item alluser" href="form-components.html"><i class="icon fa fa-circle-o"></i> Users</a></li>
            <li><a class="treeview-item aduser" href="form-custom.html"><i class="icon fa fa-circle-o"></i> Add User</a></li>
            <li><a class="treeview-item allroles" href="form-samples.html"><i class="icon fa fa-circle-o"></i> Roles</a></li>
            <li><a class="treeview-item adroles" href="form-notifications.html"><i class="icon fa fa-circle-o"></i> Add Role</a></li>
          </ul>
        </li>
        

        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Ticket System</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="blank-page.html"><i class="icon fa fa-circle-o"></i> Ticket</a></li>
            <li><a class="treeview-item" href="page-login.html"><i class="icon fa fa-circle-o"></i> Raise a Ticket</a></li>
          </ul>
        </li>
      </ul>