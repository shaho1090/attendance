@extends('layouts.master')
@section('title')
    ویرایش شیفت کاری
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
                            <label> انتخاب گروه کاری مربوط به شیفت {{$shift->title}}</label>
                            <select required name="units[]" class="form-control select2 select2-hidden-accessible"
                                    multiple=""
                                    data-placeholder="انتخاب گروه کاری" style="width: 100%;" tabindex="-1"
                                    aria-hidden="true">
                                @foreach($units as $unit)
                                    <option
                                        {{in_array(($unit->id),$shift->unit->pluck('id')->toArray()) ? 'selected' : ''}} value="{{$unit->id}}">{{$unit->title}} </option>
                                @endforeach
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

