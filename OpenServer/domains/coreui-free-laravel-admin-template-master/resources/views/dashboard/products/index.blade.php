@extends('dashboard.base')

@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>{{ __('Products') }}</div>
                        <div class="card-body">
                            <div class="row">
                                <a href="{{ route('products.create') }}"
                                   class="btn btn-primary m-2">{{ __('Add Product') }}</a>
                            </div>
                            <br>
                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Short Description</th>
                                    <th>Status</th>
                                    <th>Category</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td><strong>{{ $product->name }}</strong></td>
                                        <td><img src="{{asset('assets/images/products/'.$product->image)}}"
                                                 alt="{{$product->name}}" width="100px"></td>
                                        <td>{{ $product->regular_price }} $</td>
                                        <td>{{ $product->short_description }}</td>
                                        <td>
                                  <span class="ongoing">
                                      {{ $product->status }}
                                  </span>
                                        </td>
                                        <td><strong>{{ $product->category->name }}</strong></td>
                                        <td>
                                            <a href="{{ url('/products/' . $product->id) }}"
                                               class="btn btn-block btn-primary">View</a>
                                        </td>
                                        <td>
                                            <a href="{{ url('/products/' . $product->id . '/edit') }}"
                                               class="btn btn-block btn-primary">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('products.destroy', $product->id ) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-block btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('javascript')

@endsection

