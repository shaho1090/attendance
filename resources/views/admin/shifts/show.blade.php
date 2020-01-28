@extends('layouts.master')
@section('title')
    جزئیات شیفت کاری
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="form-group">
                        <label for="title" class="text-danger"><span>عنوان شیفت</span></label>
                        <p>{{$shift->title}}</p>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="title" class="text-danger"><span>گروه های کاری </span></label>
                        <br>
                        @foreach($shift->unit as $unit)
                            <p>{{$unit->title}}</p>
                        @endforeach
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="title" class="text-danger"><span>روزهای کاری </span></label>
                        <br>
                        <br>
                        @foreach($shift->days as $day)
                            <b>{{$day->title}}</b>
                            <br>
                            @foreach($day->workTimes as $time)
                                <i> شروع : {{$time->start}} پایان : {{$time->end}}</i>
                                <br>
                            @endforeach
                            <br>
                        @endforeach
                    </div>
                </div>
                <form action="">
                    <div class="box-body">
                        <div class="form-group-lg">
                            <select required name="updateType" id="">
                                <option disabled selected>یکی از گزینه های زیر را انتخاب کنید</option>
                                <option value="title">ویرایش نام شیفت</option>
                                <option value="unit">ویرایش گروه های کاری این شیفت</option>
                                <option value="workTime">ویرایش روزهای کاری این شیفت</option>
                            </select>
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

