@extends('layouts.main')

@section('content')
<a type="button" class="btn btn-primary" href="{{URL::previous()}}">Retour</a>
@if((Auth::check())&&(Auth::user()->id === $eventSportif->user_id))
    <a type="button" class="btn btn-primary" href="{{route('events.edit',[$eventSportif])}}">Modifier</a>
    <form style="display: inline;" action="{{ route('events.destroy', [$eventSportif]) }}" method="post">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit">
            Supprimer
        </button>
    </form>
@endif

<div class="card m-3 " style="max-width: 80%; ">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="{{$eventSportif->posterUrl}}" class="img-fluid rounded-start" alt="{{$eventSportif->nom}}">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">{{$eventSportif->nom}}</h5>
                <p class="card-text">{{$eventSportif->description}}</p>
                <p class="card-text">Date de début: {{$eventSportif->dateDebut}}</p>
                <p class="card-text">Date de fin: {{$eventSportif->dateFin}}</p>
                <a type="button" class="btn btn-primary">Athlètes</a>

            </div>
        </div>
    </div>
</div>
@endsection
