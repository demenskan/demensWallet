      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseResources" aria-expanded="true" aria-controls="collapseResources">
          <i class="fas fa-money-bill-alt"></i>
          <span>{{ __('Resources') }}</span>
        </a>
        <div id="collapseResources" class="collapse" aria-labelledby="headingResources" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">{{ __('Resources Operations') }}</h6>
            <a class="collapse-item" href="{{ route('resources.admin') }}">{{ __('Administrate') }}</a>
            <a class="collapse-item" href="{{ route('resources.balance.list') }}">{{ __('Balance') }}</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

