@extends('layouts.app')
@section('title', 'Delete Profile')
@section('pageContent')
@parent

<div id='mainContainer'>
    <form action='{{route('deleteSearchProfile')}}' method='DELETE'>
        @csrf

        <div class="row">
            <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30">
                        <div class="product-details">
                        <h3>Delete your information</h3>
                            <div class="border-bottom pb-3 mb-3">
                                <h3 class="mb-3"> <input type="text" name='email' placeholder="Email" required></h2>
                                <h3 class="mb-3"> <input type="text" name='password' placeholder="Password" required></h3>
                                <h3 class="mb-3"> <input type="text" name='salt' placeholder="Salt" required></h3>   
                                <h3 class="mb-3"> <input type="text" name='firstName' placeholder="First Name" required></h3>
                                <h3 class="mb-3"> <input type="text" name='lastName' placeholder="Last Name" required></h3>   
                                <h3 class="mb-3"> <input type="submit" name='submit' placeholder="Submit"></h3>                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection