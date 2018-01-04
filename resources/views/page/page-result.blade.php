@extends('layout.exam')
@section('layouts')
  <div style="height:100%;overflow-y:auto;">
    <table class="table">
      <tr>
        <th>Sr. No.</th>
        <th>Question</th>
        <th>Section</th>
        <th>Result</th>
        <th>Time Taken</th>
      </tr>
      <?php
        $count=1;
      ?>
      @foreach ($result as $item)
        <tr class='{{ ($item->result=="p")?"success":(($item->result=="f")?"danger":"warning") }}'>
          <td>{{ $count }}</td>
          <td>{{ \App\Model\Questions::find($item->qid)->title }}</td>
          <td>{{ \App\Helper\SectionArray::getName($item->sec_id) }}</td>
          <td>{!! ($item->result=="p")?"Right!":(($item->result=="f")?"Wrong!":(($item->result=="n")?"Saved For Review":"<span class='fa fa-hourglass'><span>Time-out")) !!}</td>
          <td>{!! $item->time_taken !!}</td>
        </tr>
        <?php
          $count++;
        ?>
      @endforeach
    </table>
  </div>
          {{-- {!! (isset($title))?"<span class='h2'> ".$title."</span>":"" !!} --}}

@stop
