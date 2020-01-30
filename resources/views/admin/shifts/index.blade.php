@extends('layouts.master')

@section('title')
    شیفت های کاری
@endsection

@section('description')

@endsection

@section('content')
    <div class="col-md-9">

        <a href="{{route('shifts.create')}}" class="btn btn-facebook">افزودن شیفت کاری</a>
        <div class="box">
            {{--        <input onkeyup="Search()" type="text" name="search" id="text" class="form-control col-md-8"--}}
            {{--               style="margin:1% 79% 1% 1%; width: 20%"--}}
            {{--               placeholder="جستجو ">--}}
            <div class="box table-responsive no-padding ">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>عنوان</th>
                        <th>جزئیات</th>
                        <th>تنظیمات زمان های کاری</th>
                        <th>تنظیمات</th>
                    </tr>
                    </thead>
                    @foreach($shifts as $shift)
                        <tr>
                            <td>
                                {{$shift->title}}
                            </td>
                            <td>
                                <a href="{{route('shifts.show',$shift->id)}}" class="btn btn-warning">
                                    مشاهده</a>
                            </td>

                            <td>
                                <div class="btn-group btn-group">
                                    <a href="{{route('shifts.addTimeForm',$shift->id)}}" class="btn btn-success">افزودن</a>
                                    <a href="{{route('shifts.editTime',$shift->id)}}" class="btn btn-info">ویرایش
                                        </a>
                                </div>
                            </td>


                            <td>
                                <form onsubmit="return confirm('آیا مایل به حذف این شیفت کاری می باشید؟');"
                                      method="post"
                                      action="{{route('shifts.destroy',$shift->id)}}">
                                    {{csrf_field()}}
                                    {{method_field('delete')}}
                                    <div class="btn-group btn-group">
                                        <button type="submit" class="btn btn-danger">حذف</button>
                                        <a href="{{route('shifts.edit',$shift->id)}}" class="btn btn-primary">ویرایش</a>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </table>
                <div style="margin-right: 40%">
                    {{$shifts->appends(request()->all())->links()}}
                </div>
            </div>


        </div>
    </div>

@endsection
