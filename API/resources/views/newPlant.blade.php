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
                                <h3>{{__('interface.homeAddPlant')}}</h3>
                                <div class="border-bottom pb-3 mb-3">
                                    <h3 class="mb-3">{{__('interface.labelPlantImg')}} <input type="text"   name='plantImg' placeholder="image Plant" value="" required></h3>
                                    <h3 class="mb-3">{{__('interface.labelPlantName')}} <input type="text"   name='plantName' placeholder="Plant Name" value="" required></h3>
                                    <h3 class="mb-3"> {{__('interface.labelPlantType')}}
                                        <select id="plantType" name='plantType' required>
                                            <option value="Fruit">{{__('interface.labelFruit')}}</option>
                                            <option value="Légume">{{__('interface.labelVegetable')}}</option>
                                        </select>
                                    </h3>
                                    <h3 class="mb-3">{{__('interface.labelPlantFamily')}}
                                        <select id="plantFamily" name='plantFamily' required>
                                            @foreach ($family as $f)
                                                <option value="{{ $f['familyName'] }}">{{ $f['familyName'] }}</option>
                                            @endforeach
                                        </select>
                                    </h3>
                                    <h3 class="mb-3">{{__('interface.labelPlantSeasons')}} <input type="text"   name='plantSeason' placeholder="Plant Season" value="" required></h3>
                                    <h3 class="mb-3">{{__('interface.labelPlantGroundType')}} <input type="text"   name='plantGroundType' placeholder="Plant Ground Type" value="" required></h3>
                                    <h3 class="mb-3">{{__('interface.labelPlantDaysConservation')}} <input type="text"   name='plantDaysConservation' placeholder="Days of conservation" value="" required></h3>
                                    <h3 class="mb-3">{{__('interface.labelPlantDescription')}} <input type="text"   name='plantDescription' placeholder="Plant Description" value="" required></h3>  
                                    <h3 class="mb-3">{{__('interface.labelPlantDifficulty')}}
                                        <select id="plantDifficulty" name='plantDifficulty' required>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </h3>
                                    <h3 class="mb-3">{{__('interface.labelPlantBestNeighbor')}} <input type="text"   name='plantBestNeighbor' placeholder="Plant Best Neighbor" value="" required></h3>  
                                    <h3 class="mb-3"> <input type="submit" name='submit' value="{{__('interface.submit')}}"></h3>                                       
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
        
        