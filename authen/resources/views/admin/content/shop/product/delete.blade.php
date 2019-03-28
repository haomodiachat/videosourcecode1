@extends('admin.layouts.glance')
@section('title')
    Xóa sản phẩm
@endsection
@section('content')
    <h1> Xóa sản phẩm {{$product->id.' : '.$product->name}}</h1>
    <div class="row">
        <div class="form-three widget-shadow">
            <form class="form-horizontal" name="category" action="{{url('admin/shop/product/'.$product->id.'/delete')}}" method="post">
                {{ csrf_field() }}
                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </div>
            </form>
        </div>
    </div>


@endsection
