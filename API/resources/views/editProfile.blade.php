@extends('layouts.app')
@section('title', 'Edit Profile')
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
                        <h3>Edit a profile</h3>
                            <div class="border-bottom pb-3 mb-3">
                                <h2 class="mb-3"> <input type="text"  name='email'   value="{{ $profile["email"] }}" required></h2>
                                <h3 class="mb-3"> <input type="text"  name='password' value="{{ $profile["password"] }}" required></h3>      
                                <h3 class="mb-3"> <input type="text"  name='firstName' value="{{ $profile["firstName"] }}" required></h3>
                                <h3 class="mb-3"> <input type="text"  name='lastName'   value="{{ $profile["lastName"] }}" required></h3>   
                                <h3 class="mb-3"> <input type="text"  name='access'   value="{{ $profile["access"] }}" required></h3>  
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