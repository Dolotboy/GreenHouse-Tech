<!--<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <title>Home</title>

        
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body> -->
@extends('layouts.app')
@section('title', 'Home')
@section('pageContent')
@parent
        <div id='mainContainer'>

            <!-- // ****************** FIRST LINE ******************** // -->

            <div class='midContainer'>
                
                <div class='cbtn'>
                    <a href="{{route('newPlant',[app()->getLocale()])}}">
                        <h2>{{__('interface.homeAddPlant')}}</h2> 
                    </a>
                </div>

                <div class='cbtn'>
                    <a href="{{route('editSearchPlant',[app()->getLocale()])}}">
                        <h2>{{__('interface.homeEditDeletePlant')}}</h2> 
                    </a>
                </div>

                <div class='cbtn'>
                    <a href="{{route('detailAllPlant')}}">
                        <h2>{{__('interface.homeSeeAllPlant')}}</h2> 
                    </a>
                </div>

            </div>

            <!-- // ****************** SECOND LINE ******************** // -->

            <div class='midContainer'>
                <div class='cbtn'>
                    <a href="{{route('newProblem',[app()->getLocale()])}}">
                        <h2>{{__('interface.homeAddProblem')}}</h2> 
                    </a>
                </div>

                <div class='cbtn'>
                    <a href="{{route('editSearchProblem',[app()->getLocale()])}}">
                        <h2>{{__('interface.homeEditDeleteProblem')}}</h2> 
                    </a>
                </div>

                <div class='cbtn'>
                    <a href="{{route('detailAllProblem')}}">
                        <h2>{{__('interface.homeSeeAllProblem')}}</h2> 
                    </a>
                </div>

            </div>

            <!-- // ****************** THIRD LINE ******************** // -->

            <div class='midContainer'>
                <div class='cbtn'>
                    <a href="{{route('newFavorite',[app()->getLocale()])}}">
                        <h2>{{__('interface.homeAddFavorite')}}</h2> 
                    </a>
                </div>

                <div class='cbtn'>
                    <a href="{{route('deleteSearchFavorite',[app()->getLocale()])}}">
                        <h2>{{__('interface.homeEditDeleteFavorite')}}</h2>
                    </a>
                </div>

            </div>

            <!-- // ****************** FOURTH LINE ******************** // -->

            <div class='midContainer'>
                <div class='cbtn'>
                    <a href="{{route('newProfile',[app()->getLocale()])}}">
                        <h2>{{__('interface.homeAddProfile')}}</h2> 
                    </a>
                </div>

                <div class='cbtn'>
                    <a href="{{route('editSearchProfile',[app()->getLocale()])}}">
                        <h2>{{__('interface.homeEditDeleteProfile')}}</h2> 
                    </a>
                </div>

                <div class='cbtn'>
                    <a href="{{route('detailAllProfile')}}">
                        <h2>{{__('interface.homeSeeAllProfile')}}</h2> 
                    </a>
                </div>

            </div>

            <!-- // ****************** FIFTH LINE ******************** // -->

            <div class='midContainer'>
                <div class='cbtn'>
                    <a href="{{route('newFavCondDate',[app()->getLocale()])}}">
                        <h2>{{__('interface.homeAddCondDate')}}</h2> 
                    </a>
                </div>

                <div class='cbtn'>
                    <a href="{{route('editSearchFavCondDate',[app()->getLocale()])}}">
                        <h2>{{__('interface.homeEditDeleteCondDate')}}</h2> 
                    </a>
                </div>

            </div>
             <!-- // ****************** SIXTH LINE - FAVORITE CONDITION NB ******************** // -->

             <div class='midContainer'>
                <div class='cbtn'>
                    <a href="{{route('newFavCondNb',[app()->getLocale()])}}">
                        <h2>{{__('interface.homeAddCondNumber')}}</h2> 
                    </a>
                </div>

                <div class='cbtn'>
                    <a href="{{route('editSearchFavCondNb',[app()->getLocale()])}}">
                        <h2>{{__('interface.homeEditDeleteCondNumber')}}</h2> 
                    </a>
                </div>

             </div>

           <!-- // ****************** SEVENTH LINE ******************** // -->

            <div class='midContainer'>
                <div class='cbtn'>
                    <a href="{{route('newAssignFavCondDate',[app()->getLocale()])}}">
                        <h2>{{__('interface.homeAssignCondDate')}}</h2> 
                    </a>
                </div>

                <div class='cbtn'>
                    <a href="{{route('deleteUnassignFavCondDate',[app()->getLocale()])}}">
                        <h2>{{__('interface.homeUnassignCondDate')}}</h2> 
                    </a>
                </div>

            </div>

            <!-- // ****************** EIGHTH LINE ******************** // -->

            <div class='midContainer'>
                <div class='cbtn'>
                    <a href="{{route('newAssignFavCondNb',[app()->getLocale()])}}">
                        <h2>{{__('interface.homeAssignCondNumber')}}</h2> 
                    </a>
                </div>

                <div class='cbtn'>
                    <a href="{{route('deleteUnassignFavCondNb',[app()->getLocale()])}}">
                        <h2>{{__('interface.homeUnassignCondNumber')}}</h2> 
                    </a>
                </div>

            </div>

            <!-- // ****************** NINTH LINE ******************** // -->

            <div class='midContainer'>
                <div class='cbtn'>
                    <a href="{{route('newAssignProblem',[app()->getLocale()])}}">
                        <h2>{{__('interface.homeAssignProblem')}}</h2> 
                    </a>
                </div>

                <div class='cbtn'>
                    <a href="{{route('searchUnassignProblem',[app()->getLocale()])}}">
                        <h2>{{__('interface.homeUnassignProblem')}}</h2> 
                    </a>
                </div>

            </div>

            <!-- // ****************** END ******************** // -->

            <!-- // ****************** TENTH LINE ******************** // -->

            <div class='midContainer'>
                <div class='cbtn'>
                    <a href="{{route('newAssignAdmin',[app()->getLocale()])}}">
                        <h2>{{__('interface.homeAssignAdmin')}}</h2> 
                    </a>
                </div>

                <div class='cbtn'>
                    <a href="{{route('deleteUnassignAdmin',[app()->getLocale()])}}">
                        <h2>{{__('interface.homeUnassignAdmin')}}</h2> 
                    </a>
                </div>
            </div>

            <!-- // ****************** END ******************** // -->

            <!-- // ****************** ELEVENTH LINE ******************** // -->

                        <div class='midContainer'>
                            <div class='cbtn'>
                                <a href="{{route('newFamily',[app()->getLocale()])}}">
                                    <h2>{{__('interface.homeAddFamily')}}</h2> 
                                </a>
                            </div>
            
                            <div class='cbtn'>
                                <a href="{{route('editSearchFamily',[app()->getLocale()])}}">
                                    <h2>{{__('interface.homeEditDeleteFamily')}}</h2> 
                                </a>
                            </div>
                        </div>
            
            <!-- // ****************** END ******************** // -->

        </div>
@endsection

