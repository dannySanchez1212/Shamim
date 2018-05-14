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
                    <button class="btn btn-danger" name="{{  $owner->id }}" id="boton" type="button">Delete</button>
                    
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
    <script type="text/javascript">
         $(document).on('click','#boton',function(event){

                 var id = $(this).attr("name"); 
                 var _token = '{{csrf_token()}}';
                          
                         swal({
                          title: 'Are you sure?',
                          text: "Owner Successfully Removed!",
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
                              url:"/destroyO",
                              method:"POST",
                              data:{id:id, _token:_token},
                              success:function(result){

                                swal({ title:'Deleted!',text:"Owner Successfully Removed",type:'success'});
                                location.reload();
                              }

                             })
                           } else if(result.dismiss == swal.DismissReason.cancel){
                            
                            swal({ title:'Cancelled',text:"Owner Successfully Not Removed",type:'error'});
                            
                          }
                        })

      });
    </script>   
@endsection
