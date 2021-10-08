@extends('layouts.app')
@section('title', 'Edit Problem')
@section('pageContent')
@parent

<div id='mainContainer'>
    <form id="form">
        <div class="row">
            <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30">
                        <div class="product-details">
                        <h3>Edit your problem</h3>
                            <div class="border-bottom pb-3 mb-3">
                                <h2 class="mb-3"><input type="text" id="v1" name='idProblem' placeholder="idProblem" value="" required></h2>   
                                <h3 class="mb-3"><input type="submit" onclick="myFunction()" name='submit' placeholder="Submit"></h3>                             
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
        let form = document.getElementById("form").action = '../api/edit/problem/editProblem/' + v1;
    }
</script>

@endsection