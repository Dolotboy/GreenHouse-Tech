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
            <div class='section'> <!-- // ****************** PLANT ******************** // -->
                <div class='sectionHeader'>    
                    <h1>PLANTE</h1>
                </div>
                <div class='midContainer'>
                    <div class='cbtn'>
                        <a href="{{route('newPlant')}}">
                            <h2>Ajouter une plante</h2> 
                        </a>
                    </div>

                    <div class='cbtn'>
                        <a href="{{route('editSearchPlant')}}">
                            <h2>Modifier une plante</h2> 
                        </a>
                    </div>

                    <div class='cbtn'>
                        <a href="{{route('searchPlant')}}">
                            <h2>Chercher une plante</h2>
                        </a>
                    </div>

                    <div class='cbtn'>
                        <a href="{{route('deleteSearchPlant')}}">
                            <h2>Supprimer une plante</h2>
                        </a>
                    </div>

                    <div class='cbtn'>
                        <a href="{{route('detailAllPlant')}}">
                            <h2>Voir tout les plantes</h2> 
                        </a>
                    </div>
                </div>
            </div>

            <div class='section'> <!-- // ****************** PROBLEM ******************** // -->
                <div class='sectionHeader'> 
                    <h1>PROBLÈME</h1>
                </div>
                <div class='midContainer'>
                    <div class='cbtn'>
                        <a href="{{route('newProblem')}}">
                            <h2>Ajouter un problème</h2> 
                        </a>
                    </div>

                    <div class='cbtn'>
                        <a href="{{route('editSearchProblem')}}">
                            <h2>Modifier un problème</h2> 
                        </a>
                    </div>

                    <div class='cbtn'>
                        <a href="{{route('searchProblem')}}">
                            <h2>Chercher un problème</h2>
                        </a>
                    </div>

                    <div class='cbtn'>
                        <a href="{{route('deleteSearchProblem')}}">
                            <h2>Supprimer un problème</h2>
                        </a>
                    </div>

                    <div class='cbtn'>
                        <a href="{{route('detailAllProblem')}}">
                            <h2>Voir tout les problèmes</h2> 
                        </a>
                    </div>

                    <div class='cbtn'>
                        <a href="{{route('newAssignProblem')}}">
                            <h2>Assigner un problème</h2> 
                        </a>
                    </div>

                    <div class='cbtn'>
                        <a href="{{route('deleteUnassignProblem')}}">
                            <h2>Désassigner un problème</h2> 
                        </a>
                    </div>
                </div>
            </div>

            <div class='section'><!-- // ****************** FAVORIS ******************** // -->
                <div class='sectionHeader'> 
                    <h1>FAVORIS</h1>
                </div>
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
            </div>

            <div class='section'><!-- // ****************** FOURTH LINE ******************** // -->
                <div class='sectionHeader'> 
                    <h1>PROFIL</h1>
                </div>
                <div class='midContainer'>
                    <div class='cbtn'>
                        <a href="{{route('newProfile')}}">
                            <h2>Ajouter un profil</h2> 
                        </a>
                    </div>

                    <div class='cbtn'>
                        <a href="{{route('editSearchProfile')}}">
                            <h2>Modifier un profil</h2> 
                        </a>
                    </div>

                    <div class='cbtn'>
                        <a href="{{route('searchProfile')}}">
                            <h2>Chercher un profil</h2>
                        </a>
                    </div>

                    <div class='cbtn'>
                        <a href="{{route('deleteSearchProfile')}}">
                            <h2>Supprimer un profil</h2>
                        </a>
                    </div>

                    <div class='cbtn'>
                        <a href="{{route('detailAllProfile')}}">
                            <h2>Voir tous les profils</h2> 
                        </a>
                    </div>
                </div>
            </div>

            <div class='section'><!-- // ****************** CONDITION FAVORABLE ******************** // -->
                <div class='sectionHeader'> 
                    <h1>Condition favorable</h1>
                </div>
                <div class='midContainer'>
                    <div class='cbtn'>
                        <a href="{{route('newFavCondition')}}">
                            <h2>Ajouter une condition favorable</h2> 
                        </a>
                    </div>

                    <div class='cbtn'>
                        <a href="{{route('editSearchFavCondition')}}">
                            <h2>Modifier une condition favorable</h2> 
                        </a>
                    </div>

                    <div class='cbtn'>
                        <a href="{{route('searchFavCondition')}}">
                            <h2>Chercher une condition favorable</h2>
                        </a>
                    </div>

                    <div class='cbtn'>
                        <a href="{{route('deleteSearchFavCondition')}}">
                            <h2>Supprimer une condition favorable</h2>
                        </a>
                    </div>

                    <div class='cbtn'>
                        <a href="{{route('newAssignFavCondition')}}">
                            <h2>Assigner une condition favorable</h2> 
                        </a>
                    </div>

                    <div class='cbtn'>
                        <a href="{{route('deleteUnassignFavCondition')}}">
                            <h2>Désassigner une condition favorable</h2> 
                        </a>
                    </div>
                </div>
            </div>
        </div>
@endsection

