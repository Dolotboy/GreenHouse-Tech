@extends('layouts.app')
@section('title', 'Add Plant')
@section('pageContent')
@parent
    <div id='mainContainer'>
        
        <form action='{{route('addPlant')}}' method='Post'>
            @csrf

            <div class="row">
                <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30">
                            <div class="product-details">
                                <h3>Add a plant</h3>
                                <div class="border-bottom pb-3 mb-3">
                                    <h3 class="mb-3">Plant Img: <input type="text"   name='plantImg' placeholder="image Plant" value="" required></h3>
                                    <h3 class="mb-3">Plant Name: <input type="text"   name='plantName' placeholder="Plant Name" value="" required></h3>
                                    <h3 class="mb-3"> Plant Type:
                                        <select id="plantType" name='plantType' required>
                                            <option value="Fruit">Fruit</option>
                                            <option value="Légume">Légume</option>
                                        </select>
                                    </h3>
                                    <h3 class="mb-3"> Plant Family:
                                        <select id="plantFamily" name='plantFamily' required>
                                            @foreach ($family as $f)
                                                <option value="{{ $f['familyName'] }}">{{ $f['familyName'] }}</option>
                                            @endforeach
                                        </select>
                                    </h3>
                                    <h3 class="mb-3"> Plant Seasons: <input type="text"   name='plantSeason' placeholder="Plant Season" value="" required></h3>
                                    <h3 class="mb-3"> Plant Ground Type: <input type="text"   name='plantGroundType' placeholder="Plant Ground Type" value="" required></h3>
                                    <h3 class="mb-3"> Plant Days Conservation: <input type="text"   name='plantDaysConservation' placeholder="Days of conservation" value="" required></h3>
                                    <h3 class="mb-3"> Plant Description: <input type="text"   name='plantDescription' placeholder="Plant Description" value="" required></h3>  
                                    <h3 class="mb-3"> Plant Difficulty: 
                                        <select id="plantDifficulty" name='plantDifficulty' required>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </h3>
                                    <h3 class="mb-3"> Plant Best Neighbor: <input type="text"   name='plantBestNeighbor' placeholder="Plant Best Neighbor" value="" required></h3>  
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
        
        