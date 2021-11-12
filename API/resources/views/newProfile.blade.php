@extends('layouts.app')
@section('title', 'Add Profile')
@section('pageContent')
@parent

<div id='mainContainer'>
        <form action='{{route('addProfile')}}' method='POST'>
            @csrf

            <div class="row">
                <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30">
                            <div class="product-details">
                                <h3>Add your information</h3>
                                <div class="border-bottom pb-3 mb-3">
                                    <h2 class="mb-3"> <input type="email" name='email' placeholder="Email" value="" required></h2>
                                    <h3 class="mb-3"> <input type="password" id='passInput' name='password' placeholder="Password" value="" required></h3>
                                    <input type="checkbox" onclick="showPass()">Show Password</input>
                                    <h3 class="mb-3"> <input type="text" name='firstName' placeholder="First Name" value="" required></h3>
                                    <h3 class="mb-3"> <input type="text" name='lastName' placeholder="Last Name" value="" required></h3>   
                                    <h3 class="mb-3"> <input type="text" name='access' placeholder="Access" value="" required></h3>  
                                    <h3 class="mb-3"> <input type="submit" name='submit' value="Submit"></h3>                             
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
</div>
<script>
function showPass() {
  var x = document.getElementById("passInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
@endsection