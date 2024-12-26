@extends('layouts.app')

@section('content')

    <div class="container mt-1">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Liste des Cours</h1>
            @role('teacher')
            <a href=" {{route('courses.create')}} " class="btn btn-info">Ajouter Un Cours</a>
            @endrole
        </div>
        <div class="row">
            @foreach($courses as $course)
            <div class="col-md-4 mb-4">
                <div class="card h-100 d-flex flex-column">
                    <img src="{{ asset('storage'). '/'.$course->image}}" class="card-img-top" style=" width: 100%; height: 200px; object-fit: cover;" alt="{{ $course->name }}" >
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="card-title">{{ $course->name }}</h5>
                        <p class="card-text">{{ $course->description }}</p>

                        @role('student')
                        <a href="{{route('students.create')}}" class="btn btn-info">S'enroler</a>
                        <a href="" class="btn btn-info" style="margin-bottom: 10px;">Voir</a>
                        @endrole
                        @role('teacher')
                        <a href="" class="btn btn-info" style="margin-bottom: 10px;">Voir</a>
                        <a href="{{ route('courses.edit', ['course' => $course]) }}" class="btn btn-info " style="margin-bottom: 10px;">Modifier</a>
                        <form id="deleteForm-{{ $course->id }}" action="{{ route('courses.destroy', ['course'=> $course->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                        <a href="#" onclick="document.getElementById('deleteForm-{{$course->id}}').submit()" class="btn btn-info" style="width: 100%;">Supprimer</a>
                        </form>
                        @endrole
                    </div>
                </div>
             </div>
            @endforeach
        </div>
    </div>



@endsection
