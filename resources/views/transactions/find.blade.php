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
                    <a href="#collapseCardFilter" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                      <h6 class="m-0 font-weight-bold text-primary">
                          <i class="fas fa-exchange-alt"></i> &nbsp;{{__('Find Transactions - Filter')}}
                      </h6>
                    </a>
                </div>
                <div class="collapse show" id="collapseCardFilter">
                    <div class="card-body">
                      <form class="user" action="{{route('transaction.results')}}" method="POST">
                        @csrf
                        <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                              <label for='resource'>{{__('Resource')}}</label>
                              <x-resource-select name="resource" />
                          </div>
                          <div class="col-sm-6">
                              <label for='type'>{{__('Type')}}</label>
                              <select name="type" class="custom-select custom-select-sm form-control form-control-sm" id="type" onchange="Javascript: PopulateCategories(this.value);">
                                  <option value="ANY">{{__('Any type')}}</option>
                                  <option value="IN">{{__('Only incomes')}}</option>
                                  <option value="OUT">{{__('Only outcomes')}}</option>
                              </select>
                          </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                              <input type="text" name="description" class="form-control" id="description" placeholder="{{__('Description')}}">
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                              <label for="categories-select">{{ __("Category") }}</label>
                              <div id="categories-select">{{ __("A movement type must be selected in order to choose a category") }}</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                              <input type="number" name="min_amount" class="form-control" id="min-amount" placeholder="{{__('Minimal Amount')}}" step="0.01">
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                              <input type="number" name="max_amount" class="form-control" id="max-amount" placeholder="{{__('Max Amount')}}" step="0.01">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-icon-split btn-lg">
                            <span class="icon"><i class="fa fa-search"></i></span>
                            <span class="text">{{ __('Search') }}</span>
                        </button>
                        <hr>
                      </form>
                    </div>
                 </div>
              </div>
            </div>
          </div>
    @endsection

    @section ('page-level-scripts')
            <script>
                function PopulateCategories(type) {
                    if (type=="ANY") {
                       $('#categories-select').html('{{ __("A movement type must be selected in order to choose a category") }}');
                    }
                    else {
                        sURL='/transaction/populate_parent_categories/' + type ;
                    $.ajax(sURL)
                        .done(function(response) {
                          $('#categories-select').html(response);
                        })
                        .fail(function() {
                           $('#categories-select').html("error: " + sURL);
                        });
                    }
                }

            </script>

    @endsection

</x-master>

