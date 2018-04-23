<!-- Modal para confirmar la eliminación de un artículo -->
<div class="modal confirmarEliminarArticulo" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">CONFIRMAR LA ELIMINACIÓN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if($article)
          {{ $article->id }}
        @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a class="btn btn-danger"href="{{ route('admin.articles.destroy', $article->id)}}">Eliminar</a>
      </div>
    </div>
  </div>
</div>  