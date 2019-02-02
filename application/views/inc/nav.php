<ol class="breadcrumb">
    <li class="<?php echo breadcrumbs('home'); ?>" onclick="window.location.href='<?php echo site_url(); ?>'">Home</li>
    <li class="<?php echo breadcrumbs('calendar'); ?>" onclick="window.location.href='<?php echo site_url('calendar'); ?>'">Calendar</li>
    <li class="<?php echo breadcrumbs('help'); ?>" onclick="window.location.href='<?php echo site_url('help'); ?>'">Documentation</li>
</ol>
<?php
//highlight current active breadcrumb
function breadcrumbs($crumb){
    $ci = & get_instance();
    if($ci->uri->segment(1)=="" && $crumb=='home'){
        return 'crumbs active cursor';
    } elseif($ci->uri->segment(1)==$crumb){
        return 'crumbs active cursor';
    }else{
        return 'crumbs cursor';
    }
}
?>
