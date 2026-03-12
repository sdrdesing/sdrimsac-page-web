<style>
/* Modal fondo */
#modalAudio {
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
#modalAudio.modal-open {
  opacity: 1;
  visibility: visible;
  pointer-events: auto;
}
/* Modal caja */
.modal-content-audio {
  background: #fff;
  border-radius: 18px;
  box-shadow: 0 8px 32px rgba(44,44,120,0.18);
  padding: 32px 24px;
  max-width: 420px;
  margin: auto;
  position: relative;
  text-align: center;
}
.modal-header-audio {
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: 1.4rem;
  font-weight: 700;
  color: #2a2aff;
  margin-bottom: 24px;
}
.close-modal-audio {
  background: none;
  border: none;
  font-size: 2rem;
  color: #2a2aff;
  cursor: pointer;
  font-weight: bold;
}
.audio-models-grid {
  display: flex;
  gap: 18px;
  justify-content: center;
}
.audio-model-card {
  background: #f5f7ff;
  border: 2px solid #2a2aff;
  border-radius: 12px;
  padding: 18px 14px;
  display: flex;
  flex-direction: column;
  align-items: center;
  min-width: 140px;
}
.audio-model-card span {
  font-size: 1.1rem;
  font-weight: 600;
  color: #2a2aff;
  margin-bottom: 12px;
  text-align: center;
}
.audio-model-card .btn-herramienta {
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
.audio-model-card .btn-herramienta:hover {
  background: #1a1a99;
}
</style>
<div id="modalAudio" class="">
  <div class="modal-content-audio" id="modalAudioContent">
    <div class="modal-header-audio">
      <span>Seleccione</span>
      <button class="close-modal-audio">&times;</button>
    </div>
    <div class="audio-models-grid">
      <div class="audio-model-card">
        <span>ALC662 Audio Driver</span>
        <a href="/herramientas/driverModel/ALC662-Audio-Driver.zip" class="btn-herramienta" download="ALC662-Audio-Driver.zip">DESCARGAR</a>
      </div>
      <div class="audio-model-card">
        <span>ALC897 Audio Driver</span>
        <a href="/herramientas/driverModel/ALC897-Audio-Driver.zip" class="btn-herramienta" download="ALC897-Audio-Driver.zip">DESCARGAR</a>
      </div>
    </div>
  </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function(){
  var btn = document.getElementById('btnAudio');
  var modal = document.getElementById('modalAudio');
  var closeBtn = document.querySelector('#modalAudio .close-modal-audio');
  var content = document.getElementById('modalAudioContent');
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
