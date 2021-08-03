<select name="{{ $name }}" class="custom-select custom-select-sm form-control form-control-sm selectpicker" id="{{ $name }}" onchange="Javascript: PopulateCategories();">
    <option data-content="<img src='/images/freepik/006-dollar-6.png' width='32' height='32' />&nbsp;<strong>{{__('Pick a source...')}}</strong>" value="NOSELECT" selected="selected"></option>
    @if ($name=="origin")
        <option data-content="<img src='/images/freepik/024-coin-1.png' width='32' height='32' />&nbsp;<strong>{{__('General Income')}}</strong>" value="INCOME"></option>
    @endif
    @foreach (auth()->user()->resources as $resource)
        <option data-content="<img src='{{ $resource->icon_file }}' width='32' height='32' />&nbsp;<strong>{{ $resource->alias }}</strong>" value="{{ $resource->id }}" ></option>
    @endforeach
    @if ($name=="destiny")
        <option data-content="<img src='/images/freepik/025-dollar-5.png' width='32' height='32' />&nbsp;<strong>{{__('General Outcome')}}</strong>" value="OUTCOME"></option>
    @endif
</select>
