<!-- Modal -->
<div class="c-modal c-modal--xsmall modal fade" id="modal4" tabindex="-1" role="dialog" aria-labelledby="modal4">
    <div class="c-modal__dialog modal-dialog" role="document">
        <div class="c-modal__content">
            <div class="c-modal__header">
                <h3 class="c-modal__title">Pendaftaran User</h3>
                <span class="c-modal__close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-close"></i>
                </span>
            </div>
            <div class="c-modal__body">
                <form method="POST">            
                    <div class="c-field u-mb-small">
                        <label class="c-field__label" for="select12">Nama User</label>
                        <input name="username" class="c-input" type="text" placeholder="">
                    </div>
                    <div class="c-field u-mb-small">
                        <label class="c-field__label" for="select12">Kata Sandi</label>
                        <input name="password" class="c-input" type="text" placeholder="">
                    </div>                    
                    <button class="c-btn c-btn--success" name="tambah" type="submit">
                        Buat User
                    </button>
                </form>
            </div>
        </div><!-- // .c-modal__content -->
    </div><!-- // .c-modal__dialog -->
</div><!-- // .c-modal -->