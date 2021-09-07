<x-master>
    @section('content')
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ __("Dashboard") }}</h1>
            {{--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ __("Total Balance") }}</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        @foreach ($total_balances as $currency => $balance)
                            {!! $currency.": ".number_format($balance,2)."<br/>\n" !!}
                        @endforeach
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           <!-- Earnings (Monthly) -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{ __("Earnings (Monthly)") }}</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        @foreach ($earnings as $currency => $balance)
                            {!! $currency.": ".number_format($balance,2)."<br/>\n" !!}
                        @endforeach
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-chart-line fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Expenses (Monthly) -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">{{ __("Expenses (Monthly)") }}</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        @foreach ($expenses as $currency => $balance)
                            {!! $currency.": ".number_format($balance,2)."<br/>\n" !!}
                        @endforeach
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-hand-holding-usd fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <!-- Content Row -->

  

    @endsection

</x-master>
