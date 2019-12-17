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
                    @include('flash::message')
                    <div class="card border-primary ">
                        <div class="card-header bg-primary text-white">
                            <h4 class="card-title float-left"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                Kết quả tìm kiếm
                            </h4>
                        </div>
                        <br />
                        <div class="card-body table-responsive">
                            <h3 class="page-title text-center">Product found: {{ $product->name }}</h3>
                            <b class="page-title text-center">Count</b>: {{ $product->count }}
                            <br>
                            <b class="page-title text-center">Created at</b>: {{ $product->created_at }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
