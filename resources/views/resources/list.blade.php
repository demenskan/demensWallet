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
        @if (count($resources)>0)
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>{{ __('Type') }}</th>
                      <th>{{ __('Alias') }}</th>
                      <th>{{ __('Currency') }}</th>
                      <th>{{ __('Current Balance') }}</th>
                      <th>{{ __('Details') }}</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>{{ __('Type') }}</th>
                      <th>{{ __('Alias') }}</th>
                      <th>{{ __('Currency') }}</th>
                      <th>{{ __('Current Balance') }}</th>
                      <th>{{ __('Details') }}</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($resources as $resource)
                    <tr>
                        <td>{{$resource->resource_type_id}}</td>
                        <td>{{$resource->alias}}</td>
                        <td>{{$resource->currency_id}}</td>
                        <td style="text-align: right">{{number_format($resource->balance,2)}}</td>
                        <td><a href="{{ route("resources.balance.detail", $resource->id)  }}">{{ __('See detail') }}</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
        @else
              <div class="alert alert-warning">{{ __('You have no resources available!') }}</div>
        @endif
            </div>
          </div>

          {{--Estilos de bootstrap para centrar --}}
          <div class="d-flex">
            <div class="mx-auto">
                {{-- Genera links para paginas--}}
                {{$resources->links()}}
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
