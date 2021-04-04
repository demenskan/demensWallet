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
                      <i class="fas fa-exchange-alt"></i> &nbsp;{{__('New Transaction')}}
                  </h6>
                </div>
                <div class="card-body">
                  <form class="user" action="{{route('transaction.store')}}" method="POST">
                    @csrf
                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                          <label for='origin'>{{__('Origin')}}</label>
                          <x-sources-select name="origin" />
                      </div>
                      <div class="col-sm-6">
                          <label for='destiny'>{{__('Destiny')}}</label>
                          <x-sources-select name="destiny" />
                      </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                          <input type="text" name="description" class="form-control" id="description" placeholder="{{__('Description')}}">
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                          <input type="number" name="amount" class="form-control" id="amount" placeholder="{{__('Amount')}}" step="0.01">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <textarea name="notes" class="form-control" id="notes" style="height: 180px;" placeholder="{{__('Notes')}}"></textarea>
                        </div>
                        <div class="col-sm-6">
                            <label for='category'>{{ __('Category') }}</label>
                            <div id="categories-select">
                            </div>
                            <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#addCategoriesModal" >
                                {{__('Add categories...')}}
                            </button>
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-primary btn-block" ><i class="fas fa-tags"></i> &nbsp; {{__('Manage labels...')}}</button>
                            </div>
                            <x-transactions.add-categories-modal />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">{{ __('Register') }}</button>
                    <hr>
                  </form>
                </div>
              </div>
            </div>
          </div>
    @endsection

    @section ('page-level-scripts')
            <script>
                function PopulateCategories() {
                    sURL='/transaction/populate_categories/' + document.getElementById('origin').value + '/' + document.getElementById('destiny').value ;
                    $.ajax(sURL)
                            .done(function(response) {
                              $('#categories-select').html(response);
                            })
                            .fail(function() {
                               $('#categories-select').html("error: " + sURL);
                            });
                }

                function PopulateParentCategories(type) {
                    document.getElementById('add-category-button').disabled=false;
                    sURL='/transaction/populate_parent_categories/' + type ;
                    $.ajax(sURL)
                            .done(function(response) {
                              $('#parent-categories-select').html(response);
                            })
                            .fail(function() {
                              $('#parent-categories-select').html("error: " + sURL);
                            });
                }

                function AddCategory() {
                    sName=document.getElementById('name-text').value;
                    if (sName=="") {
                        document.getElementById('alert-modal').innerHTML='<div class="alert alert-danger">{{ __("You must specifie a name") }}</div>';
                        return;
                    }
                    sToken="{{ csrf_token() }}";
                    sType= (document.getElementById('type-in-radio').checked) ? "IN" : "OUT" ;
                    bIsChild=document.getElementById('is-child-check').checked;
                    sParent= (bIsChild==true) ?  document.getElementById('category').value : "NONE";
                    sURL='/categories/store/' + sName + '/' + sType + '/' + sParent + '/' + sToken;
                    $.ajax(sURL)
                            .done(function(response) {
                                $('#alert-modal').html(response);
                                if (response=="ok") {
                                   $('#addCategoriesModal').modal('hide');
                                   location.reload();
                                }
                            })
                            .fail(function() {
                                $('#alert-modal').html('<div class="alert alert-danger">error: ' + sURL + '</div>');
                            });
                }

            </script>

    @endsection

</x-master>

