@extends('layouts.app')
@section('title', 'Edit Problem')
@section('pageContent')
@parent

<div id='mainContainer'>

    <div id="formContainer">
        <form id="form" action="{{route('editProblemSent', ['idProblem' => $problem['idProblem'] ])}}" method='POST'>
            @csrf
            @method('PUT')

            <div class="row">
                <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30">
                            <div class="product-details">
                            <h3>{{__('interface.labelEditProblem')}}</h3>
                                <div class="border-bottom pb-3 mb-3">
                                    <h3 class="mb-3">{{__('interface.labelProblemType')}} <input type="text"   id='v1' name='problemType' placeholder="Problem Type" value="{{ $problem["problemType"] }}" required></h3> 
                                    <h3 class="mb-3">{{__('interface.labelProblemSolution')}} <input type="text"   id='v2' name='problemSolution' placeholder="Problem Solution" value="{{ $problem["problemSolution"] }}" required></h3> 
                                    <h3 class="mb-3">{{__('interface.labelProblemName')}} <input type="text"   id='v3' name='problemName' placeholder="Problem Name" value="{{ $problem["problemName"] }}" required></h3>     
                                    <h2 class="mb-3"> <input type="submit" name='submit' placeholder="Submit" value="{{__('interface.submit')}}"></h2>                             
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form id="delete" action='{{route('deleteProblem', ['idProblem' => $problem['idProblem'] ])}}' method='post'>
            @csrf
            @method('delete')

            <div class="row">
                <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30">
                            <div class="product-details">
                            <h3>{{__('interface.labelDeleteProblem')}}</h3>
                                <div class="border-bottom pb-3 mb-3">
                                    <h2 class="mb-3"> <input type="submit" name='submit' placeholder="Delete" value="{{__('interface.delete')}}"></h2>                             
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection