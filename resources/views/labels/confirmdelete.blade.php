<x-master>
    @section('content')
        <div class="row">
            <div class="col-lg-12">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">
                      <i class="fas fa-tags"></i> &nbsp;{{__('Delete Label')}}
                  </h6>
                </div>
                <div class="card-body">
                    <form class="user" action="{{route('labels.delete.destroy', $label->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- By convention, use delete --}}
                    @method('DELETE')
                    <div class="form-group row">
                        <div class="col-sm-4">
                            {{__('Label name')}}
                        </div>
                        <div class="col-sm-3">
                            {{$label->name}}
                        </div>
                        <div class="col-sm-5">&nbsp;</div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            {{ __("Label Icon") }}
                        </div>
                        <div class="col-sm-8">
                            <i class="fas {{$label->fontawesome_id}}"></i>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            {{ __("Foreground Color") }}
                        </div>
                        <div class="col-sm-3">
                            {{$label->foreground_color}}
                        </div>
                        <div class="col-sm-5">&nbsp;</div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            {{ __("Background Color") }}
                        </div>
                        <div class="col-sm-3">
                            {{$label->background_color}}
                        </div>
                        <div class="col-sm-5">&nbsp;</div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-primary" onclick="location.href='{{route('labels.administrate')}}'">
                                <i class="fas fa-arrow-left"></i>&nbsp;{{__("Go back to labels list")}}
                            </button>
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-trash"></i>&nbsp;{{ __('Confirm delete') }}
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
</x-master>

