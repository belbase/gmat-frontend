  <div class="row">
    <div class="col-md-10 col-md-offset-1 jumbotron">
      {{-- {!! $id !!} --}}
      <div class="col-md-4">
        <span class="bold text-{{ $topIndicator->color($page->dif) }}">Difficulty Level: {{ $topIndicator->name($page->dif) }}</span>
      </div>
      <?php
        if(isset($page->time_taken)):
          ?>
        <script type="text/javascript">
          $(document).ready(function() {
	        //      $("#future_date").countdowntimer({
          //        minutes : 20‚
          //       seconds : 00‚
          //       size : "lg"
	        //         });
          // console.log("it's working");
          $('#future_date').html('{{ $page->time_taken }}');
          });
        </script>
          <div class="col-md-4">
             <span class="center" id="future_date"></span>
          </div>
            <?php
            endif;
            ?>
            <div class="col-md-4  pull-right">
              <a class="btn btn-danger pull-right" href="/Practice/End"> End Exam </a>
            </div>
    </div>
  </div>
