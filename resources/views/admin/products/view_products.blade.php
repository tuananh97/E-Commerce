@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Form elements</a> <a href="#" class="current">View Category</a> </div>
      <h1>Products</h1>
      @if(Session::has('flash_messsage_error'))
          <div class="alert alert-error alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button>	
                      <strong>{!! session('flash_messsage_error') !!}</strong>
           </div>
      @endif      
      @if(Session::has('flash_messsage_success'))
          <div class="alert alert-success alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button>	
                      <strong>{!! session('flash_messsage_success') !!}</strong>
           </div>
      @endif      
    </div>
    <div class="container-fluid">
      <hr>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
              <h5>View Categories</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered data-table">
                <thead>
                  <tr>
                    <th>Product ID</th>
                    <th>Category ID</th>
                    <th>Product Name</th>
                    <th>Product Code</th>
                    <th>Product Color</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                  <tr class="gradeX">
                     <td>{{ $product->id }}</td>
                     <td>{{ $product->category_id }}</td>
                     <td>{{ $product->product_name }}</td>
                     <td>{{ $product->product_code }}</td>
                     <td>{{ $product->product_color }}</td>
                     <td>{{ $product->price }}</td>
                     <td>
                         <img src="{{ asset('/images/backend_images/products/small/'.$product->image)}}" style="width:100px">
                     </td>
                    <td class="center">
                      <a href="#myModal{{ $product->id }}" data-toggle="modal" class="btn btn-success btn-mini">Views</a>
                      <a href="{{ url('/admin/edit_product/'.$product->id) }}" class="btn btn-primary btn-mini">Edit</a> 
                      <a rel="{{ $product->id }}" rel1="delete_product" <?php /*href="{{ url('/admin/delete_product/'.$product->id) }}"*/
                      ?>  href="javascript:"  class="btn btn-danger btn-mini deleteRecord">Delete</a>
                    </td>
                  </tr>

                            <div id="myModal{{ $product->id }}" class="modal hide">
                              <div class="modal-header">
                                <button data-dismiss="modal" class="close" type="button">×</button>
                                <h3>Thông tin chi tiết vế {{ $product->product_name }}</h3>
                              </div>
                              <div class="modal-body">
                                        <p>STT: {{ $product->id }}</p>
                                        <p>Loại: {{ $product->category_id }}</p>
                                        <p>Tên sản phẩm: {{ $product->product_name }}</p>
                                        <p>Mã sản phẩm: {{ $product->product_code }}</p>
                                        <p>Màu sản phẩm: {{ $product->product_color }}</p>
                                        <p>Gía sản phẩm: {{ $product->price }}</p>
                              </div>
                            </div>

                     @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection