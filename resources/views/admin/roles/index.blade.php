@extends('layouts.master')
@section('content')

    <div class="box box-primary">
        <div class="box-header">
            <div class="box-body">
                <div class="row">

                    <form role="form" method="post" action="{{route('roles.store')}}">
                        @csrf

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="name">عنوان نقش</label>
                                    <input type="" class="form-control" id="name" placeholder="عنوان نقش" name="title">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">ذخیره</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <tbody>
                <tr>
                    <th class="text-danger">ردیف</th>
                    <th class="text-danger">عنوان نقش</th>
                    <th class="text-danger"> ویرایش | حذف</th>
                </tr>
                </tbody>
                <tbody id="users">
                @foreach($roles as $role)
                    <tr>
                        <td>{{$index}}</td>
                        <td>
                            <a href="/users/{{$role->id}}">{{$role->title}}</a>
                        </td>
                        <td>
                            <form onsubmit="return confirm('آیا مایل به حذف این نقش هستید؟');"
                                  method="POST" action="/roles/{{$role->id}}">
                                {{csrf_field()}}
                                {{method_field('delete')}}

                                <a href="/users/edit/{{$role->id}}" class="btn btn-primary">ویرایش</a>
                                <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                            </form>
                        </td>
                    </tr>
                    <input type="hidden" {{$index+=1}}>
                @endforeach
                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>
    </div>

@endsection
