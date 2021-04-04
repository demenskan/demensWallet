<x-admin.master>
    @section('content')
          <!-- Tambien se puede usar la funcion helper 'session'. Ej: session('message') -->
        @if (Session::has('message'))
            <div class="alert alert-{{Session::get('div_class')}}">{{Session::get('message')}}</div>
        @endif
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">{{ __('All Transactions') }}</h6>
            </div>
            <div class="card-body">
        @if (count($transactions)>0)
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>{{ __('Source') }}</th>
                      <th>{{ __('Destination') }}</th>
                      <th>{{ __('Amount') }}</th>
                      <th>{{ __('Date') }}</th>
                      <th>{{ __('View') }}</th>
                      <th>{{ __('Delete') }}</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>{{ __('Source') }}</th>
                      <th>{{ __('Destination') }}</th>
                      <th>{{ __('Amount') }}</th>
                      <th>{{ __('Date') }}</th>
                      <th>{{ __('View') }}</th>
                      <th>{{ __('Delete') }}</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{$transaction->id}}</td>
                        <td>{{$transaction->origin_id}}</td>
                        <td>{{$transaction->destiny_id}}</td>
                        <td>{{$transaction->amount}}</td>
                        <td>{{$transaction->created_at}}</td>
                        <td>
{{--                            <!-- Manda a llamar la policy para ver si lo despliega -->
                            @can ('view', $post)
                            <form action="{{route('post.destroy', $post->id)}}" method="post">
                                @csrf
                                <!--Por convencion se usa este metodo en lugar del tradicional post-->
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="location.href='{{asset('admin/update/'.$post->id)}}'">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            @endcan
--}}
                        </td>
                        <td>
{{--                            @can ('view',$post)
                            <button type="button" class="btn btn-warning" onclick="location.href='{{route('post.edit', $post->id)}}'">
                                <i class="fas fa-edit"></i>
                            </button>
                            @endcan
--}}
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
        @else
              <div class="alert alert-warning">{{ __('You have no transactions!') }}</div>
        @endif
            </div>
          </div>

          {{--Estilos de bootstrap para centrar --}}
          <div class="d-flex">
            <div class="mx-auto">
                {{-- Genera links para paginas--}}
                {{$transactions->links()}}
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
</x-admin.master>
