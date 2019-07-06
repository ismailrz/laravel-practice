


@extends('admin.layouts.master')

@section('content')

<div class="main-panel">
  <div class="content-wrapper">

    <div class="card">
      <div class="card-header">
      Manage Product
      </div>
      <div class="card-body">
        @include('admin.partials.messages')
        <table class="table table-hover table-striped">
          <tr>
            <th>#</th>
            <th>Product Title</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Action</th>
          </tr>

          @foreach($products as $product)
          <tr>
            <td>#</td>
            <td>{{$product->title}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->quantity}}</td>
            <td >
              <a href="{{Route('admin.product.edit',$product->id)}} " class="btn btn-success">Edit</a>
            </td>

                <!-- Button trigger modal -->
            <td><a href="#deleteModal{{$product->id}}" data-toggle ="modal" class="btn btn-danger"  data-target="#exampleModal" >Delete</a> </td>

                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                  Launch demo modal
                </button> -->

                <!-- DeleteModal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">

                        <form class="" action="{{Route('admin.product.delete', $product->id)}}" method="post">
                          {{csrf_field()}}
                          <button type="submit" class="btn btn-danger" >Permanent Delete!</button>

                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                      </div>
                    </div>
                  </div>
                </div>
              </td>

          </tr>
          @endforeach

        </table>

      </div>

    </div>

  </div>
</div>
<!-- main-panel ends -->


@endsection
