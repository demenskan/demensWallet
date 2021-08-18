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
                      <i class="fas fa-image"></i> &nbsp;{{__('Edit custom icon')}}
                  </h6>
                </div>
                <div class="card-body">
                  <form class="user" action="{{route('icons.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-2">
                            <img src="/images/custom/{{ $icon->filename}}" width="32" height="32" />
                        </div>
                        <div class="col-sm-10">
                            <input type="text" name="icon_tag" class="form-control" id="icon-tag" placeholder="{{__('Icon Tag')}}" value="{{$icon->tag}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-primary" onclick="location.href='{{route('icons.administrate')}}'">
                                <i class="fas fa-arrow-left"></i>&nbsp;{{__("Go back to icons' list")}}
                            </button>
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-save"></i>&nbsp;{{ __('Update') }}
                            </button>
                        </div>
                    </div>
                    <hr>
                    <input type="hidden" name="id" value="{{ $icon->id }}" />
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

