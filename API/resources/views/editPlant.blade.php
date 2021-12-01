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
                                <h3>{{__('interface.labelEditPlant')}}</h3>
                                <div class="border-bottom pb-3 mb-3">
                                    <h3 class="mb-3">{{__('interface.labelPlantImg')}} <input type="text" name='plantImg' value="{{ $plant["plantImg"] }}" required></h3>
                                    <h3 class="mb-3">{{__('interface.labelPlantName')}} <input type="text" name='plantName' value=" {{ $plant["plantName"] }}" required></h3>
                                    <h3 class="mb-3"> {{__('interface.labelPlantType')}}
                                        <select id="plantType" name='plantType'>
                                            @if( $plant['plantType'] == "Fruit")
                                            {
                                                <option value="Fruit" selected>{{__('interface.labelFruit')}}</option>
                                                <option value="Légume">{{__('interface.labelVegetable')}}</option>
                                            }
                                            @else
                                            {
                                                <option value="Fruit">{{__('interface.labelFruit')}}</option>
                                                <option value="Légume" selected>{{__('interface.labelVegetable')}}</option>
                                            }
                                            @endif
                                        </select>
                                    </h3>
                                    <h3 class="mb-3"> {{__('interface.labelVegetable')}}
                                        <select id="plantFamily" name='plantFamily'>
                                            @foreach ($family as $f)
                                            @if($plant['plantFamily'] == $f['familyName'])
                                            { 
                                                <option value="{{ $f['familyName'] }}" selected>{{ $f['familyName'] }}</option>
                                            }   
                                            @else
                                             {
                                                <option value="{{ $f['familyName'] }}">{{ $f['familyName'] }}</option>
                                             }   
                                            @endif
                                            @endforeach
                                        </select>
                                    </h3>
                                    <h3 class="mb-3">{{__('interface.labelPlantSeasons')}} <input type="text" name='plantSeason' value="{{ $plant["plantSeason"] }}" required></h3>
                                    <h3 class="mb-3">{{__('interface.labelPlantGroundType')}} <input type="text" name='plantGroundType' value="{{ $plant["plantGroundType"] }}" required></h3>
                                    <h3 class="mb-3">{{__('interface.labelPlantDaysConservation')}} <input type="text" name='plantDaysConservation' value="{{ $plant["plantDaysConservation"] }}" required></h3>
                                    <h3 class="mb-3">{{__('interface.labelPlantDescription')}} <input type="text" name='plantDescription' value="{{ $plant["plantDescription"] }}" required></h3>  
                                    <h3 class="mb-3"> {{__('interface.labelPlantDifficulty')}} 
                                        <select id="plantDifficulty" name='plantDifficulty'>
                                            @if( $plant['plantDifficulty'] == "1")
                                            {
                                                echo"
                                                <option value='1' selected>1</option>
                                                <option value='2'>2</option>
                                                <option value='3'>3</option>";
                                            }
                                            @elseif( $plant['plantDifficulty'] == "2")
                                            {
                                                echo"
                                                <option value='1'>1</option>
                                                <option value='2' selected>2</option>
                                                <option value='3'>3</option>";
                                            }
                                            @else 
                                            {
                                                echo"
                                                <option value='1'>1</option>
                                                <option value='2'>2</option>
                                                <option value='3' selected>3</option>"; 
                                            }
                                            @endif
                                        </select>
                                    </h3>
                                    <h3 class="mb-3">{{__('interface.labelPlantBestNeighbor')}} <input type="text" name='plantBestNeighbor' placeholder="Plant Best Neighbor" value="{{ $plant["plantBestNeighbor"] }}" required></h3>     
                                    <h3 class="mb-3"> <input type="submit" name='submit' placeholder="Submit" value="{{__('interface.submit')}}"></h3>                                
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
                                <h3>{{__('interface.labelDeletePlant')}}</h3>
                                <div class="border-bottom pb-3 mb-3">
                                    <h3 class="mb-3"> <input type="submit" name='delete' placeholder="Delete" value="{{__('interface.delete')}}"></h3>                                  
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

