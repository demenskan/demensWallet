<x-master>
    @section('content')
          <!-- Tambien se puede usar la funcion helper 'session'. Ej: session('message') -->
        @if (Session::has('message'))
            <div class="alert alert-{{Session::get('div_class')}}">{{Session::get('message')}}</div>
        @endif
        <div class="row">
            <div class="col-lg-12">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">
                      <i class="fas fa-id-card"></i> &nbsp;{{__('User Profile')}}
                  </h6>
                </div>
                <div class="card-body">
                  <form class="user" action="{{route('user.profile.store')}}" method="POST">
                    @csrf
                    <div class="form-group row">
                      <div class="col-sm-2 mb-3 mb-sm-0">
                          <label for='language'>{{__('Display Language')}}</label>
                      </div>
                      <div class="col-sm-10">
                          <select name="language" class="custom-select custom-select-sm form-control form-control-sm">
                              @foreach ($languages as $language)
                                  <option value="{{ $language->id }}" {{ $language->id==$user->language_id ? "selected=\"selected\"" : "" }}>{{ $language->original_name }}</option>
                              @endforeach
                          </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-2 mb-3 mb-sm-0">
                          <label for='currency'>{{__('Default currency')}}</label>
                      </div>
                      <div class="col-sm-10">
                          <select name="currency" class="custom-select custom-select-sm form-control form-control-sm">
                            @foreach ($currencies as $currency)
                                <option value="{{ $currency->id }}" {{ $currency->id==$user->currency_id ? "selected=\"selected\"" : "" }}>{{ $currency->full_name }}</option>
                            @endforeach
                          </select>
                      </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2 mb-3 mb-sm-0">
                          <label for='name'>{{__('Display Name')}}</label>
                        </div>
                        <div class="col-sm-10 mb-3 mb-sm-0">
                            <input type="text" name="name" class="form-control" id="name" placeholder="{{__('Display Name')}}" value="{{ $user->name }}">
                        </div>
                    </div>
                  </form>
                  <button type="submit" class="btn btn-primary btn-user btn-block">{{ __('Submit changes') }}</button>
                </div> <!--card body-->
              </div> <!--card-->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">
                      <i class="fas fa-key"></i> &nbsp;{{__('Change Password')}}
                  </h6>
                </div>
                <div class="card-body">
                  <form class="user" action="{{route('user.profile.changepassword')}}" method="POST">
                    @csrf
                    <div class="form-group row">
                      <div class="col-sm-2 mb-3 mb-sm-0">
                          <label for='pass1'>{{__('New password')}}</label>
                      </div>
                      <div class="col-sm-10">
                          <input type="password" name="password1" class="form-control" id="pass1" placeholder="{{__('Type password')}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-2 mb-3 mb-sm-0">
                          <label for='pass2'>{{__('Confirm new password')}}</label>
                      </div>
                      <div class="col-sm-10">
                          <input type="password" name="password2" class="form-control" id="pass2" placeholder="{{__('Confirm new password')}}">
                      </div>
                    </div>
                  </form>
                  <button type="submit" class="btn btn-primary btn-user btn-block">{{ __('Submit changes') }}</button>
                </div> <!--card body-->
              </div> <!--card-->
            </div> <!--column-->
         </div> <!-- row -->
    @endsection

    @section ('page-level-scripts')
      <!-- Page level plugins -->
      <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
      <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

      <!-- Page level custom scripts, sirve para animacion del paginado -->
      {{--<script src="{{asset('js/datatables.js')}}"></script>--}}
    @endsection
</x-master>