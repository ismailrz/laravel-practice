@extends('master')

@section('content')

<table class="table table-borderless table-dark">
  <thead>
    <tr>
      <th scope="col">SL</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Mobile</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
      @<?php foreach ($Ismail as  $value): ?>
        <tr>
        <th scope="row">{{$i++}}</th>
        <td>{{$value->fname}}</td>
        <td>{{$value->lname}}</td>
        <td>{{$value->email}}</td>
        <td>{{$value->password}}</td>
        <td>{{$value->mobile}}</td>
        <td>
          <a href="{{Route('edit',$value->id )}}" class="btn btn-success">Edit</a>


          </td>
          <td>
          <form class="form-inline" action="{{Route('delete',$value->id)}}" method="post">
            {{ csrf_field() }}

            <input type="submit" class="btn btn-danger" name="" value="Delete">
          </form>

        </td>
      </tr>
      <?php endforeach; ?>
  </tbody>
</table>



@endsection
