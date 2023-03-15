
@extends('layout.master')
@section('footer')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<section class="content">
    <div class="container-fluid">
        <div class="row1">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Transfer Money</h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="tab">
                            <button class="tablinks" onclick="openCity(event, 'to')" id="defaultOpen">Transfer to</button>
                            <button class="tablinks" onclick="openCity(event, 'from')">Transfer from</button>
                        </div>
                        <div id="to" class="tabcontent">
                            <form>
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>To</label>
                                        <input type="email" placeholder="Enter email" id="email_to" class="form-control email" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Amount</label>
                                        <input type="text" placeholder="Enter amount to transfer" id="amount_to" class="amount form-control" name="amount" required autofocus>
                                        <span class="text-danger greatervalue"></span>
                                    </div>
                                </div>
                                <input type="hidden" id="type_to" class="type_to" name="type_to" value="d">
                                <span class="text-danger to_validation"></span>
                                <h5 class="text-success success_message" style="display:none;">Amount transfer successfully</h5>
                                <button type="submit" id="transfer_to" class="btn btn-block btn-primary btn-submit">Transfer</button>
                            </form>
                        </div>
                        <div id="from" class="tabcontent">
                            <!-- form start -->
                            <form>
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>From</label>
                                        <input type="text" placeholder="Enter email" id="email_from" class="form-control email" name="email" required>
                                        <span class="text-danger email_from_error"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Amount</label>
                                        <input type="text" placeholder="Enter amount to transfer" id="amount_from" class="amount form-control" name="amount" required autofocus>
                                    </div>
                                </div>
                                <input type="hidden" id="type_from" class="type_from" name="type_from" value="c">
                                <span class="text-danger from_validation"></span>
                                <h5 class="text-success success_message" style="display:none;">Amount deposit successfully</h5>
                                    <button type="submit" id="transfer_from" class="btn btn-block btn-primary btn-submit">Transfer</button>
                                </div>
                            </form> 
                        </div>
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
    //transfer to money form submission
    $("#transfer_to").click(function(e){
        e.preventDefault();
        $(".to_validation").html("");
        if ($("#email_to").val() && $("#amount_to").val()) {
            var email = $("#email_to").val();
            var amount = $("#amount_to").val();
            var type = $("#type_to").val();
            $.ajax({
                type:'POST',
                url:"{{ route('transaction.transfer') }}",
                data:{amount:amount,email:email,type:type},
                success:function(data){
                    $(".success_message").show();
                    setTimeout(function(){
                        $(".success_message").remove();
                        location.reload(true);
                    }, 1000 ); 
                }
            });
        }else{
            $(".to_validation").html("enter email id and amount");
        }
    });

    //transfer from money form submission
    $("#transfer_from").click(function(e){
        e.preventDefault();
        $(".from_validation").html("");
        if ($("#email_from").val() && $("#amount_from").val()) {
            var email = $("#email_from").val();
            var amount = $("#amount_from").val();
            var type = $("#type_from").val();
            $.ajax({
                type:'POST',
                url:"{{ route('transaction.transfer') }}",
                data:{amount:amount,email:email,type:type},
                success:function(data){
                    $(".success_message").show();
                    setTimeout(function(){
                        $(".success_message").remove();
                        location.reload(true);
                    }, 1000 );
                }
            });
        }else{
            $(".from_validation").html("enter email id and amount");
        }
    });

    //validation for to amount
    $("#amount_to").on("keyup", function(){
        var valid = /^\d{0,6}(\.\d{0,2})?$/.test(this.value),
        val = this.value;
        $(".to_validation").html("");
        $(".from_validation").html("");
        if(!valid){
            this.value = val.substring(0, val.length - 1);
        }else{
            var amount = $("#amount_to").val();
            $.ajax({
                type:'POST',
                url:"{{ route('balancecheck') }}",
                data:{amount:amount},
                success:function(data){
                    if(data){
                        $('.greatervalue').text(data);
                        $("#transfer_to").prop('disabled', true);
                    }else{
                        $("#transfer_to").prop('disabled', false);
                        $('.greatervalue').text('');
                    }
                }
            });
        }
    });
    
    //validation for from amount
    $("#amount_from").on("keyup", function(){
        var valid = /^\d{0,6}(\.\d{0,2})?$/.test(this.value),
        val = this.value;
        $(".to_validation").html("");
        $(".from_validation").html("");
        if(!valid){
            this.value = val.substring(0, val.length - 1);
        }
    });
});

//tab content
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
@endsection