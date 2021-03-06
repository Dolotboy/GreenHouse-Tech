@extends('layouts.app')
@section('title', 'Search Profile')
@section('pageContent')
@parent

<div id='mainContainer'>
    <form id="form">
        <div class="row">
            <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30">
                        <div class="product-details">
                        <h3>{{__('interface.labelSearchProfile')}}</h3>
                            <div class="border-bottom pb-3 mb-3">
                                <h3 class="mb-3">{{__('interface.labelProfileId')}} <input type="text" id="v1" name='idProfile' placeholder="idProfile" value="" required></h3>   
                                <h3 class="mb-3"> <input type="submit" onclick="myFunction()" name='submit' value="{{__('interface.submit')}}"></h3>                                       
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
function myFunction() {
    let v1 = document.getElementById('v1').value;
    let form = document.getElementById("form").action = '../edit/profile/' + v1;
}
</script>
@endsection