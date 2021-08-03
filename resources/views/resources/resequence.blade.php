<x-master>
    @section('content')
          <!-- Tambien se puede usar la funcion helper 'session'. Ej: session('message') -->
        @if (Session::has('message'))
            <div class="alert alert-{{Session::get('div_class')}}">{{Session::get('message')}}</div>
        @endif
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">{{ __('All Resources') }}</h6>
            </div>
            <div class="card-body">
            @if (count($transactions)>0)
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>{{ __('Id') }}</th>
                      <th>{{ __('Date') }}</th>
                      <th>{{ __('Concept') }}</th>
                      <th>{{ __('Type') }}</th>
                      <th>{{ __('Amount') }}</th>
                      <th>{{ __('Old balance') }}</th>
                      <th>{{ __('New balance') }}</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>{{ __('Id') }}</th>
                      <th>{{ __('Date') }}</th>
                      <th>{{ __('Concept') }}</th>
                      <th>{{ __('Type') }}</th>
                      <th>{{ __('Amount') }}</th>
                      <th>{{ __('Old balance') }}</th>
                      <th>{{ __('New balance') }}</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($results as $transaction)
                    <tr>
                        <td>{{$transaction->id}}</td>
                        <td>{{$transaction->operation_timestamp}}</td>
                        <td>{{$transaction->description}}</td>
                        <td>{{ $transaction->type }}</td>
                        <td style="text-align: right">{{number_format($transaction->amount,2)}}</td>
                        <td style="text-align: right">{{number_format($transaction->old_balance,2)}}</td>
                        <td style="text-align: right">{{number_format($transaction->new_balance,2)}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          {{--Estilos de bootstrap para centrar --}}
          <div class="d-flex">
            <div class="mx-auto">
            </div>
          </div>
    @endsection

    @section ('page-level-scripts')
      <!-- Page level plugins -->
      <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
      <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

      <!-- Page level custom scripts, sirve para animacion del paginado -->
      {{--<script src="{{asset('js/datatables.js')}}"></script>--}}
    @endsection
</x-master>
