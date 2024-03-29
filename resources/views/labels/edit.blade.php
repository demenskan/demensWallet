<x-master>
    @section('content')
        @if (session()->has('message-text'))
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-{{session('message-style')}}">{{session('message-text')}}</div>
            </div>
        </div>
        @endif

        @if ($errors->any())
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-warning">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif

        <div class="row">
            <div class="col-lg-12">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">
                      <i class="fa fa-tag"></i> &nbsp;{{__('Edit Label')}}
                  </h6>
                </div>
                <div class="card-body">
                  <form class="user" action="{{route('labels.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input type="text" name="name" class="form-control" id="label-name" placeholder="{{__('Label name')}}" value="{{$label->name}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="labelicon-id">{{ __("Label Icon") }}</label>
                        </div>
                        <div class="col-sm-8">
                            <select name="labelicon_id" id="labelicon-id" class="selectpicker" data-live-search="true" data-icon-base="fa" data-tick-icon="fa-check">
                                @foreach ($labelicons as $labelicon)
                                    <option data-icon="{{$labelicon->id}}" {{ $label->labelicon_id==$labelicon->id ? "selected=\"selected\"" : "" }}>
                                        {{$labelicon->id}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="foreground-color">{{ __("Foreground Color") }}</label>
                        </div>
                        <div class="col-sm-1">
                            <input type="color" name="foreground_color" class="form-control" id="foreground-color" value="{{$label->foreground_color}}" placeholder="{{__('Foreground Color')}}">
                        </div>
                        <div class="col-sm-7">&nbsp;</div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="background-color">{{ __("Background Color") }}</label>
                        </div>
                        <div class="col-sm-1">
                            <input type="color" name="background_color" class="form-control" id="background-color" value="{{$label->background_color}}" placeholder="{{__('Background Color')}}">
                        </div>
                        <div class="col-sm-7">&nbsp;</div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-primary" onclick="location.href='{{route('labels.administrate')}}'">
                                <i class="fas fa-arrow-left"></i>&nbsp;{{__("Go back to labels list")}}
                            </button>
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-save"></i>&nbsp;{{ __('Update') }}
                            </button>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="{{ $label->id }}" />
                    <hr>
                  </form>
                </div>
              </div>
            </div>
          </div>
    @endsection

    @section ('page-level-scripts')
     <!-- Page level plugins -->
      <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
      <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
      <script src="{{ asset('js/bootstrap-select.js') }}"></script>


        {{--<script src="{{asset('js/datatables.js')}}"></script>--}}
        <script>
            // Sacado de js/datatables.js 
            $(document).ready(function() {
              $('#dataTable').DataTable();
            });
        </script>
    @endsection
</x-master>

