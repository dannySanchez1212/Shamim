@extends('layouts.app')

@section('content')

@include('sweetalert::alert')
<div class="container">
    @if($usersO->count())
    <table id="usersO" class="display nowrap">
        <div class="card-header">{{ __('Users Owners') }} </div>
        <p align="right"><a class="btn btn-primary" href="{{ route('userO.create') }}" role="button">Add User Owner</a></p>
        <thead>
            <tr>
                <th>COMPANY</th>
                <th>NAME</th>
                <th>ROLE</th>
                <th>PHONE</th>
                <th>LOCATION</th>
                <th>EMAIL</th>
                <th>ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usersO as $userO)
            <tr>
                <td>{{ $userO->owner_id }}</td>
                <td>{{ $userO->name }}</td>
                <td>{{ $userO->role_id }}</td>
                <td>{{ $userO->phone }}</td>
                <td>{{ $userO->localtion_id }}</td>
                <td>{{ $userO->email }}</td>
                <td>
                    <a class="btn btn-success" href="{{ route('userO.edit', $userO->id) }}" role="button"> Edit </a>
                    <a class="btn btn-danger" href="{{ route('userO.destroy', $userO->id) }}" role="button"> Delete </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>   
    @else
       <p> No user have been found </p>
    @endif
</div>
 
@endsection

@section('scripts')
    <script>
        $(document).ready(function() 
            {
            $('#usersO').DataTable( 
                {
                "scrollY": 500,
                } );
            } );
    </script>    
@endsection
