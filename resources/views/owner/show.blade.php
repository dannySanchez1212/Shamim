@extends('layouts.app')

@section('content')
    <h1> {{ $owner->company }} </h1>
    <ul>
       <li> Nombre de company: {{ $owner->company }} </li>
       <li> Logo de company: {{ $owner->company_logo }} </li>
       <li> Email: {{ $owner->email }} </li>
       <li> Phone: {{ $owner->phone }} </li>
       <li> City: {{ $owner->city }} </li>
       <li> State: {{ $owner->state }} </li>
    </ul>
    <p> <a href="owner">Volver atrás</a></p>
@endsection