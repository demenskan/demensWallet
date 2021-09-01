<x-master>
    @section('content')
          <!-- Tambien se puede usar la funcion helper 'session'. Ej: session('message') -->
        @if (Session::has('message'))
            <div class="alert alert-{{Session::get('div_class')}}">{{Session::get('message')}}</div>
        @endif
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">{{ __('Transaction detail') }}</h6>
            </div>
            <div class="card-body">
        @if (isset($transaction))
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <td>{{ __("Resource") }}</td>
                        <td>{{$transaction->resource->alias}}</td>
                    </tr>
                    <tr>
                        <td>{{ __("Alter Resource") }}</td>
                        <td>{{$transaction->alter_resource_alias}}</td>
                    </tr>
                    <tr>
                        <td>{{ __("Description") }}</td>
                        <td>{{$transaction->description}}</td>
                    </tr>
                    <tr>
                        <td>{{ __("Type") }}</td>
                        <td>{{$transaction->type}}</td>
                    </tr>
                        <td>{{ __("Date") }}</td>
                        <td>{{$transaction->created_at}}</td>
                    <tr>
                        <td>{{ __("Amount") }}</td>
                        <td>{{ number_format($transaction->amount,2)}}</td>
                    </tr>
                    <tr>
                        <td>{{ __("Resultant balance") }}</td>
                        <td>{{ number_format($transaction->resultant_balance,2)}}</td>
                    </tr>
                    <tr>
                        <td>{{ __("Category") }}</td>
                        <td>{{ $transaction->category->name ?? __("Uncategorized") }}</td>
                    </tr>
                    <tr>
                        <td>{{ __("Notes") }}</td>
                        <td>{{$transaction->notes}}</td>
                    </tr>
                    <tr>
                        <td>{{ __("Labels") }}</td>
                        <td>
                            @foreach ($transaction->labels as $label)
                            <button type="button" class="btn" style="color: {{$label->foreground_color}}; background-color: {{$label->background_color}}">
                                @if (isset($label->fontawesome_id))
                                    <i class="fa {{$label->fontawesome_id}}"></i>
                                @endif
                                {{$label->name}}
                            </button>
                            @endforeach
                        </td>
                    </tr>
                        {{--
                    <tr>
                        <td>
--}}
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
                        </td>
--}}
{{--                            @can ('view',$post)
    <td>
                            <button type="button" class="btn btn-warning" onclick="location.href='{{route('post.edit', $post->id)}}'">
                                <i class="fas fa-edit"></i>
                            </button>
                            @endcan
                        </td>
                    </tr>
                --}}
                  </tbody>
                </table>
                <button type="button" class="btn btn-primary" onclick="location.href='{{route('resources.balance.detail', $transaction->resource_id)}}'">
                    <i class="fas fa-arrow-left"></i>&nbsp;{{__("Back")}}
                </button>
              </div>
        @else
              <div class="alert alert-warning">{{ __('You have no transactions!') }}</div>
        @endif
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
