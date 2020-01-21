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
            </table>
            <div style="margin-right: 40%">
                {{--            {{$units->appends(request()->all())->links()}}--}}
            </div>
        </div>


    </div>

@endsection
