@extends('layout.master')
@section('footer')
<section class="content">
    <div class="container-fluid">
        <div class="row1">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Statement of account</h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <section class="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-primary">
                                        <div class="table-responsive" >
                                            <!-- /.table begin -->
                                            <table class="table table-bordered mb-5">
                                                <thead>
                                                    <tr class="table-success">
                                                        <th scope="col">#</th>
                                                        <th scope="col">DATETIME</th>
                                                        <th scope="col">AMOUNT</th>
                                                        <th scope="col">TYPE</th>
                                                        <th scope="col">DETAILS</th>
                                                        <th scope="col">BALANCE</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $i = 1; @endphp
                                                    @foreach($transaction as $transactions)
                                                        @php $transtype='';
                                                            if($transactions['type'] == 'c'){
                                                                $transtype = 'Credit';
                                                            }else{
                                                                $transtype = 'Debit';
                                                            }
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $i }}</td>
                                                            <td>{{ $transactions['date'] }} <br>
                                                                {{ date("g:i A", strtotime($transactions['time'])) }}</td>
                                                            <td>{{ $transactions['amount'] }}</td>
                                                            <td>{{ $transtype }}</td>
                                                            <td>{{ $transactions['details'] }} <br> 
                                                                {{ $transactions['email'] }}</td>
                                                            <td>{{ $transactions['balance'] }}</td>
                                                        </tr>
                                                        @php $i++; @endphp
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <span class="mt-3" id="number" >
                                            {!! $transaction->withQueryString()->links('pagination::bootstrap-5') !!}
                                            <span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection