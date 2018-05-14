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
                    <button class="btn btn-danger" name="{{  $user->id }}" id="boton" type="button">Delete</button>

                <!--    <a class="btn btn-danger" href="{{ route('user.destroy', $user->id) }}" role="button"> Delete </a> -->
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
       <script type="text/javascript">
         $(document).on('click','#boton',function(event){

                 var id = $(this).attr("name"); 
                 var _token = '{{csrf_token()}}';
                          
                         swal({
                          title: 'Are you sure?',
                          text: "User Successfully Removed!",
                          type: 'warning',
                          showCancelButton: true,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'Yes, delete it!',
                          cancelButtonText: 'No, cancel!',
                          confirmButtonClass: 'btn btn-success',
                          cancelButtonClass: 'btn btn-danger',
                          buttonsStyling: false,
                          reverseButtons: true
                        }).then(function(result){
                          if (result.value) {
                           alert('id....'+id+'/token....'+_token);
                             $.ajax({
                              url:"/destroyU",
                              method:"POST",
                              data:{id:id, _token:_token},
                              success:function(result){

                                swal({ title:'Deleted!',text:"User Successfully Removed",type:'success'});
                                location.reload();
                              }

                             })
                           } else if(result.dismiss == swal.DismissReason.cancel){
                            
                            swal({ title:'Cancelled',text:"User Successfully Not Removed",type:'error'});
                            
                          }
                        })

      });
    </script>  
@endsection
