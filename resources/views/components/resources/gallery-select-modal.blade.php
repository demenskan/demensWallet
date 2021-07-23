          <!-- Manage Categories Modal-->
          <div class="modal fade" id="GallerySelectModal" tabindex="-1" role="dialog" aria-labelledby="GallerySelectModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="GallerySelectModalLabel">{{ __("Select from gallery")}}</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                    <div class="modal-body">
                        <div id="alert-modal"></div>
                        <!--
                        <input type="text" class="form-control" name="name" id="name-text" placeholder="{{ __("Name") }}">
                        <div class="container">
                            <label for="type">{{ __("Type") }}</label>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" id="type-in-radio" type="radio" name="type" value="IN" onclick="PopulateParentCategories('IN');" />
                                <label class="custom-control-label" for="type-in-radio">{{ __("Income") }}</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <label class="custom-control-label" for="type-out-radio">{{ __("Outcome") }}</label>
                                <input class="custom-control-input" id="type-out-radio" type="radio" name="type" value="OUT" onclick="PopulateParentCategories('OUT');" />
                            </div>
                        </div>
                        <hr/>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" id="is-child-check" type="checkbox" name="ischild" value="off" />
                            <label class="custom-control-label" for="is-child-check">{{ __("This category is child of the following: ") }}</label>
                        </div>
                        <div id="parent-categories-select">
                            <div class="alert alert-warning">{{ __("You must first select the type of the new category") }}</div>
                        </div>
                        -->
                          <!-- DataTales Example -->
                          <div class="card shadow mb-4">
                            <div class="card-body">
                              <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0" data-page-length="5">
                                  <thead>
                                    <tr>
                                      <th>Image</th>
                                      <th>Tag</th>
                                      <th>Select</th>
                                    </tr>
                                  </thead>
                                  <tfoot>
                                    <tr>
                                      <th>Image</th>
                                      <th>Tag</th>
                                      <th>Select</th>
                                    </tr>
                                  </tfoot>
                                  <tbody>
                                  @foreach ($images as $image)
                                    <tr>
                                      <td>
                                          <img src="/images/{{$image->filename}}" width="32" height="32" />
                                      </td>
                                      <td>
                                          {{ $image->tag  }}
                                      </td>
                                      <td>
                                         <button type="button" class="btn btn-primary" onclick="SelectImage('{{ $image->tag  }}')" >Select</button>
                                      </td>

                                    </tr>
                                  @endforeach
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    </div>
                    <div class="modal-footer">
                    </div>
              </div>
            </div>
          </div>
