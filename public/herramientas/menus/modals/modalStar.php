<div id="modalStar" style="display:none; position:fixed; z-index:9999; left:0; top:0; width:100vw; height:100vh; background:rgba(0,0,0,0.25); justify-content:center; align-items:center;">
  <div class="modal-content-advance" style="max-width:420px; min-width:320px; position:relative; text-align:center;">
    <button class="close-modal-advance" onclick="document.getElementById('modalStar').style.display='none';" style="position:absolute;top:12px;right:18px;font-size:1.5rem;color:#18126d;background:none;border:none;cursor:pointer;font-weight:bold;">&times;</button>
    <h2 style="color:#18126d;font-size:1.35rem;margin-bottom:24px;font-weight:700;">DRIVER STAR</h2>
    <div class="advance-model-card" style="background:#f6f8ff;border-radius:12px 12px 24px 24px;border:3px solid #3a2fff;padding:18px 0 12px 0;display:flex;flex-direction:column;align-items:center;box-shadow:0 2px 8px rgba(24,18,109,0.08);position:relative;max-width:320px;margin:0 auto;">
      <span style="margin-top:18px;font-weight:700;color:#18126d;font-size:1.1rem;margin-bottom:10px;z-index:1;">SP 700</span>
      <img src="https://sdrimsac.com/wp-content/uploads/2025/09/Diseno-sin-titulo-_2_-768x339.webp" alt="SP 700" style="width:180px;height:80px;object-fit:cover;margin-bottom:12px;border-radius:8px;">
      <a href="/herramientas/driver/starprnt_v3.8.1.zip" class="btn-herramienta" style="margin-top:8px;z-index:1;" download>DESCARGAR</a>
    </div>
  </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
  var btnStar = document.getElementById('btnStar');
  if (btnStar) {
    btnStar.addEventListener('click', function(e) {
      e.preventDefault();
      e.stopPropagation();
      document.getElementById('modalStar').style.display = 'flex';
    });
  }
  var modalStar = document.getElementById('modalStar');
  if (modalStar) {
    modalStar.addEventListener('click', function(e) {
      if (e.target === modalStar) {
        modalStar.style.display = 'none';
      }
    });
  }
});
</script>
