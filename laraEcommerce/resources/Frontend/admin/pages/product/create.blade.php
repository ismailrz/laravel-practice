


@extends('admin.layouts.master')

@section('content')

<div class="main-panel">
  <div class="content-wrapper">

    <div class="card">
      <div class="card-header">
        Add Product
      </div>
      <div class="card-body">
        <form action="{{Route('admin.product.store')}}" method="post"  enctype="multipart/form-data">

          {{csrf_field()}}

          @include('admin.partials.messages')

      <div class="form-group">
        <label for="exampleInputEmail1">Title</label>
        <input type="text" class="form-control" name="title" id="exampleInputEmail1"  placeholder="Enter title">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Description</label>
        <textarea name="description" rows="8" cols="80" class="form-control" placeholder="Description"></textarea>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Price</label>
        <input type="number" class="form-control" name="price" id="exampleInputEmail1"  placeholder="Enter price">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Quantity</label>
        <input type="number" class="form-control" name="quantity" id="exampleInputEmail1"  placeholder="Enter quantity">
      </div>


      <div class="form-group">
        <label for="ProductImage">Product Image</label>

        <div class="row">
          <div class="col-md-4">
            <input type="file" class="form-control" name="product_image[]" id="exampleInputEmail1"  placeholder="Product Image">
          </div>
          <div class="col-md-4">
            <input type="file" class="form-control" name="product_image[]" id="exampleInputEmail1"  placeholder="Product Image">
          </div>
          <div class="col-md-4">
            <input type="file" class="form-control" name="product_image[]" id="exampleInputEmail1"  placeholder="Product Image">
          </div>
          <div class="col-md-4">
            <input type="file" class="form-control" name="product_image[]" id="exampleInputEmail1"  placeholder="Product Image">
          </div>
          <div class="col-md-4">
            <input type="file" class="form-control" name="product_image[]" id="exampleInputEmail1"  placeholder="Product Image">
          </div>
        </div>
      </div>


      <button type="submit" class="btn btn-primary">Add Product</button>
    </form>

      </div>

    </div>

  </div>
</div>
<!-- main-panel ends -->


@endsection
