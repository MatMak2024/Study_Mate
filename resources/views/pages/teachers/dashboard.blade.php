@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Tableau de bord Encadreur</h1>

    <!-- Statistiques -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card bg-light text-center">
                <div class="card-body">
                    <h5 class="card-title">Total des cours</h5>
                    <p class="card-text display-6">{{ $totalCourses }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-light text-center">
                <div class="card-body">
                    <h5 class="card-title">Étudiants inscrits</h5>
                    <p class="card-text display-6">{{ $totalStudents }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Liste des cours -->
    <div class="row">
        <h4>Mes cours</h4>
        @foreach ($courses as $course)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('storage/'.$course->image) }}" class="card-img-top" alt="{{ $course->name }}">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $course->name }}</h5>
                    <p class="card-text">{{ Str::limit($course->description, 100) }}</p>
                    <a href="{{ route('courses.show', $course->id) }}" class="btn btn-info mt-auto">Voir les étudiants</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Ajouter un nouveau cours -->
    <div class="row mt-4">
        <div class="col-md-12 text-center">
            <a href="{{ route('courses.create') }}" class="btn btn-primary btn-lg">Ajouter un nouveau cours</a>
        </div>
    </div>
</div>
@endsection
