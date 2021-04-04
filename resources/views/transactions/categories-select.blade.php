            <div id="categories-select">
            @if ($categories->isEmpty())
                <select name="category" id="category" class="custom-select custom-select-sm form-control form-control-sm">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            @else
                <div class="alert alert-warning">{{ __('No categories found. Create some.') }} </div>
            @endif
            </div>
