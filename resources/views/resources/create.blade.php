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
                      <i class="fas fa-exchange-alt"></i> &nbsp;{{__('New Resource')}}
                  </h6>
                </div>
                <div class="card-body">
                  <form class="user" action="{{route('resources.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                      <div class="col-sm-12">
                          <label for='type'>{{__('Type')}}</label>
                            <select name="resource_type_id" id="type" class="custom-select custom-select-sm form-control form-control-sm">
                                @foreach ($resource_types as $type)
                                    <option value="{{ $type->id }}">{{ __($type->description) }}</option>
                                @endforeach
                           </select>
                      </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                          <input type="radio" name="radio-icon" value="upload" class="form-control">
                          <label for="radio-icon">{{__("Upload a picture")}}</label>
                          <input type="text" name="icon_tag" class="form-control" id="icon-tag" placeholder="{{__('Icon Tag')}}">
                        </div>
                        <div class="col-sm-8">
                          <input type="file" name="post_image" class="form-control-file" id="" placeholder="{{__('Upload file')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                          <input type="radio" name="radio-icon" value="gallery" class="form-control">
                          <label for="radio-icon">{{__("Existing in the gallery")}}</label>
                        </div>
                        <div class="col-sm-8">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#GallerySelectModal" >
                                {{__('Select...')}}
                            </button>
                            <input type="hidden" id="GallerySelectedImageHidden" name="hdnGalleryImage" value="null" />
                            <div id="GallerySelectedImageText"></div>
                            <x-resources.gallery-select-modal :images="$images" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                          <input type="text" name="alias" class="form-control" id="alias" placeholder="{{__('Alias')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                          <label for='currency'>{{__('Currency')}}</label>
                            <select name="currency_id" id="currency" class="custom-select custom-select-sm form-control form-control-sm">
                                @foreach ($currencies as $currency)
                                    <option value="{{ $currency->id }}">{{ __($currency->full_name) }}</option>
                                @endforeach
                           </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                          <input type="number" step="0.01" name="initial_amount" class="form-control" id="alias" placeholder="{{__('Initial amount')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary btn-user">{{ __('Register') }}</button>
                            <button type="button" class="btn btn-default" onclick="location.href='{{route('resources.admin')}}'">
                                <i class="fas fa-arrow-left"></i>&nbsp;{{__("Go back to resource's list")}}
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
    @endsection
</x-master>

