<style>
#modalBienexNuevo {
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
#modalBienexNuevo.modal-open {
  opacity:1;
  visibility:visible;
  pointer-events:auto;
}
.modal-content-bienex {
  background:#fff;
  border-radius:18px;
  padding:32px 32px 24px 32px;
  min-width:340px;
  max-width:95vw;
  box-shadow:0 4px 32px rgba(24,18,109,0.18);
  position:relative;
  text-align:center;
}
.close-modal-bienex {
  position:absolute;
  top:18px;
 right:24px;
  font-size:2rem;
  color:#d00;
  background:none;
  border:none;
  cursor:pointer;
  font-weight:bold;
}
.bienex-models-grid {
  display:grid;
  grid-template-columns:1fr 1fr;
  gap:24px;
  justify-content:center;
  margin-bottom:24px;
}
.bienex-model-card {
  background:#fff;
  border-radius:12px;
  border:2px solid #18126d;
  padding:18px 0 12px 0;
  display:flex;
  flex-direction:column;
  align-items:center;
  box-shadow:0 2px 8px rgba(24,18,109,0.08);
  position:relative;
  min-width:180px;
}
.bienex-model-card span {
  font-size:1.15rem;
  font-weight:700;
  color:#18126d;
  margin-bottom:10px;
  display:block;
}
.bienex-model-card .btn-herramienta {
  margin-top:8px;
  background:#18126d;
  color:#fff;
  border:none;
  border-radius:8px;
  padding:8px 14px;
  font-size:0.93rem;
  font-weight:600;
  cursor:pointer;
  transition:background 0.2s;
  text-decoration:none;
  display:inline-block;
}
.bienex-model-card .btn-herramienta:hover {
  background:#3a2fff;
}
</style>
<div id="modalBienexNuevo" class="">
  <div class="modal-content-bienex" id="modalBienexNuevoContent">
    <button class="close-modal-bienex">&times;</button>
    <h2 style="margin-bottom:18px;">DRIVER BIENEX</h2>
    <div class="bienex-models-grid">
      <div class="bienex-model-card">
        <span>Interfaz USB</span>
        <a href="/herramientas/driver/POS-80-USB.zip" class="btn-herramienta" download>DESCARGAR</a>
      </div>
      <div class="bienex-model-card">
        <span>Interfaz USB + LAN</span>
        <a href="/herramientas/driver/POS-80-LAN.zip" class="btn-herramienta" download>DESCARGAR</a>
      </div>
    </div>
    <div style="display:flex;justify-content:center;">
      <div class="bienex-model-card">
        <span>Interfaz USB + BLUETOOTH</span>
        <a href="/herramientas/driver/POS-80-BLUETOOTH.zip" class="btn-herramienta" download>DESCARGAR</a>
      </div>
    </div>
  </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function(){
  var btn = document.getElementById('btnBienexNuevo');
  var modal = document.getElementById('modalBienexNuevo');
  var closeBtn = document.querySelector('#modalBienexNuevo .close-modal-bienex');
  var content = document.getElementById('modalBienexNuevoContent');
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
  // evitar cerrar al hacer click dentro
  if(content){
    content.addEventListener('click', function(e){
      e.stopPropagation();
    });
  }
  // cerrar con ESC
  window.addEventListener('keydown', function(e){
    if(e.key === 'Escape'){
      modal.classList.remove('modal-open');
    }
  });
});
</script>
