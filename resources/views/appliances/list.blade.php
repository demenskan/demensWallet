<x-master>
    @section('content')
          <!-- Tambien se puede usar la funcion helper 'session'. Ej: session('message') -->
        @if (Session::has('message'))
            <div class="alert alert-{{Session::get('div_class')}}">{{Session::get('message')}}</div>
        @endif
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">{{ __('Appliances for new members') }}</h6>
            </div>
            <form action="{{ route('appliances.action') }}" id="frm-manage" method="POST">
                @csrf
            <div class="card-body">
        @if (count($appliances)>0)
           @foreach ($appliances as $appliance)
                    <div class="form-group row">
                      <div class="col-sm-6 col-lg-1  mb-3 mb-sm-0">
                          <input type="checkbox" class="form-control" name="chk_{{ $appliance->id }}" />
                      </div>
                      <div class="col-sm-6 col-lg-2  mb-3 mb-sm-0">
                          {{ $appliance->last_name.", ".$appliance->first_name }}
                      </div>
                      <div class="col-sm-12 col-lg-3">
                          {{ $appliance->email }}
                      </div>
                      <div class="col-sm-12 col-lg-6">
                          {{ $appliance->reason_to_use }}
                      </div>
                    </div>
          @endforeach
                    <div class="form-group row">
                      <div class="col-xs-12 col-md-3 mb-3 mb-sm-0">
                          <button type="button" class="btn btn-block btn-primary" onclick="javascript: applianceaction('accept');">
                              <i class="fa fa-check"></i>&nbsp;{{ __("Accept appliance") }}
                          </button>
                      </div>
                      <div class="col-xs-12 col-md-6 mb-3 mb-sm-0">&nbsp;</div>
                      <div class="col-xs-12 col-md-3 mb-3 mb-sm-0">
                          <button type="button" class="btn btn-block btn-danger" onclick="javascript: applianceaction('discard');">
                              <i class="fa fa-trash"></i>&nbsp;{{ __("Discard appliance") }}
                          </button>
                      </div>
                    </div>
        @else
              <div class="alert alert-warning">{{ __('You have no appliances yet') }}</div>
        @endif
            </div>
               <input type="hidden" id="hdn-action" name="action" value="" />
            </form>
          </div>

          {{--Estilos de bootstrap para centrar --}}
          <div class="d-flex">
            <div class="mx-auto">
                {{-- Genera links para paginas
                {{$appliances->links()}}
            --}}
            </div>
          </div>
    @endsection

    @section ('page-level-scripts')
      <!-- Page level plugins -->
      <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
      <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <script>
            function applianceaction(action) {
                $('#hdn-action').val(action);
                $('#frm-manage').submit();
            }

       </script>
      <!-- Page level custom scripts, sirve para animacion del paginado -->
      {{--<script src="{{asset('js/datatables.js')}}"></script>--}}
    @endsection
</x-master>
