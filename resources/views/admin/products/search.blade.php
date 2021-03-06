@extends('layouts.app')

@section('title')
    Products
    @parent
@stop

{{-- Page content --}}
@section('content')
    <section class="content-header">
        <h1>Products</h1>
        <ol class="breadcrumb">
            <li>
                <a href=""> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                    Dashboard
                </a>
            </li>
            <li>Products</li>
            <li class="active">Products Search</li>
        </ol>
    </section>
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <div class="card border-primary ">
                        <div class="card-header bg-primary text-white">
                            <h4 class="card-title float-left"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                Tìm kiếm sản phẩm theo ID
                            </h4>
                        </div>
                        <br />
                        <div class="card-body table-responsive">
                            <form action="{{ route('products.search') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input id="product_id" class="form-control" name="product_id" type="text" value="{{ old('product_id') }}" placeholder="Product ID">
                                </div>
                                <input class="btn btn-info" type="submit" value="Search">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
