
@extends('layout.master')
@section('footer')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<section class="content">
    <div class="container-fluid">
        <div class="row1">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Withdraw Money</h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <section class="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-primary">
                                        <!-- form start -->
                                        <form>
                                            {{ csrf_field() }}
                                            <div class="card-body"> 
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Amount</label>
                                                    <input type="text" placeholder="Enter amount to withdraw" id="amount" class="form-control" name="amount" required autofocus>
                                                    <span class="text-danger greatervalue"></span>
                                                </div>
                                            </div>
                                            <h5 class="text-success success_message" style="display:none;">Amount withdraw successfully</h5>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-block btn-primary btn-submit">withdraw</button>
                                            </div>
                                        </form>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //withdraw money form submission
    $(".btn-submit").click(function(e){
        $(".greatervalue").html("");
        e.preventDefault();
        if ($("#amount").val()) {
            var amount = $("#amount").val();
            $.ajax({
                type:'POST',
                url:"{{ route('transaction.withdraw') }}",
                data:{amount:amount},
                success:function(data){
                    $(".success_message").show();
                    setTimeout(function(){
                        $(".success_message").remove();
                        location.reload(true);
                    }, 1000 );
                    $(".btn-submit").prop('disabled', true);
                }
            });
        }else{
            $(".greatervalue").html("enter amount");
        }
    });

    //validation for amount
    $("#amount").on("keyup", function(){
        var valid = /^\d{0,6}(\.\d{0,2})?$/.test(this.value),
        val = this.value;
        $(".greatervalue").html("");
        if(!valid){
            this.value = val.substring(0, val.length - 1);
        }else{
            var amount = $("#amount").val();
            $.ajax({
                type:'POST',
                url:"{{ route('balancecheck') }}",
                data:{amount:amount},
                success:function(data){
                    if(data){
                        $('.greatervalue').text(data);
                        $(".btn-submit").prop('disabled', true);
                    }else{
                        $(".btn-submit").prop('disabled', false);
                        $('.greatervalue').text('');
                    }
                }
            });
        }
    });
});
</script>
@endsection