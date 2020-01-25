<!-- Modal -->
<div class="c-modal c-modal--xsmall modal fade" id="modalupdate" tabindex="-1" role="dialog" aria-labelledby="modalupdate">
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
                 <div class="c-field u-mb-small">
                    <label class="c-field__label">Domain with out protocol (ex : kurteyki.com)</label>
                    <input name="domain" class="c-input" type="text" placeholder="">
                </div>
                <div class="c-field u-mb-xsmall">
                    <label class="c-field__label" for="updatetemplate">License to Template</label>
                    <!-- Select2 jquery plugin is used -->
                    <select name="template" class="c-select" id="updatetemplate">
                        <?php  
                        $sql = "SELECT 
                        tuct.id_user_child as id_user_child,
                        tuct.id_template as id_template,
                        template.id as template_id,
                        template.template as templatename
                        FROM tb_user_child_template as tuct
                        INNER JOIN tb_template as template
                        ON tuct.id_template=template.id
                        WHERE id_user_child ='$_SESSION[id]'";
                        $result = $mysql->query($sql);
                        if ($result->num_rows == 0) {
                            sweetalert('Sepertinya anda belum terdaftar !','error');        
                            header("Location: ./?module=");
                            exit;
                        }
                        ?>
                        <?php
                        $readakses = $_SESSION['akses'];
                        while ($read = $result->fetch_array()) {
                            echo "<option value='".$read['id_template']."'>".$read['templatename']."</option>";
                        }
                        ?>
                    </select>
                </div>            
                <button class="c-btn c-btn--success" name="update" type="submit">
                    Update License
                </button>
            </form>
        </div>
    </div><!-- // .c-modal__content -->
</div><!-- // .c-modal__dialog -->
</div><!-- // .c-modal -->