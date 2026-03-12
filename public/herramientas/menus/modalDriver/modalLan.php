<style>
/* Modal fondo */
#modalLan {
  position: fixed;
  z-index: 9999;
  left: 0; top: 0; width: 100vw; height: 100vh;
  background: rgba(0,0,0,0.25);
  display: flex;
  justify-content: center;
  align-items: center;
  opacity: 0;
  visibility: hidden;
  pointer-events: none;
  transition: opacity .2s ease;
}
#modalLan.modal-open {
  opacity: 1;
  visibility: visible;
  pointer-events: auto;
}
/* Modal caja */
.modal-content-lan {
  background: #fff;
  border-radius: 18px;
  box-shadow: 0 8px 32px rgba(44,44,120,0.18);
  padding: 32px 24px;
  max-width: 600px;
  margin: auto;
  position: relative;
  text-align: center;
}
.modal-header-lan {
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: 1.4rem;
  font-weight: 700;
  color: #2a2aff;
  margin-bottom: 24px;
}
.close-modal-lan {
  background: none;
  border: none;
  font-size: 2rem;
  color: #d00;
  cursor: pointer;
  font-weight: bold;
}
.lan-models-grid {
  display: flex;
  gap: 18px;
  justify-content: center;
}
.lan-model-card {
  background: #fff;
  border: 2px solid #2a2aff;
  border-radius: 12px;
  padding: 18px 14px;
  display: flex;
  flex-direction: column;
  align-items: center;
  min-width: 180px;
  margin-bottom: 0;
  box-shadow: 0 2px 8px rgba(42,46,236,0.08);
}
.lan-model-card span {
  font-size: 1.1rem;
  font-weight: 600;
  color: #2a2aff;
  margin-bottom: 12px;
  text-align: center;
}
.lan-model-card .btn-herramienta {
  margin-top: 8px;
  background: #2a2aff;
  color: #fff;
  border: none;
  border-radius: 8px;
  padding: 10px 22px;
  font-size: 1rem;
  font-weight: 600;
  cursor: pointer;
  transition: background 0.2s;
  text-decoration: none;
  display: inline-block;
}
.lan-model-card .btn-herramienta:hover {
  background: #1a1a99;
}
.lan-model-card .btn-group {
  display: flex;
  gap: 8px;
  margin-top: 8px;
}
</style>
<div id="modalLan" class="">
  <div class="modal-content-lan" id="modalLanContent">
    <div class="modal-header-lan">
      <span>Seleccione</span>
      <button class="close-modal-lan">&times;</button>
    </div>
    <div class="lan-models-grid">
      <div class="lan-model-card">
        <span>INTEL</span>
        <a href="/herramientas/driverModel/ADV-7011N.zip" class="btn-herramienta" download>DESCARGAR</a>
      </div>
      <div class="lan-model-card">
        <span>REALTEK</span>
        <div class="btn-group">
             <a href="/herramientas/driverModel/0026-Install_Win7_7121_09252018.zip" class="btn-herramienta" download="0026-Install_Win7_7121_09252018.zip">DESCARGAR WIN7</a>
             <a href="/herramientas/driverModel/ADV-8009N.zip" class="btn-herramienta" download="ADV-8009N.zip">DESCARGAR WIN 10</a>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function(){
  var btn = document.getElementById('btnLan');
  var modal = document.getElementById('modalLan');
  var closeBtn = document.querySelector('#modalLan .close-modal-lan');
  var content = document.getElementById('modalLanContent');
  if(btn){
    btn.addEventListener('click', function(e){
      e.preventDefault();
      e.stopPropagation();
      modal.classList.add('modal-open');
    });
  }
  if(closeBtn){
    closeBtn.addEventListener('click', function(){
      modal.classList.remove('modal-open');
    });
  }
  if(content){
    content.addEventListener('click', function(e){
      e.stopPropagation();
    });
  }
  window.addEventListener('keydown', function(e){
    if(e.key === 'Escape'){
      modal.classList.remove('modal-open');
    }
  });
});
</script>
