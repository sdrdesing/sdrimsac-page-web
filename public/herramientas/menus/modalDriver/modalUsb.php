<style>
#modalUsb {
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
#modalUsb.modal-open {
  opacity: 1;
  visibility: visible;
  pointer-events: auto;
}
.modal-content-usb {
  background: #fff;
  border-radius: 20px;
  padding: 32px 32px 24px 32px;
  min-width: 420px;
  max-width: 95vw;
  box-shadow: 0 4px 32px rgba(42,46,236,0.18);
  position: relative;
  text-align: center;
}
.close-modal-usb {
  position: absolute;
  top: 18px;
  right: 24px;
  font-size: 2rem;
  color: #2a2eec;
  background: none;
  border: none;
  cursor: pointer;
  font-weight: bold;
}
.usb-models-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 32px;
  justify-content: center;
  margin-bottom: 24px;
}
.usb-model-card {
  background: #fff;
  border-radius: 12px 12px 24px 24px;
  border: 3px solid #2a2eec;
  padding: 18px 0 12px 0;
  display: flex;
  flex-direction: column;
  align-items: center;
  box-shadow: 0 2px 8px rgba(42,46,236,0.08);
  position: relative;
  min-width: 180px;
}
.usb-model-card span {
  font-size: 1.15rem;
  font-weight: 700;
  color: #2a2eec;
  margin-bottom: 10px;
  display: block;
}
.usb-model-card .btn-herramienta {
  margin-top: 8px;
  background: #2a2eec;
  color: #fff;
  border: none;
  border-radius: 10px;
  padding: 10px 28px;
  font-size: 1.08rem;
  font-weight: 700;
  cursor: pointer;
  transition: background 0.2s;
  text-decoration: none;
  display: inline-block;
}
.usb-model-card .btn-herramienta:hover {
  background: #3a2fff;
}
</style>
<div id="modalUsb" class="">
  <div class="modal-content-usb" id="modalUsbContent">
    <button class="close-modal-usb">&times;</button>
    <h2 style="margin-bottom:18px; color:#2a2eec; font-weight:800;">Seleccione</h2>
    <div class="usb-models-grid">
      <div class="usb-model-card">
        <span>INTEL USB 3.0</span>
          <a href="/herramientas/driverModel/Intel-USB3.0驱动.zip" class="btn-herramienta" download="Intel-USB3.0驱动.zip">DESCARGAR</a>
      </div>
      <div class="usb-model-card">
        <span>VIA XHCI V150A</span>
          <a href="/herramientas/driverModel/VIA_XHCI_Driver_V510A_SingleDriver682.zip" class="btn-herramienta" download="VIA_XHCI_Driver_V510A_SingleDriver682.zip">DESCARGAR</a>
      </div>
    </div>
  </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function(){
  var btn = document.getElementById('btnUsb');
  var modal = document.getElementById('modalUsb');
  var closeBtn = document.querySelector('#modalUsb .close-modal-usb');
  var content = document.getElementById('modalUsbContent');
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
