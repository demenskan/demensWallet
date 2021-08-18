<x-master>
    @section('content')
          <!-- Tambien se puede usar la funcion helper 'session'. Ej: session('message') -->
        @if (Session::has('message'))
            <div class="alert alert-{{Session::get('div_class')}}">{{Session::get('message')}}</div>
        @endif
          <!-- Page Heading -->                                                                                                                                              
          <h1 class="h3 mb-1 text-gray-800">{{__("Icon's Administration")}}</h1>
          <p class="mb-4">{{ __("This section is to upload and administrate the icons you want to use, besides the included on the system. All the icons will be used in a 32 x 32 pixels display, so to get the best display, try to upload images around those dimensions.") }}</p>

        @if (count($icons)>0)
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>{{ __('Icon') }}</th>
                      <th>{{ __('Tag') }}</th>
                      <th>{{ __('Edit') }}</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>{{ __('Icon') }}</th>
                      <th>{{ __('Tag') }}</th>
                      <th>{{ __('Edit') }}</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($icons as $icon)
                    <tr>
                        <td><img src="/images/custom/{{ $icon->filename}}" width="32" height="32" /></td>
                        <td>{{$icon->tag}}</td>
                        <td>
                            <button type="button" class="btn btn-primary" onclick="location.href='{{route('icons.edit',$icon->id)}}'">
                                <i class="fas fa-edit"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
        @else
              <div class="alert alert-warning">{{ __('You don\'t have icons by your own. Try to upload one.') }}</div>
        @endif
        <button type="button" class="btn btn-primary" onclick="location.href='{{route('icons.capture')}}'">
            <i class="fas fa-plus"></i>&nbsp;{{__("Upload a new icon")}}
        </button>

          {{--Estilos de bootstrap para centrar --}}
          <div class="d-flex">
            <div class="mx-auto">
                {{-- Genera links para paginas--}}
                {{$icons->links()}}
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
