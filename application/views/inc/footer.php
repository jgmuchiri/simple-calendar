</div><!--container-->

</div><!--main-->

<script type="text/javascript">
    $(document).ready(function () {
    //hide system messages
        $('.msg').hide().slideDown('slow').delay(2000).slideUp("slow");
    });
</script>
<div class="footer">
    <div class="footer-content">
        <hr/>
    <span class="">
        &copy;  <?php echo date('Y'); ?> ~
        <span class="label label-info"
              onclick="window.open('https://johnmuchiri.com','_blank')">@jgmuchiri</span>
        ~ ver: <?php echo $this->config->item('version'); ?>
    </span>
    </div>
</div>
</body>
</html>
