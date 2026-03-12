<style>
#modalElitronic {
  position:fixed;
  z-index:9999;
  left:0; top:0; width:100vw; height:100vh;
  background:rgba(0,0,0,0.25);
  justify-content:center; align-items:center;
  display:flex;
  opacity:0;
  visibility:hidden;
  pointer-events:none;
  transition:opacity .2s ease;
}
#modalElitronic.modal-open {
  opacity:1;
  visibility:visible;
  pointer-events:auto;
}
</style>
<div id="modalElitronic" class="">
  <div class="modal-content-advance" style="max-width:340px;min-width:220px;padding:28px 18px 24px 18px;position:relative;text-align:center;" id="modalElitronicContent">
    <button class="close-modal-advance" style="position:absolute;top:12px;right:18px;font-size:1.5rem;color:#18126d;background:none;border:none;cursor:pointer;font-weight:bold;">&times;</button>
    <span style="font-size:1.25rem;font-weight:700;color:#18126d;display:block;margin-bottom:18px;">ELIPRINTER SOL-802 V2</span>
    <div style="display:flex;justify-content:center;width:100%;margin-bottom:0;">
      <a href="/herramientas/driver/SOL-Driver-v2.4.zip" class="btn-herramienta" style="width:120px;transition:none;background:#18126d;" download>DESCARGAR</a>
    </div>
  </div>
</div>
<script>
// Abrir modal Elitronic desde el botón externo
document.addEventListener('DOMContentLoaded', function(){
  var btn = document.getElementById('btnElitronic');
  var modal = document.getElementById('modalElitronic');
  var closeBtn = document.querySelector('#modalElitronic .close-modal-advance');
  var content = document.getElementById('modalElitronicContent');
  // Eliminar cualquier evento de mouseout/mouseleave/hover que pueda estar en el overlay
  if (modal) {
    modal.onmouseout = null;
    modal.onmouseleave = null;
  }
  var btn = document.getElementById('btnElitronic');
  var modal = document.getElementById('modalElitronic');
  var closeBtn = document.querySelector('#modalElitronic .close-modal-advance');
  var content = document.getElementById('modalElitronicContent');
  // abrir modal
  if(btn){
    btn.addEventListener('click', function(e){
      e.preventDefault();
      e.stopPropagation();
      modal.classList.add('modal-open');
    });
  }
  // cerrar con boton X
  if(closeBtn){
    closeBtn.addEventListener('click', function(){
      modal.classList.remove('modal-open');
    });
  }
  // Evitar que cualquier click dentro del modal (incluyendo enlaces y botones) cierre el modal
  if(content){
    content.addEventListener('click', function(e){
      e.stopPropagation();
    });
    // Evitar que los enlaces y botones dentro del modal cierren el modal
    var interactive = content.querySelectorAll('a, button');
    interactive.forEach(function(el){
      el.addEventListener('click', function(e){
        e.stopPropagation();
      });
    });
  }
  // Eliminar el cierre por click en el fondo, solo se cierra con la X o Escape
  // cerrar con ESC
  window.addEventListener('keydown', function(e){
    if(e.key === 'Escape'){
      modal.classList.remove('modal-open');
    }
  });
});
</script>
