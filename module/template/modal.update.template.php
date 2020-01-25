<!-- Modal -->
<div class="c-modal c-modal--xsmedium modal fade" id="modalupdate" tabindex="-1" role="dialog" aria-labelledby="modalupdate">
    <div class="c-modal__dialog modal-dialog" role="document">
        <div class="c-modal__content">
            <div class="c-modal__header">
                <h3 class="c-modal__title">Update License</h3>
                <span class="c-modal__close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-close"></i>
                </span>
            </div>
            <div class="c-modal__body">
                <form method="POST" id="formupdate">            
                    <input name="id" class="c-input" type="hidden" value="" />                  
                    <input name="template_old" class="c-input" type="hidden" value=""/>
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
                        <textarea rows="20" name="protected" class="c-input" type="text" placeholder="Write JS Code"></textarea>
                    </div>
                    <button class="c-btn c-btn--success" name="update" type="submit">
                        Update License
                    </button>
                </form>
            </div>
        </div><!-- // .c-modal__content -->
    </div><!-- // .c-modal__dialog -->
</div><!-- // .c-modal -->