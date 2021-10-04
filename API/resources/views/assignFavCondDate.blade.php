@extends('layouts.app')
@section('title', 'Assign fav cond date')
@section('pageContent')
@parent

<div id='mainContainer'>
    <form method='POST' id="form"> 
        @csrf

        <div class="row">
            <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30">
                        <div class="product-details">
                        <h3>Assign a favorite condition date to a plant</h3>
                            <div class="border-bottom pb-3 mb-3">
                                <h2 class="mb-3"><input type="text" id="v1" name='TblPlant_idPlant' placeholder="idPlant" value=""></h2>
                                <h3 class="mb-3"><input type="text" id="v2" name='tblDateRangeFav_idRangeDate' placeholder="idRangeDate" value=""></h3>
                                <h3 class="mb-0 text-primary"><button type="submit" name='submit' onclick="myFunction()" placeholder="Submit" value="Submit"></button></h3>                                      
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
        let v2 = document.getElementById('v2').value;
        let form = document.getElementById("form").action = '/api/assign/condition/date/' + v1 + '/' + v2;
    }
    </script>
@endsection