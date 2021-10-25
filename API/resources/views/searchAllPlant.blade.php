@extends('layouts.app')
@section('title', 'View All Plant')
@section('pageContent')
@parent
<div id='mainContainer'>
    <div class="row">
        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30">
                    <div class="product-details">
                        <div class="border-bottom pb-3 mb-3">
                            <h2 class="mb-3"> <p type="text" value="{{ $plant["plantImg"] }}"></p>
                            <h3 class="mb-3"> <p type="text" value="{{ $plant["plantName"] }}"></p>
                            <h3 class="mb-3"> <p type="text" value="{{ $plant["plantType"] }}"></p>
                            <h3 class="mb-3"> <p type="text" value="{{ $plant["plantFamily"] }}"></p>
                            <h3 class="mb-3"> <p type="text" value="{{ $plant["plantSeason"] }}"></p>
                            <h3 class="mb-3"> <p type="text" value="{{ $plant["plantGroundType"] }}"></p>
                            <h3 class="mb-3"> <p type="text" value="{{ $plant["plantDaysConversation"] }}"></p>
                            <h3 class="mb-3"> <p type="text" value="{{ $plant["plantDescription"] }}"></p> 
                            <h3 class="mb-3"> <p type="text" value="{{ $plant["plantDifficulty"] }}"></p>
                            <h3 class="mb-3"> <p type="text" value="{{ $plant["plantBestNeighbor"] }}"></p>                                   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
        
        