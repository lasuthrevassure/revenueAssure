
  <div class="main-navbar">
    <nav class="navbar navbar-light bg-white flex-md-nowrap align-items-stretch">
      <a href="" class="nav-brand w-100">
          <div class="d-table m-auto">
              <p>LRA</p>
          </div>
      </a>
      <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
        <i class="material-icons">&#xE5C4;</i>
      </a>
    </nav>
  </div>

  <div class="nav-wrapper">
    <ul class="nav flex-column">
      <li class="nav-item mt-5 mb-2">
        <a class="nav-link dash" href="{{route('home')}}">
          <img src="{{asset('assets/image/dashboard.svg')}}" class="pr-2">
          <span>Dashboard</span>
        </a>
        <!-- 1 -->
      </li>
      <li class="nav-item mb-2">
        <a class="nav-link request" href="{{route('requests')}}">
          <img src="{{asset('assets/image/records.svg')}}" class="pr-2">        
          <span>Requests</span>
        </a>
        <!-- 2 -->
      </li>
      <li class="nav-item mb-2">
        <a class="nav-link pat" data-toggle="collapse" href="#patient" aria-expanded="false" aria-controls="patient">
          <img src="{{asset('assets/image/twotone-how-to-reg-24-px.svg')}}" class="pr-2">
          <span>Patients Management</span>
        </a>

        <div class="collapse" id="patient">
          <ul class="nav flex-column ">
            <li class="nav-item">
              <a class="nav-link search" href="{{route('searchpatient')}}">Patients</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link patients" href="{{route('patient')}}">Patients</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link addpat" href="{{route('addpatient')}}">New Patient</a>
            </li>
          </ul>
        </div>
        <!-- 3 -->
      </li>
      
      <li class="nav-item mb-2">
        <a class="nav-link paymentmana" data-toggle="collapse" href="#payment" aria-expanded="false" aria-controls="payment">
          <img src="{{asset('assets/image/payment.svg')}}" class="pr-2">
          <span>Payment Management</span>
        </a>

        <div class="collapse" id="payment">
          <ul class="nav flex-column ">
            <li class="nav-item">
              <a class="nav-link paymentRequest" href="{{route('paymentrequests')}}">Payment Requests</a>
            </li>
            <li class="nav-item">
              <a class="nav-link payments" href="{{route('payments')}}">Payments</a>
            </li>
          </ul>
        </div>
        <!-- 4 -->
      </li>

      <li class="nav-item mb-2">
        <a class="nav-link user" data-toggle="collapse" href="#user" aria-expanded="false" aria-controls="user">
          <img src="{{asset('assets/image/user.svg')}}" class="pr-2">
          <span>User Management</span>
        </a>

        <div class="collapse" id="user">
          <ul class="nav flex-column ">
            <li class="nav-item">
              <a class="nav-link alluser" href="{{route('users')}}">Users</a>
            </li>
            <li class="nav-item">
              <a class="nav-link aduser" href="{{route('roles')}}">Roles</a>
            </li>
          </ul>
        </div>
        <!-- 5 -->
      </li>

      <li class="nav-item mb-2">
        <a class="nav-link" data-toggle="collapse" href="#signature" aria-expanded="false" aria-controls="signature">
          <img src="{{asset('assets/image/twotone-create-24-px.svg')}}" class="pr-2">
          <span>E-signatures</span>
        </a>

        <div class="collapse" id="signature">
          <ul class="nav flex-column ">
            <li class="nav-item">
              <a class="nav-link" href="pages/ui-features/buttons.html">Signatures</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/ui-features/typography.html">Add Signature</a>
            </li>
          </ul>
        </div>
        <!-- 6 -->
      </li>
      <li class="nav-item mb-2">
        <a class="nav-link" data-toggle="collapse" href="#support" aria-expanded="false" aria-controls="support">
          <img src="{{asset('assets/image/settings.svg')}}" class="pr-2">
          <span>Support System</span>
        </a>
        <div class="collapse" id="support">
          <ul class="nav flex-column ">
            <li class="nav-item">
              <a class="nav-link" href="pages/ui-features/buttons.html">Signatures</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/ui-features/typography.html">Add Signature</a>
            </li>
          </ul>
        </div>
        <!-- 7 -->
      </li>
    </ul>
  </div>