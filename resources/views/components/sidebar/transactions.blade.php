      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTransactions" aria-expanded="true" aria-controls="collapseTransactions">
          <i class="fas fa-fw fa-exchange-alt"></i>
          <span>{{ __('Transactions') }}</span>
        </a>
        <div id="collapseTransactions" class="collapse" aria-labelledby="headingTransactions" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">{{ __('Transaction Operations') }}</h6>
            <a class="collapse-item" href="{{ route('transaction.capture') }}">{{ __('New') }}</a>
            <a class="collapse-item" href="{{ route('transaction.find') }}">{{ __('Find') }}</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

