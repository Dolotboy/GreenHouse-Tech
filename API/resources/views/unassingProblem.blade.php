@extends('layouts.app')
@section('title', 'Unassign a problem')
@section('pageContent')
@parent

<div id='mainContainer'>
    <form id="form" method='DELETE'>
        @csrf

        <div class="row">
            <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30">
                        <div class="product-details">
                        <h3>Unassign a problem</h3> 
                            <div class="border-bottom pb-3 mb-3">
                                <h2 class="mb-3"> <input type="text" id="v1" name='tblPlant_idPlant' placeholder="idPlant" value="" required></h2>
                                <h3 class="mb-3"> <input type="text" id="v2" name='tblProblem_idProblem' placeholder="idProblem" value="" required></h3>
                                <h3 class="mb-3"> <input type="submit" name='submit' onclick="myFunction()" value="Submit"></input></h3>                                      
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
        let form = document.getElementById("form").action = '/api/unassign/problem/' + v1 + '/' + v2;
    }
</script>

@endsection