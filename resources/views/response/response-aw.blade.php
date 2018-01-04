@extends('layout.main')
@section('layouts')
   {{-- This division --}}
      <div class="row">
        <div class="col-md-offset-1 col-md-10 jumbotron">
          <table class='table-responsive table-hover'>
            <tr>
              <th>Question Title</th>
              <th>Passage</th>
              <th>User's Submittion</th>
            </tr>
            <tr>
              <td>{{ $data->title }}</td>
              <td>{!! $data->passage !!}</td>
              <td>{!! $response !!}</td>
            </tr>
          </table>
        </div>
      </div>
@stop
