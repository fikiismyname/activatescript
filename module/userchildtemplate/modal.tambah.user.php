<!-- Modal -->
<div class="c-modal c-modal--xsmall modal fade" id="modal4" tabindex="-1" role="dialog" aria-labelledby="modal4">
    <div class="c-modal__dialog modal-dialog" role="document">
        <div class="c-modal__content">
            <div class="c-modal__header">
                <h3 class="c-modal__title">Pendaftaran User Template</h3>
                <span class="c-modal__close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-close"></i>
                </span>
            </div>
            <div class="c-modal__body">
                <form method="POST">            
                    <div class="c-field u-mb-xsmall">
                        <label class="c-field__label" for="selectuser">Nama User</label>
                        <!-- Select2 jquery plugin is used -->
                        <select name="id_user_child" class="c-select" id="selectuser">
                            <?php  
                            $sql = "SELECT * FROM tb_user_child WHERE id_user='$_SESSION[id]'";
                            $result = $mysql->query($sql);
                            if ($result->num_rows == 0) {
                                sweetalert('Isi Data User Terlebih dahulu, data masih kosong !','error');        
                                header("Location: ./?module=userchild");
                                exit;
                            }
                            ?>
                            <?php
                            while ($read = $result->fetch_array()) {
                                echo "<option value='".$read['id']."'>".$read['username']."</option>";
                            }
                            ?>
                        </select>
                    </div>          
                    <div class="c-field u-mb-xsmall">
                        <label class="c-field__label" for="selecttemplate">Pilih Template</label>
                        <!-- Select2 jquery plugin is used -->
                        <select name="id_template" class="c-select" id="selecttemplate">
                            <?php  
                            $sql = "SELECT * FROM tb_template WHERE id_user='$_SESSION[id]'";
                            $result = $mysql->query($sql);
                            if ($result->num_rows == 0) {
                                sweetalert('Isi Data Template Terlebih dahulu, data masih kosong !','error');        
                                header("Location: ./?module=template");
                                exit;
                            }
                            ?>
                            <?php
                            while ($read = $result->fetch_array()) {
                                echo "<option value='".$read['id']."'>".$read['template']."</option>";
                            }
                            ?>
                        </select>
                    </div>          
                    <button class="c-btn c-btn--success" name="tambah" type="submit">
                        Tambah User Template
                    </button>
                </form>
            </div>
        </div><!-- // .c-modal__content -->
    </div><!-- // .c-modal__dialog -->
</div><!-- // .c-modal -->