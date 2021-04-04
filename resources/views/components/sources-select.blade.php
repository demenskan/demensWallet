<select name="{{ $name }}" class="custom-select custom-select-sm form-control form-control-sm" id="{{ $name }}" onchange="Javascript: PopulateCategories();">
    <option value="NOSELECT" selected="selected">{{__('Pick a source...')}}</option>
    @if ($name=="origin")
        <option value="INCOME">{{__('General Income')}}</option>
    @endif
    @foreach (auth()->user()->resources as $resource)
        <option value="{{ $resource->id }}" >{{ $resource->alias }}</option>
    @endforeach
    @if ($name=="destiny")
        <option value="OUTCOME">{{__('General Outcome')}}</option>
    @endif
</select>
