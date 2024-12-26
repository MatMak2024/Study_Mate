@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('students.update', ['student' => $student])}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" id="name" value="{{$student->name}}" name="name" placeholder="Entrez votre nom">
                <span class="text-small text-warning">@error('name') {{$message}} @enderror</span>
            </div>

            <div class="mb-3">
                <label for="firstname" class="form-label">Prenom</label>
                <input type="text" class="form-control" id="firstname" value="{{$student->firstname}}" name="firstname" placeholder="Entrez votre Prenom">
                <span class="text-small text-warning">@error('firstname') {{$message}} @enderror</span>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Adresse Email</label>
                <input type="email" class="form-control" id="email" name="email"value="{{$student->email}}"  placeholder="entrez votre email">
                <span class="text-small text-warning">@error('email') {{$message}} @enderror</span>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Telephone</label>
                <input type="phone" class="form-control" id="tel" name="phone" value="{{$student->phone}}" placeholder="+243xxxxxxxxx">
                <span class="text-small text-warning">@error('phone') {{$message}} @enderror</span>
            </div>

            <div class="mb-3">
                <label for="birth_date" class="form-label">Date de Naissance</label>
                <input type="date" class="form-control" value="{{$student->birth_date}}" id="birth_date" name="birth_date" placeholder="entrez votre email">
                <span class="text-small text-warning">@error('birth_date') {{$message}} @enderror</span>
            </div>

            <div class="mb-3">
                <select class="form-select" aria-label="Course" name="course_id">
                    <option selected>Choisir Un cours</option>

                    @foreach ($courses as $course)
                        <option @if ($course->id == $student->course_id)seleted @endif value="{{ $course->id }}">{{$course->name}}</option>

                    @endforeach

                  </select>
            </div>

              <div class="mb-5">
                <button class="btn btn-info" type="submit">Modifier</button>
              </div>
        </form>
    </div>

@endsection
