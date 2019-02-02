<h3>Editor
    <?php $this->load->view($this->module . 'new_article_form'); ?>
</h3>
<table class="table table-responsive">
    <tr>
        <td class="col-sm-3">
            <ul class="nav help-doc-menu">
                <?php
                //list articles
                $this->db->order_by('order', 'asc');
                foreach ($this->db->get('help_articles')->result() as $row) {
                    echo '<li>' . anchor('help/editor/' . $row->id, $row->article_name) . '</li>';
                }
                ?>
            </ul>
        </td>
        <td>
            <?php
            foreach ($articles as $row) {
                echo form_open('help/edit');
                ?>
                <div class="input-group">
                    <span class="input-group-addon">Title:  </span>
                    <input type="text"
                           name="article_name"
                           class="form-control"
                           placeholder="filename"
                           required=""
                           value="<?php echo $row->article_name; ?>"/>
                    <span class="input-group-addon">Order:  </span>
                    <input
                        type="text"
                        name="article_order"
                        class="form-control"
                        required=""
                        value="<?php echo $row->order; ?>"/>
                </div>
                <br/>

                <a href="#" class ="label label-default" onclick="toggleArea1();">Toggle Editor</a>

                <textarea
                    name="article_body"
                    class="form-control"
                    id="editor"
                    required=""
                    style="height:300px"><?php echo $row->article_body; ?></textarea>
                <br>
                <button class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger pull-right del-help-btn" id="<?php echo $row->id; ?>">
                    <span class="glyphicon glyphicon-trash"></span>
                    delete
                </button>
                <?php
                echo form_close();
            }
            ?>

        </td>
    </tr>
</table>


<script type="text/javascript">
    //delete help article
    $('.del-help-btn').click(function () {
        var article_id = $(this).attr('id');
        if (confirm('Are you sure you want to delete this?')) {
            window.location.href = '<?php echo site_url('help/delete'); ?>/'+article_id;
        }

    });

    //<![CDATA[
    var area1;

    function toggleArea1() {
        if (!area1) {

            area1 = new nicEditor({
                fullPanel: true,
                iconsPath: '<?php echo base_url(); ?>assets/images/nicEditorIcons.gif'
            }).panelInstance('editor', {hasPanel: true});
        } else {
            area1.removeInstance('editor');
            area1 = null;
        }
    }
    //]]>
</script>