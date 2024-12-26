@extends('layouts.app')

@section('content')
   
   <div class="container mt-4">
    <div class="row">
        <!-- Tableau de bord -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h3 class="card-title">Tableau de bord</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card bg-light text-center">
                                <div class="card-body">
                                    <h5 class="card-title">Total des cours</h5>
                                    <p class="card-text display-6">Total Cours</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-light text-center">
                                <div class="card-body">
                                    <h5 class="card-title">Étudiants inscrits</h5>
                                    <p class="card-text display-6">Total etudiant</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-light text-center">
                                <div class="card-body">
                                    <h5 class="card-title">Cours récents</h5>
                                    <p class="card-text display-6">{{ $recentCourse->name ?? 'Aucun cours' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Liste des cours -->
    <div class="row mt-4">
        <div class="d-flex justify-content-between align-items-center">
            <h4>Mes cours</h4>
        </div>
        @foreach ($courses as $course)
        <div class="col-md-4 mb-4">
            <div class="card h-100 d-flex flex-column">
                <img src="{{ asset('storage/' . $course->image) }}" class="card-img-top" style="width: 100%; height: 150px; object-fit: cover; alt="{{ $course->name }}">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h5 class="card-title">{{ $course->name }}</h5>
                    <p class="card-text">{{ Str::limit($course->description) }}</p>
                    <a href="{{ route('courses.show', $course->id) }}" class="btn btn-info" style="transition: transform 0.3s ease, box-shadow 0.3s ease; display: inline-block;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 8px 15px rgba(0, 0, 0, 0.2)';"onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">Voir les détails</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Bouton pour ajouter un nouveau cours -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="d-flex justify-content-center align-items-center gap-3">
                <a href="{{ route('courses.create', $course->id) }}" class="btn btn-info" style="transition: transform 0.3s ease, box-shadow 0.3s ease; display: inline-block;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 8px 15px rgba(0, 0, 0, 0.2)';"onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">Ajouter Un Cours</a>
                <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-info" style="transition: transform 0.3s ease, box-shadow 0.3s ease; display: inline-block;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 8px 15px rgba(0, 0, 0, 0.2)';"onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">Modifier Un Cours</a>
                <a href="{{ route('courses.destroy', $course->id) }}" class="btn btn-info" style="transition: transform 0.3s ease, box-shadow 0.3s ease; display: inline-block;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 8px 15px rgba(0, 0, 0, 0.2)';"onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">Supprimer Un Cours</a>
            </div>
        </div>
    </div>
</div>




@endsection
