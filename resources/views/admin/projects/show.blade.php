@extends('layouts.app')

@section('title','Projects-details')

@section('content')
<section id="project">
    <div class="container">
        <div class="card mt-5">
          <div class="card-body text-center">
              <h1 class="card-title">Progetto {{ $project->title }}</h1>
              <h5 class="card-title">Tipo di progetto: {{$project->type?->label}}</h5>
              <p class="card-text">{{ $project->content }}</p>
              <a href="{{ $project->link_github }}" class="btn btn-primary">Link GitHub</a>
          </div>
          <figure class="text-center">
              <img src="{{ asset('storage/' . $project->image) }}" class="card-img-bottom img-fluid w-50" alt="{{ $project->title }}">
          </figure>
          <div>
            <h3 class="text-center">Linguaggi utilizzati</h3>
            <div class="d-flex justify-content-center gap-5">
                @foreach ($project->technologies as $tech)
                <p class="bg-{{ $tech->color }} fs-5 rounded px-3 py-1">{{ $tech->label }}</p>              
                @endforeach
            </div>
          </div>
        </div>
        <div class="w-100 d-flex justify-content-center align-items-center py-3 gap-3">
            <a href="{{ route('admin.projects.index') }}" class="btn btn-primary"><i class="fas fa-pencil me-2"></i>Indietro</a>
            <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning"><i class="fa-solid fa-arrow-up me-2"></i>Modifica</a>
            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
            </form>
        </div>
    </div>
</section>  
@endsection