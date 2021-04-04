<select name="{{ $name }}" class="custom-select custom-select-sm form-control form-control-sm" id="{{ $name }}" >
    <option value="any" selected="selected">{{__('Any resource')}}</option>
    @foreach (auth()->user()->resources as $resource)
        <option value="{{ $resource->id }}" >{{ $resource->alias }}</option>
    @endforeach
</select>
