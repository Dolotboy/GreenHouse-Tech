@extends('layouts.app')
@section('title', 'Edit Fav Cond Nb')
@section('pageContent')
@parent

<div id='mainContainer'>
    
    <div id="formContainer">
        <form id="form" action="{{route('editFavCondNbSent', ['idCondition' => $favorableCondition['idRangeNb'] ])}}" method='POST'>
            @csrf
            @method('PUT')

            <div class="row">
                <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30">
                            <div class="product-details">
                                <h3>{{__('interface.labelEditCondNumber')}}</h3>
                                <div class="border-bottom pb-3 mb-3">
                                    <h3 class="mb-3">{{__('interface.labelCondNumberType')}}
                                        <select id="type" name='type' required>
                                        @if( $favorableCondition['type'] == "temperature")
                                        {
                                            <option value="temperature" selected>{{__('interface.labelCondNumberTemperature')}}</option>
                                            <option value="humidity">{{__('interface.labelCondNumberHumidity')}}</option>
                                            <option value="ph">{{__('interface.labelCondNumberPh')}}</option>
                                            <option value="plantSpacing">{{__('interface.labelCondNumberPlantSpacing')}}</option>
                                            <option value="exposureTime">{{__('interface.labelCondNumberExposureTime')}}</option>
                                        }
                                        @elseif ($favorableCondition['type'] == "humidity")
                                        {
                                            <option value="temperature">{{__('interface.labelCondNumberTemperature')}}</option>
                                            <option value="humidity" selected>{{__('interface.labelCondNumberHumidity')}}</option>
                                            <option value="ph">{{__('interface.labelCondNumberPh')}}</option>
                                            <option value="plantSpacing">{{__('interface.labelCondNumberPlantSpacing')}}</option>
                                            <option value="exposureTime">{{__('interface.labelCondNumberExposureTime')}}</option>
                                        }
                                        @elseif ($favorableCondition['type'] == "ph")
                                        {
                                            <option value="temperature">{{__('interface.labelCondNumberTemperature')}}</option>
                                            <option value="humidity">{{__('interface.labelCondNumberHumidity')}}</option>
                                            <option value="ph" selected>{{__('interface.labelCondNumberPh')}}</option>
                                            <option value="plantSpacing">{{__('interface.labelCondNumberPlantSpacing')}}</option>
                                            <option value="exposureTime">{{__('interface.labelCondNumberExposureTime')}}</option>
                                        }
                                        @elseif ($favorableCondition['type'] == "plantSpacing")
                                        {
                                            <option value="temperature">{{__('interface.labelCondNumberTemperature')}}</option>
                                            <option value="humidity">{{__('interface.labelCondNumberHumidity')}}</option>
                                            <option value="ph">{{__('interface.labelCondNumberPh')}}</option>
                                            <option value="plantSpacing" selected>{{__('interface.labelCondNumberPlantSpacing')}}</option>
                                            <option value="exposureTime">{{__('interface.labelCondNumberExposureTime')}}</option>
                                        }
                                        @elseif ($favorableCondition['type'] == "exposureTime")
                                        {
                                            <option value="temperature">{{__('interface.labelCondNumberTemperature')}}</option>
                                            <option value="humidity">{{__('interface.labelCondNumberHumidity')}}</option>
                                            <option value="ph">{{__('interface.labelCondNumberPh')}}</option>
                                            <option value="plantSpacing">{{__('interface.labelCondNumberPlantSpacing')}}</option>
                                            <option value="exposureTime" selected>{{__('interface.labelCondNumberExposureTime')}}</option>
                                        }
                                        @endif
                                        </select>
                                    </h3>
                                    <h3 class="mb-3">{{__('interface.labelCondNumberMin')}} <input type="text" name='min' value=" {{ $favorableCondition["min"] }}" required></h3>
                                    <h3 class="mb-3">{{__('interface.labelCondNumberMax')}} <input type="text" name='max' value="{{ $favorableCondition["max"] }}" required></h3>  
                                    <h3 class="mb-3">{{__('interface.labelCondNumberUnit')}} 
                                        <select id="unit" name='unit' required>
                                        @if( $favorableCondition['unit'] == "°C")
                                        {
                                            <option value="°C" selected>°C</option>
                                            <option value="%">%</option>
                                            <option value="ph">PH</option>
                                            <option value="cm">cm</option>
                                            <option value="°H">°H</option>
                                        }
                                        @elseif ($favorableCondition['unit'] == "%")
                                        {
                                            <option value="°C">°C</option>
                                            <option value="%" selected>%</option>
                                            <option value="ph">PH</option>
                                            <option value="cm">cm</option>
                                            <option value="°H">°H</option>
                                        }
                                        @elseif ($favorableCondition['unit'] == "ph")
                                        {
                                            <option value="°C">°C</option>
                                            <option value="%">%</option>
                                            <option value="ph" selected>PH</option>
                                            <option value="cm">cm</option>
                                            <option value="°H">°H</option>
                                        }
                                        @elseif ($favorableCondition['unit'] == "cm")
                                        {
                                            <option value="°C">°C</option>
                                            <option value="%">%</option>
                                            <option value="ph">PH</option>
                                            <option value="cm" selected>cm</option>
                                            <option value="°H">°H</option>
                                        }
                                        @elseif ($favorableCondition['unit'] == "°H")
                                        {
                                            <option value="°C">°C</option>
                                            <option value="%">%</option>
                                            <option value="ph">PH</option>
                                            <option value="cm">cm</option>
                                            <option value="°H" selected>°H</option>
                                        }
                                        @endif
                                        </select>
                                    </h3>
                                    <h3 class="mb-3"> <input type="submit" name='submit' placeholder="Submit" value="{{__('interface.submit')}}"></h3>                                      
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form id="delete" action='{{route('deleteFavConditionNb', ['idCondition' => $favorableCondition['idRangeNb'] ])}}' method='post'>
            @csrf
            @method('delete')

            <div class="row">
                <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30">
                            <div class="product-details">
                                <h3>{{__('interface.labelDeleteCondNumber')}}</h3>
                                <div class="border-bottom pb-3 mb-3">
                                    <h3 class="mb-3"> <input type="submit" name='submit' placeholder="Submit" value="{{__('interface.submit')}}"></h3>                                      
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