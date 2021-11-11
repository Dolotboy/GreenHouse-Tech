@extends('layouts.app')
@section('title', 'Edit Delete Plant')
@section('pageContent')
@parent

<div id='mainContainer'>

    <div id="formContainer">
        <form id="edit" action='{{route('editPlantSent', ['idPlant' => $plant['idPlant'] ])}}' method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30">
                            <div class="product-details">
                                <h3>Edit a plant</h3>
                                <div class="border-bottom pb-3 mb-3">
                                    <h3 class="mb-3">Plant Img: <input type="text" name='plantImg' value="{{ $plant["plantImg"] }}" required></h3>
                                    <h3 class="mb-3">Plant Name: <input type="text" name='plantName' value=" {{ $plant["plantName"] }}" required></h3>
                                    <h3 class="mb-3">Plant Type: <input type="text" name='plantType' value="{{ $plant["plantType"] }}" required></h3>
                                    <h3 class="mb-3">Plant Family: <input type="text" name='plantFamily' value="{{ $plant["plantFamily"] }}" required></h3>
                                    <h3 class="mb-3">Plant Season: <input type="text" name='plantSeason' value="{{ $plant["plantSeason"] }}" required></h3>
                                    <h3 class="mb-3">Plant Ground Type: <input type="text" name='plantGroundType' value="{{ $plant["plantGroundType"] }}" required></h3>
                                    <h3 class="mb-3">Plant Days Conservations: <input type="text" name='plantDaysConservation' value="{{ $plant["plantDaysConservation"] }}" required></h3>
                                    <h3 class="mb-3">Plant Description <input type="text" name='plantDescription' value="{{ $plant["plantDescription"] }}" required></h3>  
                                    <h3 class="mb-3">Plant Difficulty <input type="text" name='plantDifficulty' placeholder="Plant Difficulty" value="{{ $plant["plantDifficulty"] }}" required></h3>
                                    <h3 class="mb-3">Plant Best Neighbor <input type="text" name='plantBestNeighbor' placeholder="Plant Best Neighbor" value="{{ $plant["plantBestNeighbor"] }}" required></h3>     
                                    <h3 class="mb-3"> <input type="submit" name='submit' placeholder="Submit" value="Submit"></h3>                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form id="delete" action='{{route('deletePlant', ['idPlant' => $plant['idPlant'] ])}}' method='post'>
            @csrf
            @method('delete')

            <div class="row">
                <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30">
                            <div class="product-details">
                                <h3>Delete a plant</h3>
                                <div class="border-bottom pb-3 mb-3">
                                    <h3 class="mb-3"> <input type="submit" name='delete' placeholder="Delete" value="delete"></h3>                                  
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

