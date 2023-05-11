@extends('layouts.main')

@section('content')
    @if(Auth::user()->id!=null)
         <a type="button" class="btn btn-outline-primary" href="{{route('events.create')}}">
            Ajouter
        </a>
    @endif
    @include('layouts.list-events')
@endsection
