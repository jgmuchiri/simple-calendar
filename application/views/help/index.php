<table class="table table-responsive">
    <tr>
        <td class="col-sm-3">
            <?php $this->load->view('help/sidebar'); ?>
        </td>
        <td class="help-doc">
            <?php
            if($this->config->item('edit_help')){
                $this->load->view('help/new_article_form');
            }
            ?>
        </td>
    </tr>
</table>

<script type="text/javascript">
    //help articles
    $('.help-doc-menu>li>a').click(function () {
        var article_id = $(this).attr('id');
        //var thisUrl = window.location.href.split('#')[0];
        var thisUrl = '<?php echo site_url('help/help_article'); ?>';
        var page = thisUrl + '/'+article_id;

        $('.help-doc').html('loading <img src="<?php echo base_url(); ?>assets/images/loader.gif"/>').load(page);
    });

</script>