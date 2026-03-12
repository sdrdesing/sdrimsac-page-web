<style>
/* Modal fondo */
#modalApolloLake {
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
#modalApolloLake.modal-open {
  opacity: 1;
  visibility: visible;
  pointer-events: auto;
}
/* Modal caja */
.modal-content-apollo {
  background: #fff;
  border-radius: 18px;
  box-shadow: 0 8px 32px rgba(44,44,120,0.18);
  padding: 32px 24px;
  max-width: 480px;
  margin: auto;
  position: relative;
  text-align: center;
}
.modal-header-apollo {
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: 1.4rem;
  font-weight: 700;
  color: #2a2aff;
  margin-bottom: 18px;
}
.close-modal-apollo {
  background: none;
  border: none;
  font-size: 2rem;
  color: #2a2aff;
  cursor: pointer;
  font-weight: bold;
}
.apollo-models-grid {
  display: flex;
  gap: 18px;
  justify-content: center;
  margin-bottom: 18px;
}
.apollo-models-grid.single {
  gap: 0;
}
.apollo-model-card {
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
.apollo-model-card span {
  font-size: 1.1rem;
  font-weight: 600;
  color: #2a2aff;
  margin-bottom: 12px;
  text-align: center;
}
.apollo-model-card .btn-herramienta {
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
.apollo-model-card .btn-herramienta:hover {
  background: #1a1a99;
}
</style>
<div id="modalApolloLake" class="">
  <div class="modal-content-apollo" id="modalApolloLakeContent">
    <div class="modal-header-apollo">
      <span>Apollo Lake</span>
      <button class="close-modal-apollo">&times;</button>
    </div>
    <div style="margin-bottom:18px; color:#222; font-size:1.05rem;">
      Se instalará en estos procesadores:<br>
      <span style="font-size:0.98rem; color:#222;">Intel Celeron: N3350, J3355, J3455 &nbsp;&nbsp; Intel Pentium: N4200, J4205</span>
    </div>
    <div class="apollo-models-grid">
      <div class="apollo-model-card">
        <span>VGA</span>
        <a href="/herramientas/driverModel/VGA.zip" class="btn-herramienta" download="VGA.zip">DESCARGAR</a>
      </div>
      <div class="apollo-model-card">
        <span>INTEL TXE</span>
        <a href="/herramientas/driverModel/apollo-lake-intelr-txe-3.1.60.2280_version_2_hf.zip" class="btn-herramienta" download="apollo-lake-intelr-txe-3.1.60.2280_version_2_hf.zip">DESCARGAR</a>
      </div>
    </div>
    <div class="apollo-models-grid single">
      <div class="apollo-model-card">
        <span>CHIPSET</span>
        <a href="/herramientas/driverModel/chipset-10.1.17647.8080-nda-mup.zip" class="btn-herramienta" download="chipset-10.1.17647.8080-nda-mup.zip">DESCARGAR</a>
      </div>
    </div>
  </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function(){
  var btn = document.getElementById('btnApolloLake');
  var modal = document.getElementById('modalApolloLake');
  var closeBtn = document.querySelector('#modalApolloLake .close-modal-apollo');
  var content = document.getElementById('modalApolloLakeContent');
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
