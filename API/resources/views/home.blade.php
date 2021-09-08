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

            <div class='midContainer'>
                <div class='cbtn'>
                    <a href="{{route('newVegetable')}}">
                        <h2>Ajouter un vegetal</h2> 
                    </a>
                </div>

                <div class='cbtn'>
                    <a href="{{route('editSearchVegetable')}}">
                        <h2>Modifier un vegetal</h2> 
                    </a>
                </div>

                <div class='cbtn'>
                    <a href="{{route('searchVegetable')}}">
                        <h2>Chercher un vegetal</h2>
                    </a>
                </div>

                <div class='cbtn'>
                    <a href="{{route('deleteSearchVegetable')}}">
                        <h2>Supprimer un vegetal</h2>
                    </a>
                </div>
            </div>

            <div class='midContainer'>
                <div class='cbtn'>
                    <a href="{{route('newProblem')}}">
                        <h2>Ajouter un problème</h2> 
                    </a>
                </div>

                <div class='cbtn'>
                    <a href="{{route('editSearchVegetable')}}">
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

            <div class='midContainer'>
                <div class='cbtn'>
                    <a href="{{route('newProfil')}}">
                        <h2>Ajouter un profil</h2> 
                    </a>
                </div>

                <div class='cbtn'>
                    <a href="{{route('editSearchProfil')}}">
                        <h2>Modifier un profil</h2> 
                    </a>
                </div>

                <div class='cbtn'>
                    <a href="{{route('searchProfil')}}">
                        <h2>Chercher un profil</h2>
                    </a>
                </div>

                <div class='cbtn'>
                    <a href="{{route('deleteSearchProfil')}}">
                        <h2>Supprimer un profil</h2>
                    </a>
                </div>
            </div>

        </div>
@endsection

