@extends('layouts.master')
@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"> مرخصی های خاص</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post" action="{{route('specialVacation.store')}}">
            @csrf
            <div class="box-body">
                <div class="col-sm-5">
                    <div class="form-group">
                        <select class="form-control" size="1" name="vacation_id">
                            <option value="" disabled selected>نوع مرخصی</option>
                            @foreach($vacationTypes as $vacationType)
                                <option value="{{ $vacationType->id }} ">
                                    {{ $vacationType->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="amount">مقدار</label>
                        <input type="" class="form-control" id="name" placeholder="مقدار مجاز" name="amount">
                    </div>
                    <label for="employment">انتخاب کارمند</label>
                    <select class="form-control" size="1" name="user_id">
                        <option value="" disabled selected>انتخاب کارمند</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }} ">
                                {{ $user->name. ' '.$user->family }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">ذخیره</button>
            </div>
        </form>
    </div>
    <div class="box-body">
        <div class="overflow-hidden">
            <div class="float-right">برای مشاهده لیست مرخصی های خاص یک عنوان را انتخاب کنید
            </div>
            <div class="float-left col-sm-3"><select class="form-control" size="1" name="vacation_id">
                    <option value="" disabled selected>نوع مرخصی</option>
                    @foreach($vacationTypes as $vacationType)
                        <option value="{{ $vacationType->id }} ">
                            {{ $vacationType->title }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <table id="example2" class="table table-bordered table-hover">
            <tbody>
            <tr>
                <th class="text-danger">نام</th>
                <th class="text-danger">نام خانوادگی</th>
                <th class="text-danger">نوع مرخصی</th>
                <th class="text-danger">مقدار مجاز تعریف شده</th>
            </tr>
            </tbody>
            <tbody id="users">
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->family}}</td>
                    <td>
                        <a href="/vacationType/{{$vacationType->id}}">{{$vacationType->title}}</a>
                    </td>
                    <td>{{$user->id}}</td>
                    <td>
                        <form onsubmit="return confirm('آیا مایل به حذف این کاربر هستید؟');"
                              method="POST" action="/vacationType/{{$vacationType->id}}">
                            {{csrf_field()}}
                            {{method_field('delete')}}

                            <a href="/vacationType/edit/{{$vacationType->id}}" class="btn btn-primary">ویرایش</a>
                            <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </div>
    </div>

@endsection
