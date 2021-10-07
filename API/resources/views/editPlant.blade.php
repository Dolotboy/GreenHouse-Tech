@extends('layouts.app')
@section('title', 'Edit Plant')
@section('pageContent')
@parent

<div id='mainContainer'>
    <form id="form" method='POST'>
        @csrf

        <div class="row">
            <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30">
                        <div class="product-details">
                        <h3>Edit a plant</h3>
                            <div class="border-bottom pb-3 mb-3">
                                <h2 class="mb-3"> <input type="text" name='plantImg' value="{{ $plant["plantImg"] }}"></h2>
                                <h2 class="mb-3"> <input type="text" name='plantName' value=" {{ $plant["plantName"] }}"></h2>
                                <h2 class="mb-3"> <input type="text" name='plantType' value="{{ $plant["plantType"] }}"></h2>
                                <h2 class="mb-3"> <input type="text" name='plantFamily' value="{{ $plant["plantFamily"] }}"></h2>
                                <h2 class="mb-3"> <input type="text" name='plantSeason' value="{{ $plant["plantSeason"] }}"></h3>
                                <h2 class="mb-3"> <input type="text" name='plantGroundType' value="{{ $plant["plantGroundType"] }}"></h3>
                                <h2 class="mb-3"> <input type="text" name='plantDaysConservation' value="{{ $plant["plantDaysConservation"] }}"></h3>
                                <h2 class="mb-3"> <input type="text" name='plantDescription' value="{{ $plant["plantDescription"] }}"></h3>  
                                <h3 class="mb-3"> <input type="text" name='plantState' placeholder="Plant State" value="{{ $plant["plantState"] }}"></h3>
                                <h3 class="mb-3"> <input type="text" name='plantDifficulty' placeholder="Plant Difficulty" value="{{ $plant["plantDifficulty"] }}"></h3>
                                <h3 class="mb-3"> <input type="text" name='lifeTime' placeholder="Life Time" value="{{ $plant["lifeTime"] }}"></h3>
                                <h3 class="mb-3"> <input type="text" name='plantBestNeighbor' placeholder="Plant Best Neighbor" value="{{ $plant["plantBestNeighbor"] }}"></h3>     
                                <h3 class="mb-3"> <input type="submit" name='submit' placeholder="Submit" value="Submit"></h3>                                      
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection