    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fa fa-wallet"></i>
        </div>
        <div class="sidebar-brand-text mx-3">DemensWallet</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="{{route('home')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Nav Item - Transactions  -->
      <x-sidebar.transactions/>
      <!-- Nav Item - Reports -->
      <x-sidebar.reports/>
      <!-- Heading -->
      <div class="sidebar-heading">
          Administrate
      </div>

      <!-- Nav Item - Resources  -->
      <x-sidebar.resources/>
      <!-- Nav Item - Icons -->
      <x-sidebar.icons/>
      <!-- Nav Item - Labels -->
      <x-sidebar.labels/>

      {{--
    <x-admin.sidebar.posts-links></x-admin.sidebar.posts-links>
@if (auth()->user()->userHasRole('Admin'))
    <x-admin.sidebar.users-links></x-admin.sidebar.users-links>
@endif
@if (auth()->user()->userHasRole('Admin'))
    <x-admin.sidebar.authorization-links></x-admin.sidebar.authorization-links>
@endif
--}}

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

