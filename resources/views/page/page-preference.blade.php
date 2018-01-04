@extends('layout.exam')
@section('layouts')
      <h2>{{ "Section Ordering" }}</h2>
        <form id="target" action="" method="post">
          <input type="hidden" name="_token" class="token" value="{{ csrf_token() }}">
          <h3>GMAT</h3>
          <hr>
          <div class="col-md-4 form-group table-responsive">
            <table class="table">
              <tr>
                <td>
                  <input class="radio" value="2,1,3,4" type="radio" name="preference" required/>
                  <input type="hidden" name="exam" value="gmat">
                </td>
                <td>
                  <ol>
                    <li>Analytical Writing Assessment</li>
                    <li>Integrated Reasoning</li>
                    <li>Quantitative</li>
                    <li>Verbal</li>
                  </ol>
                </td>
              </tr>
            </table>
          </div>
          <div class="col-md-4 form-group table-responsive">
            <table class="table">
              <tr>
                <td>
                  <input class="radio" value="4,3,2,1" type="radio" name="preference" required/>
                  <input type="hidden" name="exam" value="gmat">
                </td>
                <td>
                  <ol>
                    <li>Verbal</li>
                    <li>Quantitative</li>
                    <li>Analytical Writing Assessment</li>
                    <li>Integrated Reasoning</li>
                  </ol>
                </td>
              </tr>
            </table>
          </div>
            <div class="col-md-4 form-group table-responsive">
              <table class="table">
                <tr>
                  <td>
                    <input type="hidden" name="exam" value="gmat">
                    <input class="radio" value="3,4,2,1" type="radio" name="preference" required/>
                  </td>
                  <td>
                    <ol>
                      <li>Quantitative</li>
                      <li>Verbal</li>
                      <li>Analytical Writing Assessment</li>
                      <li>Integrated Reasoning</li>
                    </ol>
                  </td>
                </tr>
              </table>
            </div>
            <h3>CAT</h3>
            <hr>
            <div class="col-md-4 form-group table-responsive">
              <table class="table">
                <tr>
                  <td>
                    <input class="radio" value="2,1,3,4" type="radio" name="preference" required/>
                    <input type="hidden" name="exam" value="cat">
                  </td>
                  <td>
                    <ol>
                      <li>Analytical Writing Assessment</li>
                      <li>Integrated Reasoning</li>
                      <li>Quantitative</li>
                      <li>Verbal</li>
                    </ol>
                  </td>
                </tr>
              </table>
            </div>
            <div class="col-md-4 form-group table-responsive">
              <table class="table">
                <tr>
                  <td>
                    <input class="radio" value="4,3,2,1" type="radio" name="preference" required/>
                    <input type="hidden" name="exam" value="cat">
                  </td>
                  <td>
                    <ol>
                      <li>Verbal</li>
                      <li>Quantitative</li>
                      <li>Analytical Writing Assessment</li>
                      <li>Integrated Reasoning</li>
                    </ol>
                  </td>
                </tr>
              </table>
            </div>
              <div class="col-md-4 form-group table-responsive">
                <table class="table">
                  <tr>
                    <td>
                      <input type="hidden" name="exam" value="gmat">
                      <input class="radio" value="3,4,2,1" type="radio" name="preference" required/>
                    </td>
                    <td>
                      <ol>
                        <li>Quantitative</li>
                        <li>Verbal</li>
                        <li>Analytical Writing Assessment</li>
                        <li>Integrated Reasoning</li>
                      </ol>
                    </td>
                  </tr>
                </table>
              </div>
        </form>
@endsection
{{-- <form id="target" action="" method="post">
  <input type="hidden" name="_token" class="token" value="{{ csrf_token() }}">
<table>
@foreach ($data->order() as $order => $item)
  <tr>
  <td>

  </td>
  <td>
  @foreach ($item as $key => $value)
    @if($value != 'OBR')

      {!! $array[] = \App\Helper\SectionArray::getID($value)."\n" !!}
    @endif
  @endforeach
  </td>
  </tr>
@endforeach

</table>
</form> --}}
