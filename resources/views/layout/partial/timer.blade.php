<div class="pull-right timer" style="color:#fff;">
  @if(isset($gt))
    <span class="fa fa-clock-o" id="timer"></span>
    {{-- {{ var_dump($gt) }} --}}
  @endif
  <br/>
  @if(isset($qno))
    <span class="fa fa-print"> {{ $qno }} of {{ $aq }}</span><br/>
  @endif

</div>

<script src="{{ asset('/assets/js/timer.js') }}"></script>
<script type="text/javascript">
  $(document).ready(function(){
    @if(isset($gt))

      countdown_timer('{{ $gt }}');

    @endif
  });
</script>
