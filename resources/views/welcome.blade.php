@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
            <div class="col-lg-6 px-0">
                <h1 class="display-4 fst-italic">Bienvenue, sur StudyMate</h1>
                <p class="lead my-3">Nous proposons des cours en ligne de qualité, des encadreurs de haute facture avec des horaires sur mesure. Apprennez selon votre rythme.</p>
                <div class="">
                    <a href="{{route('students.create')}}" class="btn btn-info">S'enroler à un cours</a>
                </div>
            </div>
        </div>
        <a href="{{ route('courses.index')}}">Plus de cours</a>
    </div>
@endsection
