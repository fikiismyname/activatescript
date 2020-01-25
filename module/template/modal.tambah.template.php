<!-- Modal -->
<div class="c-modal c-modal--xsmedium modal fade" id="modal4" tabindex="-1" role="dialog" aria-labelledby="modal4">
    <div class="c-modal__dialog modal-dialog" role="document">
        <div class="c-modal__content">
            <div class="c-modal__header">
                <h3 class="c-modal__title">Pendaftaran Template</h3>
                <span class="c-modal__close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-close"></i>
                </span>
            </div>
            <div class="c-modal__body">
                <form method="POST">            
                    <div class="c-field u-mb-small">
                        <label class="c-field__label" for="select12">Nama Template</label>
                        <input name="template" class="c-input" type="text" placeholder="">
                    </div>
                    <div class="c-field u-mb-small">
                    <label class="c-field__label" for="select12">URL Pembuat (will redirect to this page)</label>
                        <input name="url" class="c-input" type="text" placeholder="">
                    </div>
                    <div class="c-field u-mb-small">
                        <label class="c-field__label" for="select12">Kode untuk di Proteksi (pastikan kode sudah di obfuscator)</label>
                        <textarea name="protected" class="c-input" type="text" placeholder="Write JS Code"></textarea>
                    </div>
                    <button class="c-btn c-btn--success" name="tambah" type="submit">
                        Simpan
                    </button>
                </form>
            </div>
        </div><!-- // .c-modal__content -->
    </div><!-- // .c-modal__dialog -->
</div><!-- // .c-modal -->