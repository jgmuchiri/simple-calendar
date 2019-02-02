<?php echo form_open('help/new_article','class="pull-right" style="width:400px"'); ?>
<div class="input-group">
    <span class="input-group-addon">new article</span>
    <input class="form-control" name="article_name" type="text" value="" required="" placeholder="article name"/>
    <span class="input-group-btn">
         <button class="btn btn-default">GO!</button>
    </span>

</div>
<?php echo form_close(); ?>