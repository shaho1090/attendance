@extends('layouts.master')
@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">تعریف نوع مرخصی جدید</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post" action="{{route('vacationType.store')}}">
            @csrf
            <div class="box-body">
                <div class="col-sm-5">
                    <div class="form-group">
                        <label for="name">عنوان مرخصی</label>
                        <input type="" class="form-control" id="name" placeholder="عنوان مرخصی" name="title">
                    </div>
                    <div class="form-group">
                        <label for="name"> مقدار مجاز سالیانه</label>
                        <input type="" class="form-control" id="name" placeholder="مقدار مجاز" name="default_amount">
                    </div>
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">ذخیره</button>
            </div>
        </form>
    </div>
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <tbody>
                <tr>
                    <th class="text-danger">نوع مرخصی</th>
                    <th class="text-danger">مقدار مجاز سالیانه</th>
                </tr>
                </tbody>
                <tbody id="users">
                @foreach($vacationTypes as $vacationType)
                    <tr>
                        <td>
                            <a href="/vacationType/{{$vacationType->id}}">{{$vacationType->title}}</a>
                        </td>
                        <td>{{$vacationType->default_amount}}</td>
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
