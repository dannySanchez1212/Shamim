@extends('layouts.app')
@section('content')
@include('sweetalert::alert')
<div class="container">
    @if($packages->count())
    <table id="package" class="table">
    	<div class="card-header">{{ __('Packages') }} </div>
        <p align="right"><a class="btn btn-primary" href="{{ route('package.create') }}" role="button">Add Package</a></p>
        <thead>
            <tr>
                <th>COMPANY</th>
                <th>NAME</th>
                <th>USER GROUP</th>
                <th>Bw_dowload</th>
                <th>ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            @foreach($packages as $package)
            <tr>        
                <td>{{$package->owner_id}}</td>
                <td>{{$package->name}}</td>
                <td>{{$package->user_group}}</td>
                <td>{{$package->bw_dowload}}</td>
                <td>
                    <a class="btn btn-success"  href="{{ route('package.edit', $package->id) }}" role="button"> Edit </a>
                  <!--  <a class="btn btn-danger" id="destroy"  href="{{ route('package.destroy', $package->id) }}" role="button"> Delete </a> -->
                    <button class="btn btn-danger" name="{{  $package->id }}" id="boton" type="button">Delete</button>
                </td>
            </tr>
            @endforeach  
        </tbody>                    
    </table> 
    @else
       <p> No packages have been found </p>
    @endif    
</div>            
@endsection
  <!-- -->
@section('scripts')
    <script>
        $(document).ready(function() 
            {
            $('#package').DataTable( 
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
                          text: "Package Successfully Removed!",
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
                              url:"/destroyP",
                              method:"POST",
                              data:{id:id, _token:_token},
                              success:function(result){

                                swal({ title:'Deleted!',text:"Package Successfully Removed",type:'success'});
                                location.reload();
                              }

                             })
                           } else if(result.dismiss == swal.DismissReason.cancel){
                            
                            swal({ title:'Cancelled',text:"Package Successfully Not Removed",type:'error'});
                            
                          }
                        })

      });
         
    </script>   
@endsection
