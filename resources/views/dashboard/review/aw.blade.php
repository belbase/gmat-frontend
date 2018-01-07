@extends('layout.shell')
@section('layouts')
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item">Review</li>
        <li class="breadcrumb-item active">{{ $section }}</li>
      </ol>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> {{ $section }}</div>
        <div class="card-body">
          <br/>
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Date of Submitted</th>
                  <th>Question</th>
                  <th>Submitted By</th>
                  <th>Status</th>
                  <th>Time Taken</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $value)
                  <tr class="{{ \App\Helper\ReviewStatus::tableVal($value->result) }}">
                  {{-- <tr> --}}
                    <td>{{ date('M d, Y - h:i:s A', strtotime( $value->attempt_on )) }}</td>
                    <td>
                      <span data-toggle="modal" data-target="#mod-{{ $value->refid }}" data-whatever="{{ $value->refid }}"> {{ $value->question['title'] }} </span>
                        <div class="modal fade" id="mod-{{ $value->refid }}" tabindex="-1" role="dialog" aria-labelledby="mod-{{ $value->refid }}-ModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="mod-{{ $value->refid }}-ModalLabel">{{ $value->question['title'] }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body" style="overflow-y:auto;max-height:450px;">
                                <b>Question is:</b>
                                {!! $value->question['passage'] !!}
                                @if (!empty($value->answer))
                                  <b>Answer is:</b>
                                @else
                                  <b style="color:red;"> The Question is Unanswered!</b>
                                @endif
                                {!! $value->answer !!}
                              </div>
                              @if (!empty($value->answer))
                              <div class="modal-footer">

                                  {{-- <form class="" action="/dashboard/review/change" method="post">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="refid" value="{{ $value->refid }}">
                                    <input type="hidden" name="status" value="p">
                                    <input type="hidden" name="db" value="{{ $db }}">

                                    <button type="submit" class="btn btn-success" >Suffient!</button>
                                  </form> --}}

                                  {{-- <form class="" action="/dashboard/review/change" method="post">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="refid" value="{{ $value->refid }}">
                                    <input type="hidden" name="status" value="f">
                                    <input type="hidden" name="db" value="{{ $db }}">
                                    <button type="submit" class="btn btn-danger" >Not Suffient!</button>

                                  </form> --}}
                                  <form class="" action="/dashboard/review/change" method="post">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="refid" value="{{ $value->refid }}">
                                    <input type="hidden" name="status" value="f">
                                    <input type="hidden" name="db" value="{{ $db }}">
                                    <select name="score" class="custom-select mb-2 mr-sm-2 mb-sm-0" required>
                                      <option value="0">0</option>
                                      <option value="1">1</option>
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                      <option value="4">4</option>
                                      <option value="5">5</option>
                                      <option value="6">6</option>
                                    <select>
                                      <button type="submit" class="btn btn-primary">Submit</button>
                                  </form>

                              </div>
                            @endif
                            </div>
                          </div>
                        </div>
                    </td>
                    <td>{{ $value->user->name }}</td>
                    {{-- <td></td> --}}
                    <td>{{ \App\Helper\ReviewStatus::statusVal($value->result) }}</td>
                    <td>{{ $value->time_taken }}</td>
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
