@extends('layouts.app')

@section('title')
    Mattia's Project | Create
@endsection

@section('content')
    <h1>crea il tuo probetto</h1>

    <div class="container">

        <form action="{{route('pages.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="project-title" placeholder="inserisci un titolo al progetto">
            </div>

            <div class="mb-3">
                <label for="project-content" class="form-label">Content</label>
                <textarea class="form-control" name="content" id="project-content" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label for="project-cover-image" class="form-label">Cover image</label>
                <input type="file" class="form-control" name="cover-image" id="project-cover-image" placeholder="" aria-describedby="fileHelpId">
                <div id="fileHelpId" class="form-text">Help text</div>
            </div>

            <button class="btn btn-primary">crea il post</button>
        </form>

    </div>
@endsection