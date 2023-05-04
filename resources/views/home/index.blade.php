@extends('layouts.main')

@section('content')
{{-- <div class="container mt-5 py-5">
  <table class="table table-striped">
     <thead>
        <td>Poster</td>
         <td>Nom</td>
         <td>description</td>
         <td>lieu</td>
     </thead>
     <tbody>
        @foreach($eventsSportifs as $value)
            <tr>
                <td><img src="{{$value->poster}}" alt=""></td>
                 <td>{{$value->nom}}</td>
                 <td>{{$value->description}}</td>
                 <td>{{$value->lieu}}</td>
            </tr>
            @endforeach
     </tbody>
  </table>
</div> --}}
@include('layouts.list-events')
@endsection
