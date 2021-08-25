            <div id="categories-select">
            @if (!$categories->isEmpty())
                <select name="category" id="category" class="custom-select custom-select-sm form-control form-control-sm">
                    @if ($show_uncategorized)
                        <option value="NULL">{{ __("Uncategorized") }}</option>
                    @endif
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <br />
            @else
                <div class="alert alert-warning">{{ __('No categories found. Create some.') }} </div>
            @endif
            </div>
