<ul class="nav help-doc-menu">
    <?php
    //list articles
    $this->db->order_by('order', 'asc');
    foreach ($this->db->get('help_articles')->result() as $row) {
        echo '<li><a href="#" id="' . $row->id . '">' . $row->article_name . '</a></li>';
    }
    ?>
</ul>