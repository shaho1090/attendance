@extends('layouts.master')
@section('title')
    جزئیات شیفت کاری
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <form method="post"
                      action="">
                    {{csrf_field()}}
                    {{method_field('patch')}}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title" class="text-danger"><span>عنوان شیفت</span></label>
                            <p>{{$shift->title}}</p>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title"  class="text-danger"><span>گروه های کاری </span></label>
                            <br>
                            @foreach($shift->unit as $unit)
                                <p>{{$unit->title}}</p>
                            @endforeach
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title"  class="text-danger"><span>روزهای کاری </span></label>
                            <br>
                            <br>
                            @foreach($shift->days as $day)
                                <b>{{$day->title}}</b>
                                <br>
                                @foreach($day->workTimes as $time)
                                    <i>  شروع : {{$time->start}}  پایان : {{$time->end}}</i>
                                    <br>
                                @endforeach
                                <br>
                            @endforeach
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">ویرایش</button>
                        <a href="{{route('shifts.index')}}" class="btn btn-danger">بازگشت</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

