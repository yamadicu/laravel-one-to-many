@extends('layouts.app')

@section('title')
    Mattia's Project| Singolo progetto
@endsection

@section('content')
    <h1>Progetto: {{$project->title}}</h1>
    
    <div>
        {{$project->categories->slug}}
    </div>
@endsection