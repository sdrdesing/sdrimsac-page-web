<div id="modalEpson" style="display:none;">
    <div class="modal-content-advance" style="max-width:900px;">
        <button class="close-modal-advance" onclick="document.getElementById('modalEpson').style.display='none'; document.getElementById('modalEpson').classList.remove('active');">&times;</button>
        <h2>Seleccione el modelo de la ticketera</h2>
        <div class="advance-models-grid" style="gap:32px;">
            <div class="advance-model-card" style="border:2px solid #18126d; background:#f4f7ff; min-width:320px;">
                <span style="font-size:1.15rem; font-weight:700; color:#18126d; margin-bottom:10px;">Epson TM-T20II</span>
                                <a href="#" class="btn-herramienta" style="width:90%;margin:18px auto 0 auto;display:block;font-size:1.08rem;padding:14px 0;letter-spacing:0.5px;position:relative;" onclick="toggleEpsonContent('epsonT20IIContent', this); return false;">
                                        Windows <span style="font-size:1.2em;vertical-align:middle;">&#8595;</span>
                                </a>
                                <div id="epsonT20IIContent" class="epson-content" style="display:none;">
                                    <div style="background:#e7eafd;border-radius:12px;padding:12px 0;margin-bottom:10px;">
                                        <div style="font-weight:700;color:#18126d;font-size:1.08rem;margin-bottom:8px;">Windows 11</div>
                                                <a href="/herramientas/driver/TM-T20II-WIN11.zip" class="btn-herramienta" style="width:80%;margin-bottom:8px;" download>DESCARGAR</a>
                                    </div>
                                    <div style="background:#e7eafd;border-radius:12px;padding:12px 0;">
                                        <div style="font-weight:700;color:#18126d;font-size:1.08rem;margin-bottom:8px;">Windows 10</div>
                                        <div style="display:flex;gap:10px;justify-content:center;">
                                                      <a href="/herramientas/driver/TM-T20II-WIN10-64bit.zip" class="btn-herramienta" style="width:48%;" download>DESCARGAR 64BIT</a>
                                                      <a href="/herramientas/driver/TM-T20II-WIN10-32bit.zip" class="btn-herramienta" style="width:48%;" download>DESCARGAR 32BIT</a>
                                        </div>
                                    </div>
                                </div>
            </div>
            <div class="advance-model-card" style="border:2px solid #18126d; background:#f4f7ff; min-width:320px;">
                <span style="font-size:1.15rem; font-weight:700; color:#18126d; margin-bottom:10px;">Epson TM-T20III</span>
                                <a href="#" class="btn-herramienta" style="width:90%;margin:18px auto 0 auto;display:block;font-size:1.08rem;padding:14px 0;letter-spacing:0.5px;position:relative;" onclick="toggleEpsonContent('epsonT20IIIContent', this); return false;">
                                        Windows <span style="font-size:1.2em;vertical-align:middle;">&#8595;</span>
                                </a>
                                <div id="epsonT20IIIContent" class="epson-content" style="display:none;">
                                    <div style="background:#e7eafd;border-radius:12px;padding:12px 0;margin-bottom:10px;">
                                        <div style="font-weight:700;color:#18126d;font-size:1.08rem;margin-bottom:8px;">Windows 11</div>
                                               <a href="/herramientas/driver/TM-T20III-WIN11.zip" class="btn-herramienta" style="width:80%;margin-bottom:8px;" download>DESCARGAR</a>
                                    </div>
                                    <div style="background:#e7eafd;border-radius:12px;padding:12px 0;">
                                        <div style="font-weight:700;color:#18126d;font-size:1.08rem;margin-bottom:8px;">Windows 10</div>
                                        <div style="display:flex;gap:10px;justify-content:center;">
                                                   <a href="/herramientas/driver/TM-T20III-WIN10-64bit.zip" class="btn-herramienta" style="width:48%;" download>DESCARGAR 64BIT</a>
                                                   <a href="/herramientas/driver/TM-T20III-WIN10-32bit (1).zip" class="btn-herramienta" style="width:48%;" download>DESCARGAR 32BIT</a>
                                        </div>
                                    </div>
                                </div>
            </div>
        </div>
    </div>
<script>
function toggleEpsonContent(contentId, btn) {
    var content = document.getElementById(contentId);
    var allContents = document.querySelectorAll('.epson-content');
    allContents.forEach(function(el) {
        if (el !== content) el.style.display = 'none';
    });
    var arrow = btn.querySelector('span');
    if (content.style.display === 'none' || content.style.display === '') {
        content.style.display = 'block';
        arrow.innerHTML = '&#8593;';
    } else {
        content.style.display = 'none';
        arrow.innerHTML = '&#8595;';
    }
}
</script>
</div>
