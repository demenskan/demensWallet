          <!-- Manage Categories Modal-->
          <div class="modal fade" id="addCategoriesModal" tabindex="-1" role="dialog" aria-labelledby="addCategoriesModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="addCategoriesModalLabel">{{ __("Add a category")}}</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                    <div class="modal-body">
                        <div id="alert-modal"></div>
                        <input type="text" class="form-control" name="name" id="name-text" placeholder="{{ __("Name") }}">
                        <div class="container">
                            <label for="type">{{ __("Type") }}</label>
                            <select name="type" class="custom-select custom-select-sm form-control form-control-sm" onChange="PopulateParentCategories(this.options[this.selectedIndex].value);">
                                 <option value="IN">{{ __("Income") }}</option>
                                 <option value="OUT">{{ __("Outcome") }}</option>
                            </select>
                        </div>
                        <hr/>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" id="is-child-check" type="checkbox" name="ischild" value="off" />
                            <label class="custom-control-label" for="is-child-check">{{ __("This category is child of the following: ") }}</label>
                        </div>
                        <div id="parent-categories-select">
                            <x-transactions-categories-select
                            
                            
                            
                            
                            <div class="alert alert-warning">{{ __("You must first select the type of the new category") }}</div>
                        </div>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="button" id="add-category-button" disabled onclick="AddCategory()">{{ __("Add category") }}</button>
                    </div>
                    <div class="modal-footer">
                    </div>
              </div>
            </div>
          </div>
