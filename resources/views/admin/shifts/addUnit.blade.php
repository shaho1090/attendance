@extends('layouts.master')
@section('title')
    شیفت کاری کاری
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="box box-primary">
                <form method="post"
                      action="{{route('shifts.addUnit',$shift->id)}}">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group">
                            <label> انتخاب گروه کاری مربوط به شیفت {{$shift->title}}</label>
                            <select required name="units[]" class="form-control select2 select2-hidden-accessible"
                                    multiple=""
                                    data-placeholder="انتخاب گروه کاری" style="width: 100%;" tabindex="-1"
                                    aria-hidden="true">
                                <option disabled selected value="">انتخاب گروه کاری</option>
                                @foreach($units as $unit)
                                    <option value="{{$unit->id}}">{{$unit->title}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div  class="box-footer">
                        <button type="submit" class="btn btn-primary">ثبت نهایی</button>
                        <a href="{{route('shifts.index')}}" class="btn btn-danger">بازگشت</a>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>

        function add() {
            var count = document.getElementsByClassName('count').length + 1;
            var txt = '  <div class="count input-group date" style="margin-bottom:5px;margin-top: 10%;">\n' +
                ' <input type="time" required  name="ws[' + count + ']"  placeholder=" زمان شروع ">\n' +
                ' <input type="time" required  name="we[' + count + ']"  placeholder="زمان پایان"  >\n' +
                ' </div> '
            $("#workTime_add").append(txt);
        }

    </script>


@endsection



