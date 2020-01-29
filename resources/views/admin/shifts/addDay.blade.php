@extends('layouts.master')
@section('title')
    شیفت کاری کاری
@endsection

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="box box-primary">
                <form method="post"
                      action="{{route('shifts.addDays',$shift)}}">
                    {{csrf_field()}}

                    <div class="box-body">
                        <div class="form-group">
                            <label> افزودن روزهای کاری به شیفت {{$shift->title}} </label>
                            <select required name="days[]" class="form-control select2 select2-hidden-accessible"
                                    multiple=""
                                    data-placeholder="انتخاب روز" style="width: 100%;" tabindex="-1"
                                    aria-hidden="true">
                                @foreach($days as $day)
                                    <option value="{{$day->id}}">{{$day->label}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div style="direction: ltr" class="box-footer">
                        <button type="submit" class="btn btn-primary">ثبت نهایی</button>
                        <a href="{{route('shifts.index')}}" class="btn btn-danger">بازگشت</a>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>

    </script>


@endsection



