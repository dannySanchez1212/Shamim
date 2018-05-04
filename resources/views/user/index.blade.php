@extends('layouts.app')

@section('content')

@include('sweetalert::alert')
<div class="container">
    @if($users->count())
    <table id="users" class="display nowrap">
        <div class="card-header">{{ __('Users') }} </div>
        <p align="right"><a class="btn btn-primary" href="{{ route('user.create') }}" role="button">Add User</a></p>
        <thead>
            <tr>
                <th>COMPANY</th>
                <th>USER COMPANY</th>
                <th>PACKAGE</th>
                <th>USER TYPE</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>STATUS</th>
                <th>ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{$user->owner_id }}</td>
                <td>{{$user->owner_user_id }}</td>
                <td>{{$user->package_id }}</td>
                <td>{{$user->user_type_id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->status}}</td>
                <td>
                    <a class="btn btn-success" href="{{ route('user.edit', $user->id) }}/edit" role="button"> Edit </a>
                    <a class="btn btn-danger" href="{{ route('user.destroy', $user->id) }}" role="button"> Delete </a>
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
            $('#users').DataTable( 
                {
                "scrollY": 500,
                } );
            } );
    </script>    
@endsection
