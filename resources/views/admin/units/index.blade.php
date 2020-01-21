@extends('layouts.master')

@section('title')
    گروه های کاری
@endsection

@section('description')

@endsection

@section('content')

<div class="box">
    {{--        <input onkeyup="Search()" type="text" name="search" id="text" class="form-control col-md-8"--}}
    {{--               style="margin:1% 79% 1% 1%; width: 20%"--}}
    {{--               placeholder="جستجو ">--}}
    <div class="box table-responsive no-padding">

        <table class="table table-hover">
            <thead>
            <tr>
                <th>عنوان</th>
                <th>تنظیمات</th>
            </tr>
            </thead>
            @foreach($units as $unit)
                <tr>
                    <td>
                        {{$unit->title}}
                    </td>

                    <td>
                        <form onsubmit="return confirm('آیا مایل به حذف این گروه کاری می باشید؟');" method="post"
                              action="">
{{--                            {{csrf_field()}}--}}
{{--                            {{method_field('delete')}}--}}
                            <div class="btn-group btn-group-xs">
                                <button type="submit" class="btn btn-danger">حذف</button>
                                <a href=""  class="btn btn-danger">ویرایش</a>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach

        </table>
        <div style="margin-right: 40%">
            {{$units->appends(request()->all())->links()}}
        </div>
    </div>


</div>

@endsection
