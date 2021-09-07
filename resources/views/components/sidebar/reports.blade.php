      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReports" aria-expanded="true" aria-controls="collapseReports">
          <i class="fas fa-table"></i>
          <span>{{ __('Reports') }}</span>
        </a>
        <div id="collapseReports" class="collapse" aria-labelledby="headingReports" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">{{ __('Reports') }}</h6>
            <a class="collapse-item" href="{{ route('resources.admin') }}">{{ __('Incomes') }}</a>
            <a class="collapse-item" href="{{ route('resources.admin') }}">{{ __('Expenses') }}</a>
            <a class="collapse-item" href="{{ route('transaction.find') }}">{{ __('Find transactions') }}</a>
            <a class="collapse-item" href="{{ route('resources.balance.list') }}">{{ __('Balance') }}</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

