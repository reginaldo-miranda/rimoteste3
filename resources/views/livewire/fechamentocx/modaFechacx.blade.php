@extends('layout')

@livewire('FecharCX')
<div class="modal fade" id="exemploModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  
 
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        {{--    inicio         --}}
         @include('livewire.fechamentocx.tableFecharCX')  
        {{--     fim             --}}
      </div> 
    </div>   
  </div>
   
</div>
{{-- <button type="button" id="btnmodal" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@tableprod">Lista</button>  --}}

 {{--   <script>
        $(document).ready(function(){
        $('#exampleModal').modal('show');
        })
      </script>  
      <script> 
          $(window).load(function(){ $('#exampleModal').modal('show'); }); 
      </script> 
  --}}