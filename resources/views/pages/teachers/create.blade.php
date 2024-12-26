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

        <form action="{{route('teachers.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" id="name" value="{{old('name')}}" name="name" placeholder="Entrez votre nom">
                <span class="text-small text-warning">@error('name') {{$message}} @enderror</span>
            </div>

            <div class="mb-3">
                <label for="firstname" class="form-label">Prenom</label>
                <input type="text" class="form-control" id="firstname" value="{{old('firstname')}}" name="firstname" placeholder="Entrez votre Prenom">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Adresse Email</label>
                <input type="email" class="form-control" id="email" name="email"value="{{old('email')}}"  placeholder="entrez votre email">
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Telephone</label>
                <input type="phone" class="form-control" id="tel" name="phone" value="{{old('phone')}}" placeholder="+243xxxxxxxxx">
            </div>

            <div class="mb-3">
                <label for="expertise" class="form-label">Expertise</label>
                <input type="text" class="form-control" value="{{old('expertise')}}" id="expertise" name="expertise" placeholder="expertise">
            </div>

            <div class="mb-3">
                <select class="form-select" aria-label="Course" name="course_id">
                    <option selected>Choisir Un cours</option>

                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{$course->name}}</option>

                    @endforeach

                  </select>
            </div>

              <div class="mb-5">
                <button class="btn btn-info" type="submit">Enregistrer</button>
              </div>
        </form>
    </div>

@endsection
