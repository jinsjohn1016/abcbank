@extends('layout.master')
@section('footer')
<section class="content">
    <div class="container-fluid">
        <div class="row1">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Welcome {{ $users['name'] }}</h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-sm">
                            <tr>
                                <td>YOUR ID</td>
                                <td>: {{ $users['email'] }}</td>
                            </tr>
                            <tr>
                                <td>YOUR BALANCE</td>
                                <td>: {{ $balance }}</td>
                            </tr>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection