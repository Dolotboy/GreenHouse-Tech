@extends('layouts.app')
@section('title', 'Add Fav Cond Nb')
@section('pageContent')
@parent

<div id='mainContainer'>
    <form action='{{route('addFavConditionNb')}}' method='POST'>
        @csrf

        <div class="row">
            <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30">
                        <div class="product-details">
                        <h3>{{__('interface.labelAddCondNumber')}}</h3>
                            <div class="border-bottom pb-3 mb-3">
                                <h3 class="mb-3"> {{__('interface.labelCondNumberType')}} 
                                    <select id="type" name='type' required>
                                        <option value="temperature">{{__('interface.labelCondNumberTemperature')}} </option>
                                        <option value="humidity">{{__('interface.labelCondNumberHumidity')}} </option>
                                        <option value="ph">{{__('interface.labelCondNumberPh')}} </option>
                                        <option value="plantSpacing">{{__('interface.labelCondNumberPlantSpacing')}} </option>
                                        <option value="exposureTime">{{__('interface.labelCondNumberExposureTime')}} </option>
                                    </select>
                                </h3>
                                <h3 class="mb-3">{{__('interface.labelCondNumberMin')}}  <input type="text" name='min' placeholder="Min" value="" required></h3>
                                <h3 class="mb-3">{{__('interface.labelCondNumberMax')}}  <input type="text" name='max' placeholder="Max" value="" required></h3>        
                                <h3 class="mb-3">{{__('interface.labelCondNumberUnit')}} 
                                    <select id="unit" name='unit' required>
                                        <option value="°C">°C</option>
                                        <option value="%">%</option>
                                        <option value="ph">PH</option>
                                        <option value="cm">cm</option>
                                        <option value="°H">°H</option>
                                    </select>
                                </h3>                           
                                <h3 class="mb-3"> <input type="submit" name='submit' value="{{__('interface.submit')}} "></h3>                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection