<?php
foreach ($my_articles->result() as $row) {
    echo '<div class="alert alert-info">';
    //article title
    echo $row->article_name;

    //allow admin to edit help pages
    if ($this->config->item('edit_help') == true) {
        ?>

        <span class="label label-default cursor pull-right"
              onclick="window.location.href='help/editor/<?php echo $row->id; ?>'">
            <span class="glyphicon glyphicon-pencil"></span>
            edit</span>
    <?php
    }
    echo '</div>';

    //show article body
    echo $row->article_body;
}
?>