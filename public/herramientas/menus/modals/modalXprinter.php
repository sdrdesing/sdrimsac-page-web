<!-- Modal Xprinter -->
<div id="modalXprinter" style="display:none; align-items:center; justify-content:center;">
    <div class="modal-content-advance">
        <button class="close-modal-xprinter" onclick="document.getElementById('modalXprinter').style.display='none'; document.getElementById('modalXprinter').classList.remove('active');" style="position:absolute;top:18px;right:24px;font-size:2rem;color:#d00;background:none;border:none;cursor:pointer;font-weight:bold;">&times;</button>
        <h2 style="margin-bottom:18px;">DRIVER XPRINTER</h2>
        <div class="advance-models-grid" style="grid-template-columns: 1fr;">
            <div class="advance-model-card" style="min-width:320px;">
                <span style="font-size:1.25rem; background:#e6edfa; border-radius:8px; padding:6px 0; width:90%; margin:0 auto 10px auto; display:block; color:#18126d; font-weight:700;">XP Q200</span>
                <div style="display:flex; gap:10px; justify-content:center; width:100%;">
                    <a href="/herramientas/driver/XP-Q200.zip" class="btn-herramienta" style="flex:1;" download>DESCARGAR</a>
                    <a href="#" class="btn-herramienta" style="flex:0; padding:7px 10px;"><img src="https://cdn-icons-png.flaticon.com/512/60/60993.png" alt="icon" style="width:18px; vertical-align:middle;"></a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function showModalXprinter() {
    var modal = document.getElementById('modalXprinter');
    modal.style.display = 'flex';
}
</script>
        </div>
    </div>
</div>
