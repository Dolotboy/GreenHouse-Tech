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
                    <a href="{{route('newPlant')}}">
                        <h2>Ajouter une plante</h2> 
                    </a>
                </div>

                <div class='cbtn'>
                    <a href="{{route('editSearchPlant')}}">
                        <h2>Modifier/Supprimer une plante</h2> 
                    </a>
                </div>

                <div class='cbtn'>
                    <a href="{{route('detailAllPlant')}}">
                        <h2>Voir tout les plantes</h2> 
                    </a>
                </div>

            </div>

            <!-- // ****************** SECOND LINE ******************** // -->

            <div class='midContainer'>
                <div class='cbtn'>
                    <a href="{{route('newProblem')}}">
                        <h2>Ajouter un problème</h2> 
                    </a>
                </div>

                <div class='cbtn'>
                    <a href="{{route('editSearchProblem')}}">
                        <h2>Modifier/Supprimer un problème</h2> 
                    </a>
                </div>

                <div class='cbtn'>
                    <a href="{{route('detailAllProblem')}}">
                        <h2>Voir tout les problèmes</h2> 
                    </a>
                </div>

            </div>

            <!-- // ****************** THIRD LINE ******************** // -->

            <div class='midContainer'>
                <div class='cbtn'>
                    <a href="{{route('newFavorite')}}">
                        <h2>Ajouter un favori</h2> 
                    </a>
                </div>

                <div class='cbtn'>
                    <a href="{{route('deleteSearchFavorite')}}">
                        <h2>Supprimer un favori</h2>
                    </a>
                </div>

            </div>

            <!-- // ****************** FOURTH LINE ******************** // -->

            <div class='midContainer'>
                <div class='cbtn'>
                    <a href="{{route('newProfile')}}">
                        <h2>Ajouter un profil</h2> 
                    </a>
                </div>

                <div class='cbtn'>
                    <a href="{{route('editSearchProfile')}}">
                        <h2>Modifier/Supprimer un profil</h2> 
                    </a>
                </div>

                <div class='cbtn'>
                    <a href="{{route('detailAllProfile')}}">
                        <h2>Voir tous les profils</h2> 
                    </a>
                </div>

            </div>

            <!-- // ****************** FIFTH LINE ******************** // -->

            <div class='midContainer'>
                <div class='cbtn'>
                    <a href="{{route('newFavCondDate')}}">
                        <h2>Ajouter une condition favorable Date</h2> 
                    </a>
                </div>

                <div class='cbtn'>
                    <a href="{{route('editSearchFavCondDate')}}">
                        <h2>Modifier/Supprimer une condition favorable Date</h2> 
                    </a>
                </div>

            </div>
             <!-- // ****************** SIXTH LINE - FAVORITE CONDITION NB ******************** // -->

             <div class='midContainer'>
                <div class='cbtn'>
                    <a href="{{route('newFavCondNb')}}">
                        <h2>Ajouter une condition favorable Nb</h2> 
                    </a>
                </div>

                <div class='cbtn'>
                    <a href="{{route('editSearchFavCondNb')}}">
                        <h2>Modifier/Supprimer une condition favorable Nb</h2> 
                    </a>
                </div>

             </div>

           <!-- // ****************** SEVENTH LINE ******************** // -->

            <div class='midContainer'>
                <div class='cbtn'>
                    <a href="{{route('newAssignFavCondDate')}}">
                        <h2>Assigner une condition favorable Date</h2> 
                    </a>
                </div>

                <div class='cbtn'>
                    <a href="{{route('deleteUnassignFavCondDate')}}">
                        <h2>Désassigner une condition favorable Date</h2> 
                    </a>
                </div>

            </div>

            <!-- // ****************** EIGHTH LINE ******************** // -->

            <div class='midContainer'>
                <div class='cbtn'>
                    <a href="{{route('newAssignFavCondNb')}}">
                        <h2>Assigner une condition favorable Nb</h2> 
                    </a>
                </div>

                <div class='cbtn'>
                    <a href="{{route('deleteUnassignFavCondNb')}}">
                        <h2>Désassigner une condition favorable Nb</h2> 
                    </a>
                </div>

            </div>

            <!-- // ****************** NINTH LINE ******************** // -->

            <div class='midContainer'>
                <div class='cbtn'>
                    <a href="{{route('newAssignProblem')}}">
                        <h2>Assigner un problème</h2> 
                    </a>
                </div>

                <div class='cbtn'>
                    <a href="{{route('searchUnassignProblem')}}">
                        <h2>Désassigner un problème</h2> 
                    </a>
                </div>

            </div>

            <!-- // ****************** END ******************** // -->

        </div>
@endsection

