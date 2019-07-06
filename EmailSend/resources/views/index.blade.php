@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                  <table class="table table-response table-hove">

                    <tr>
                      <th>#</th>
                      <th>User</th>
                      <th>Email</th>
                      <th>Email</th>
                    </tr>

                      <?php foreach ($emails as $email): ?>

                        <tr>
                          <td>{{$email->id}}</td>
                          <td>{{$email->name}}</td>
                          <td>{{$email->email}}</td>
                          <td>
                            <a href="{{Route('send',$email->id)}}" class="btn btn-success">Send Email</a>
                          </td>
                        </tr>

                      <?php endforeach; ?>

                  </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
