@extends('layouts.app')
@section('title', 'New Problem')
@section('pageContent')
@parent

<div id='mainContainer'>
        
        <form action='{{route('addProblem')}}' method='Post'>
            @csrf

            <div class="row">
                <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30">
                            <div class="product-details">
                            <h3>Add a problem</h3>
                                <div class="border-bottom pb-3 mb-3">
                                    <h2 class="mb-3"> <input type="text" name='problemType' placeholder="Problem Type" value="" required></h2>
                                    <h3 class="mb-3"> <input type="text" name='problemSolution' placeholder="Problem Solution" value="" required></h3>
                                    <h3 class="mb-3"> <input type="text" name='problemName' placeholder="Problem Name" value="" required></h3>    
                                    <h3 class="mb-3"> <input type="submit" name='submit' value="Submit"></h3>                             
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection