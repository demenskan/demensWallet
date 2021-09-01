<x-master>
    @section('content')
          <!-- Tambien se puede usar la funcion helper 'session'. Ej: session('message') -->
        @if (Session::has('message'))
            <div class="alert alert-{{Session::get('div_class')}}">{{Session::get('message')}}</div>
        @endif
          <!-- Page Heading -->                                                                                                                                              
          <h1 class="h3 mb-1 text-gray-800">{{__("Label's Administration")}}</h1>
          <p class="mb-4">{{ __("This section is for you to administrate the labels you can attach on a transaction.") }}</p>

        @if (count($labels)>0)
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>{{ __('Text') }}</th>
                      <th>{{ __('Font-Awesome class') }}</th>
                      <th>{{ __('Foreground-color') }}</th>
                      <th>{{ __('Background-color') }}</th>
                      <th>{{ __('Preview') }}</th>
                      <th>{{ __('Edit') }}</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>{{ __('Text') }}</th>
                      <th>{{ __('Font-Awesome class') }}</th>
                      <th>{{ __('Foreground-color') }}</th>
                      <th>{{ __('Background-color') }}</th>
                      <th>{{ __('Preview') }}</th>
                      <th>{{ __('Edit') }}</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($labels as $label)
                    <tr>
                        <td>{{$label->name}}</td>
                        <td>{{$label->fontawesome_id}}</td>
                        <td>{{$label->foreground_color}}</td>
                        <td>{{$label->background_color}}</td>
                        <td>
                            <button type="button" class="btn" style="color: {{$label->foreground_color}}; background-color: {{$label->background_color}}">
                                @if (isset($label->fontawesome_id))
                                    <i class="fa {{$label->fontawesome_id}}"></i>
                                @endif
                                {{$label->name}}
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary" onclick="location.href='{{route('labels.edit',$label->id)}}'">
                                <i class="fas fa-edit"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
        @else
              <div class="alert alert-warning">{{ __('You don\'t have labels yet. Try to create one.') }}</div>
        @endif
        <button type="button" class="btn btn-primary" onclick="location.href='{{route('labels.capture')}}'">
            <i class="fas fa-plus"></i>&nbsp;{{__("Create a new label...")}}
        </button>

          {{--Estilos de bootstrap para centrar --}}
          <div class="d-flex">
            <div class="mx-auto">
                {{-- Genera links para paginas--}}
                {{$labels->links()}}
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
