@extends('admin.layouts.glance')
@section('title')
    Xóa danh mục
@endsection
@section('content')
    <h1> Xóa danh mục {{$cat->id.' : '.$cat->name}}</h1>
    <div class="row">
        <div class="form-three widget-shadow">
            <form class="form-horizontal" name="category" action="{{url('admin/shop/category/'.$cat->id.'/delete')}}" method="post">
                {{ csrf_field() }}
                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </div>
            </form>
        </div>
    </div>


@endsection
