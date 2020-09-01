        <!-- Topbar -->

        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <x-topbar.search></x-topbar.search>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <x-topbar.search-small-screen></x-topbar.search-small-screen>

            <x-topbar.alerts></x-topbar.alerts>

            <x-topbar.messages></x-topbar.messages>

            <div class="topbar-divider d-none d-sm-block"></div>

            <x-topbar.user-information></x-topbar.user-information>

          </ul>

        </nav>
        <!-- End of Topbar -->
