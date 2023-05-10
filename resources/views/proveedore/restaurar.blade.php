 <!-- Modal para ELIMINAR registro-->
 <div class="modal fade" id="modal-restaurar-{{ $proveedore->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
     tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <form action="{{ route('prov.restore', $proveedore->id) }} " method="POST">
             @csrf

             <div class="modal-content">
                 <div class="modal-header">
                     <h1 class="modal-title fs-5 text-success" id="staticBackdropLabel">
                         Restaurar Registro del Proveedor</h1>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     ¿Desea Volver a Restaurar el registro No.
                     {{ $proveedore->id . ', del Proveedor: ' . $proveedore->nombre }}?
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-danger bg-gradient"
                         data-bs-dismiss="modal">Cancelar</button>
                     <button type="submit" class="btn btn-success bg-gradient">Restaurar</button>
                 </div>
             </div>
         </form>
     </div>
 </div>
