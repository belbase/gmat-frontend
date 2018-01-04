@extends('layout.shell')
@section('layouts')
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item">Question</li>
        <li class="breadcrumb-item active">{{ $section }}</li>
      </ol>

        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i> {{ $section }}</div>
          <div class="card-body">
            <form class="" action="/dashboard/question/add" method="post">
              {!! csrf_field() !!}
              <input type="hidden" name="section" value="{{ $db }}">
              <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add A New Question</button>
            </form>
            <br/>
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    {{-- <th>Question Id</th> --}}
                    <th>Title</th>
                    <th>Action</th>
                    <th>Modified On</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $item)
                    <tr>
                      {{-- <td> {{ $item['qid'] }} </td> --}}
                      <td> <span data-toggle="modal" data-target="#mod-{{ $item['qid'] }}" data-whatever="{{ $item['qid'] }}"> {{ substr($item['title'],0,50) }}... </span>
                        <div class="modal fade" id="mod-{{ $item['qid'] }}" tabindex="-1" role="dialog" aria-labelledby="mod-{{ $item['qid'] }}-ModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="mod-{{ $item['qid'] }}-ModalLabel">{{ $item['title'] }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body" style="overflow-y:auto;max-height:450px;">
                                {!! $item->passage !!}
                                @if (isset($item->statement))
                                  <p> <b>{!! $item->statement !!}</b></p>

                                @endif
                                @if (isset($item->options))
                                  <ol type="a">
                                    @foreach ($item->options as $key => $value)
                                      @if ($value->is_correct==1)
                                        <li class="text-success"> {{ ucfirst($value->content) }} </li>
                                      @else
                                        <li> {{ ucfirst($value->content) }} </li>
                                      @endif
                                    @endforeach

                                  </ol>
                                @endif
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td>
                        <form action="/dashboard/question/edit" method="post">
                        {!! csrf_field() !!}
                        <input type="hidden" name="section" value="{{ $db }}">
                        <input type="hidden" name="id" value="{{ $item['qid'] }}">
                        <button type="submit" class="no-btn"><i class="fa fa-edit"></i> edit</button>
                        <a href="#" data-toggle="modal" class="no-btn" data-target="#del-box-{{ $item['qid'] }}"><i class="fa fa-trash-o"></i> Delete</a>
                      </form>

                          {{-- The Starting of the Modal  --}}
                          <div class="modal fade" id="del-box-{{ $item['qid'] }}">
                            <div class="modal-dialog">
                              <div class="modal-content">

                                {{-- Modal Header --}}
                                <div class="modal-header">
                                  <h4 class="modal-title">Delete</h4>
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                {{-- Modal body --}}
                                <div class="modal-body">
                                  Do You Want to Delete The Question?
                                </div>

                                {{-- Modal footer --}}
                                <div class="modal-footer">
                                  <form action="/dashboard/question/delete" method="post" class="form-horizontal">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="section" value="{{ $db }}">
                                    <input type="hidden" name="id" value="{{ $item['qid'] }}">
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                          {{-- End of the Delete Model --}}
                     </td>
                     <td>{{ date('M d, Y - h:i:s A', strtotime($item['updated_at'])) }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Current User: {!! Auth::guard('admin')->user()['name'] !!}</div>
        </div>

      </div>
    </div>
  </div>
@endsection
