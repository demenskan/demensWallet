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
                      <i class="fas fa-edit"></i> &nbsp;{{__('Edit Resource')}}
                  </h6>
                </div>
                <div class="card-body">
                  <form class="user" action="{{route('resources.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="resource_id" value="{{$resource->id}}" />
                    <div class="form-group row">
                      <div class="col-sm-12">
                          <label for='type'>{{__('Type')}}</label>
                            <select name="resource_type_id" id="type" class="custom-select custom-select-sm form-control form-control-sm">
                                @foreach ($resource_types as $type)
                                    <option value="{{ $type->id }}"{{ $resource->resource_type_id==$type->id ? " selected=selected" : "" }}>{{ __($type->description) }}</option>
                                @endforeach
                           </select>
                      </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">
                            {{__("Icon")}}
                        </div>
                        <div class="col-sm-6">
                            <select name="icon" class="custom-select custom-select-sm form-control form-control-sm selectpicker" id="icon">
                                @foreach ($images as $icon)
                                    <option data-content="<img src='{{ $icon->full_path }}' width='32' height='32' />&nbsp;<strong>{{ $icon->tag }}</strong>" 
                                            value="{{ $icon->id}}"
                                            {{ $icon->id==$resource->icon_id ? "selected=selected" : "" }}
                                            >
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        {{--
                        <div class="col-sm-4">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#GallerySelectModal" >
                                {{__('Change...')}}
                            </button>
                            <x-resources.gallery-select-modal :images="$images" />
                        </div>
                        --}}
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input type="text" name="alias" class="form-control" id="alias" value="{{$resource->alias}}" placeholder="{{__('Alias')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                          <label for='currency'>{{__('Currency')}}</label>
                            <select name="currency_id" id="currency" class="custom-select custom-select-sm form-control form-control-sm">
                                @foreach ($currencies as $currency)
                                    <option value="{{ $currency->id }}"{{ $resource->currency_id==$currency->id ? " selected=selected" : "" }}>{{ __($currency->full_name) }}</option>
                                @endforeach
                           </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">
                            <input type="checkbox" name="active" class="form-control" id="active"{{ $resource->active==true ? " checked=checked" : "" }}>
                        </div>
                        <div class="col-sm-10">
                          <label for="active">{{__('Active resource')}}</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-primary" onclick="location.href='{{route('resources.admin')}}'">
                                <i class="fas fa-arrow-left"></i>&nbsp;{{__("Go back to resource's list")}}
                            </button>
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-save"></i>&nbsp;{{ __('Update') }}
                            </button>
                        </div>
                    </div>
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


        {{--<script src="{{asset('js/datatables.js')}}"></script>--}}
        <script>
            // Sacado de js/datatables.js 
            $(document).ready(function() {
              $('#dataTable').DataTable();
            });

            function SelectImage(tag, id) {
                $('#GallerySelectedImageText').html(tag);
                $('#GallerySelectedImageHidden').attr('value',id);
                $('#GallerySelectModal').modal('hide');
                //console.log (tag);
            }


        </script>
        <script src="{{ asset('js/bootstrap-select.js') }}"></script>
    @endsection
</x-master>

