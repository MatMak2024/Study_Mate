@extends('layouts.app')

@section('content')
   <div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h1>Liste des etudiants</h1>
    </div>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Prenom</th>
            <th scope="col">Nom</th>
            <th scope="col">Cours</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>

        <tbody>
            @foreach ($students as $student)
            <tr>
                <th scope="row">{{ $student->id }}</th>
                <td>{{ $student->firstname }} </td>
                <td>{{ $student->name }} </td>
                <td>{{ $student->course?->name}} </td>
                <td>
                    <a href="" class="btn btn-info">Voir</a>
                    <a href="{{route('students.edit', ['student' => $student])}}" class="btn btn-info">Modifier</a>
                    <form id="deleteForm-{{ $student->id}}" action="{{route('students.destroy', ['student'=> $student->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="#" onclick="document.getElementById('deleteForm-{{$student->id}}').submit()" class="btn btn-info">Supprimer</a>
                    </form>
                </td>
              </tr>
            @endforeach
        </tbody>
    </table>
   </div>
@endsection
