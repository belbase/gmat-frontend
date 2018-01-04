<div class="col-md-3 form-modules">

  <div id="accordion" role="tablist" aria-multiselectable="true">
    <div class="card" id="catagory">
        <label for="type">Catagory</span></label>
          <div class="card-block">
            <div class="form-group">
                <select class="form-control" name="cata" id="cata" required>
                  @if (isset($content->cat))
                    <option value="{{ $content->cat }}" selected> {{ \App\Helper\QuestionCatagory::get($content->cat) }} </option>
                  @endif
                  @foreach (\App\Helper\QuestionCatagory::all() as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                  @endforeach
                </select>
            </div>
          </div>
      </div>
      <div class="card" id="difficulty-level">
          <label for="type">Difficulty Level</span></label>
            <div class="card-block">
              <div class="form-group">
                  <select class="form-control" name="dif" required>
                    @if (isset($content->dif))
                      <option value="{{ $content->dif }}" selected> {{ \App\Helper\DifficultyLevel::get($content->dif) }} </option>
                    @endif
                    @foreach (\App\Helper\DifficultyLevel::all() as $key => $value)
                      <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                  </select>
              </div>
            </div>
        </div>
        <div class="card" id="content-type">
            <label for="type">Content Type</span></label>
              <div class="card-block">
                <div class="form-group">
                    <select class="form-control" name="type" required>
                      @if (isset($content->type))
                      <option value="{{ $content->type }}"> {{ ucfirst($content->type) }} </option>
                      @endif
                      <option value="simple"> Simple </option>
                      <option value="passage"> Passage </option>
                    </select>
                </div>
              </div>
          </div>
          <div class="card" id="statement">
              <label for="type">Statement</span></label>
                <div class="card-block">
                  <div class="form-group">
                    @if(isset($content->statement))
                      <input type="text" name="statement" class="form-control" placeholder="(optional)" value="{{ $content->statement }}" >
                    @else
                      <input type="text" name="statement" class="form-control" placeholder="(optional)">
                    @endif
                  </div>
                </div>
            </div>
      <div class="card" id="options">
        <label for="options" data-toggle="modal" data-target="#option-dialog">Option</label>
        <div class="modal fade" id="option-dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Options</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body  option-group">
                <div class="form-group">
                  <button class="btn btn-primary" type="button" id="add-option"><span class="fa fa-plus"></span> Add Options</button>
                </div>
                @if (isset($content->options))
                  @foreach ($content->options as $key => $value)
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                      <input type="text" class="form-control option-input" name="{{ $value->oid }}" id="{{ $key+1 }}" value="{{ $value->content }}" placeholder="Option {{ $key+1 }}">
                      @if ($value->is_correct==1)
                          <div class="input-group-addon"><input type="checkbox" class="form-checkbox" name="is_correct" id="is_correct-{{ $value->oid }}" value="1" checked></div>
                      @else
                          <div class="input-group-addon"><input type="checkbox" class="form-checkbox" name="is_correct" id="is_correct-{{ $value->oid }}" value="1"></div>

                      @endif
                    </div>
                    <br>
                  @endforeach
                  @else
                  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <input type="text" class="form-control option-input" name="1" id="1" placeholder="Option 1">
                        <div class="input-group-addon">
                          <input type="checkbox" class="form-checkbox" class="form-checkbox" name="is_correct" id="is_correct-1" value="1">
                        </div>
                  </div>
                  <br>
                @endif
              </div>
              {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div> --}}
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="form-group card">
        <div class="card-body">
          <button type="submit" name="submit" class="btn btn-primary" id="save"> <span class="fa fa-floppy-o"></span> Save </button>
        </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    addOptions();
    hideall();
    selectTypeOption();
  });
</script>
