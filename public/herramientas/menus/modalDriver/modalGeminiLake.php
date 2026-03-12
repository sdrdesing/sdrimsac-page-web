<style>
/* Modal fondo */
#modalGeminiLake {
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
#modalGeminiLake.modal-open {
  opacity: 1;
  visibility: visible;
  pointer-events: auto;
}
/* Modal caja */
.modal-content-geminilake {
  background: #fff;
  border-radius: 18px;
  box-shadow: 0 8px 32px rgba(44,44,120,0.18);
  padding: 32px 24px;
  max-width: 520px;
  margin: auto;
  position: relative;
  text-align: center;
}
.modal-header-geminilake {
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: 1.4rem;
  font-weight: 700;
  color: #2a2aff;
  margin-bottom: 18px;
}
.close-modal-geminilake {
  background: none;
  border: none;
  font-size: 2rem;
  color: #2a2aff;
  cursor: pointer;
  font-weight: bold;
}
.geminilake-models-grid {
  display: flex;
  flex-wrap: wrap;
  gap: 18px;
  justify-content: center;
  margin-bottom: 18px;
}
.geminilake-model-card {
  background: #f5f7ff;
  border: 2px solid #2a2aff;
  border-radius: 12px;
  padding: 18px 14px;
  display: flex;
  flex-direction: column;
  align-items: center;
  min-width: 140px;
  margin-bottom: 0;
}
.geminilake-model-card span {
  font-size: 1.1rem;
  font-weight: 600;
  color: #2a2aff;
  margin-bottom: 12px;
  text-align: center;
}
.geminilake-model-card .btn-herramienta {
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
.geminilake-model-card .btn-herramienta:hover {
  background: #1a1a99;
}
</style>
<div id="modalGeminiLake" class="">
  <div class="modal-content-geminilake" id="modalGeminiLakeContent">
    <div class="modal-header-geminilake">
      <span>Gemini Lake</span>
      <button class="close-modal-geminilake">&times;</button>
    </div>
    <div style="margin-bottom:18px; color:#222; font-size:1.05rem;">
      Se instalará en estos procesadores:<br>
      <span style="font-size:0.98rem; color:#222;">Intel Celeron: J4005, J4105, N4000, N4100 &nbsp;&nbsp; Intel Pentium: J5005, N5000</span>
    </div>
    <div class="geminilake-models-grid">
      <div class="geminilake-model-card">
        <span>VGA</span>
        <a href="/herramientas/driverModel/VGA-3.zip" class="btn-herramienta" download>DESCARGAR</a>
      </div>
      <div class="geminilake-model-card">
        <span>INTEL TXE</span>
        <a href="/herramientas/driverModel/TXE-1.zip" class="btn-herramienta" download>DESCARGAR</a>
      </div>
      <div class="geminilake-model-card">
        <span>CHIPSET</span>
        <a href="/herramientas/driverModel/Chipset.zip" class="btn-herramienta" download>DESCARGAR</a>
      </div>
      <div class="geminilake-model-card">
        <span>SERIAL O</span>
        <a href="/herramientas/driverModel/GeminiLake_WIN10_64_SerialIO.zip" class="btn-herramienta" download>DESCARGAR</a>
      </div>
    </div>
  </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function(){
  var btn = document.getElementById('btnGeminiLake');
  var modal = document.getElementById('modalGeminiLake');
  var closeBtn = document.querySelector('#modalGeminiLake .close-modal-geminilake');
  var content = document.getElementById('modalGeminiLakeContent');
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
