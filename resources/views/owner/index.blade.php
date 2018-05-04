@extends('layouts.app')

@section('content')

@include('sweetalert::alert')
<div class="container">
    @if($owners->count())
    <table id="owners" class="display nowrap">
        <div class="card-header">{{ __('Owners') }} </div>
        <p align="right"><a class="btn btn-primary" href="{{ route('createO') }}" role="button">Add Owner</a></p>
        <thead>
            <tr>
                <th>COMPANY</th>
                <th>COMPANY LOGO</th>
                <th>EMAIL</th>
                <th>PHONE</th>        
                <th>CITY</th>
                <th>STATE</th>
                <th>COUNTRY</th>
                <th>ACTIONS</th>                
            </tr>
        </thead>
        <tbody>
            @foreach ($owners as $owner)
            <tr>
                <td>{{$owner->company }}</td>
                <td>{{$owner->company_logo }}</td>
                <td>{{$owner->email}}</td>
                <td>{{$owner->phone}}</td>
                <td>{{$owner->city}}</td>
                <td>{{$owner->state}}</td>
                <td>{{$owner->country}}</td>
                <td>
                    <a class="btn btn-success" href="{{ route('owner.edit', $owner->id) }}" role="button"> Edit </a>
                    <a class="btn btn-danger" href="{{ route('owner.destroy', $owner->id) }}" role="button"> Delete </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>   
    @else
       <p> No owners have been found </p>
    @endif
</div>
 
@endsection

@section('scripts')
    <script>
        $(document).ready(function() 
            {
            $('#owners').DataTable( 
                {
                "scrollY": 500,
                "scrollX": true,
                } );
            } );
    </script>    
@endsection
