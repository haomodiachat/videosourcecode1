@extends('shipper.layouts.app')

@section('review')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard Shipper</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        Bạn đã đăng nhập shipper thành công!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
