@extends('layouts.app')
@section('title', 'Edit Problem')
@section('pageContent')
@parent

<div id='mainContainer'>

    <div id="formContainer">
        <form id="form" method='POST'>
            @csrf
            @method('PUT')

            <div class="row">
                <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30">
                            <div class="product-details">
                            <h3>Edit a problem</h3>
                                <div class="border-bottom pb-3 mb-3">
                                    <h2 class="mb-3"> <input type="text"   id='v1' name='problemType' placeholder="Problem Type" value="{{ $problem["problemType"] }}" required></h2> 
                                    <h2 class="mb-3"> <input type="text"   id='v2' name='problemSolution' placeholder="Problem Solution" value="{{ $problem["problemSolution"] }}" required></h2> 
                                    <h3 class="mb-3"> <input type="text"   id='v3' name='problemName' placeholder="Problem Name" value="{{ $problem["problemName"] }}" required></h2>     
                                    <h2 class="mb-3"> <input type="submit" name='submit' placeholder="Submit" onclick="Edit()" value="Submit"></h2>                             
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form id="delete" method='DELETE'>
            @csrf

            <div class="row">
                <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30">
                            <div class="product-details">
                            <h3>Delete a problem</h3>
                                <div class="border-bottom pb-3 mb-3">
                                    <h2 class="mb-3"> <input type="text"   name='problemType' placeholder="Problem Type" value="{{ $problem["problemType"] }}" required></h2> 
                                    <h2 class="mb-3"> <input type="text"   name='problemSolution' placeholder="Problem Solution" value="{{ $problem["problemSolution"] }}" required></h2> 
                                    <h3 class="mb-3"> <input type="text"   name='problemName' placeholder="Problem Name" value="{{ $problem["problemName"] }}" required></h2>     
                                    <h2 class="mb-3"> <input type="submit" name='submit' placeholder="Delete" onclick="Delete()" value="Delete"></h2>                             
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function Delete(){
        var idProblem = value="{{ $problem["idProblem"] }}";
        let form = document.getElementById("delete").action = '../../../../api/delete/problem/' + idProblem;
    }

    function Edit()
    {
        let v1 = document.getElementById('v1').value;
        let v2 = document.getElementById('v2').value;
        let v3 = document.getElementById('v3').value;
        var idProblem = value="{{ $problem["idProblem"] }}";
        // https://www.codecheef.org/article/how-to-use-laravel-route-in-javascript-file
        let form = document.getElementById("form").action = {{route('editPlantSent', $problem["idProblem"], ['problemName'=>v1, 'problemType'=>v2, 'problemSolution'=>v3])}};
    }
</script>

@endsection