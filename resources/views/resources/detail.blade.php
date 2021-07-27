<x-master>
    @section('content')
          <!-- Tambien se puede usar la funcion helper 'session'. Ej: session('message') -->
        @if (Session::has('message'))
            <div class="alert alert-{{Session::get('div_class')}}">{{Session::get('message')}}</div>
        @endif
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('Details of resource')." ".$resource->alias }}</h6>
                <img src="{{ $resource->icon_file }}" height="32" />
            </div>
            <div class="card-body">
        @if (count($transactions)>0)
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>{{ __('Date') }}</th>
                      <th>{{ __('Concept') }}</th>
                      <th>{{ __('Amount') }}</th>
                      <th>{{ __('New balance') }}</th>
                      <th>{{ __('Type') }}</th>
                      <th>{{ __('Details') }}</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>{{ __('Date') }}</th>
                      <th>{{ __('Concept') }}</th>
                      <th>{{ __('Amount') }}</th>
                      <th>{{ __('New balance') }}</th>
                      <th>{{ __('Type') }}</th>
                      <th>{{ __('Details') }}</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{$transaction->created_at}}</td>
                        <td>{{$transaction->description}}</td>
                        <td style="text-align: right">{{number_format($transaction->amount,2)}}</td>
                        <td style="text-align: right">{{number_format($transaction->resultant_balance,2)}}</td>
                        <td>{{ $transaction->type }}</td>
                        <td><a href="{{ route("transaction.detail", $transaction->id)  }}">{{ __('See detail') }}</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
        @else
              <div class="alert alert-warning">{{ __('You have no transactions available!') }}</div>
        @endif
            </div>
            <button type="button" class="btn btn-primary" onclick="location.href='{{route('resources.balance.list')}}'">
                <i class="fas fa-arrow-left"></i>&nbsp;{{__("Go back to resource's list")}}
            </button>
          </div>

          {{--Estilos de bootstrap para centrar --}}
          <div class="d-flex">
            <div class="mx-auto">
                {{-- Genera links para paginas--}}
                {{$transactions->links()}}
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
