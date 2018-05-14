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
  <script type="text/javascript">
         $(document).on('click','#boton',function(event){

                 var id = $(this).attr("name"); 
                 var _token = '{{csrf_token()}}';
                          
                         swal({
                          title: 'Are you sure?',
                          text: " User Owner Successfully Removed!",
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
                              url:"/destroyUO",
                              method:"POST",
                              data:{id:id, _token:_token},
                              success:function(result){

                                swal({ title:'Deleted!',text:"User Owner Successfully Removed",type:'success'});
                                location.reload();
                              }

                             })
                           } else if(result.dismiss == swal.DismissReason.cancel){
                            
                            swal({ title:'Cancelled',text:"User Owner Successfully Not Removed",type:'error'});
                            
                          }
                        })

      });
    </script>  
@endsection
