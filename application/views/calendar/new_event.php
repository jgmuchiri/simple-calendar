<?php
$start = array(
    'name'  => 'start',
    'type'  => 'date',
    'class' => 'form-control',
    'id'    => 'start_date',
    'value' => '',
);
$start_time = array(
    'name'  => 'start_t',
    'type'  => 'time',
    'class' => 'form-control',
    'id'    => 'start_time',
    'value' => '',
);
$end = array(
    'name'  => 'end',
    'type'  => 'date',
    'class' => 'form-control',
    'id'    => 'end_date',
    'value' => '',
);
$end_time = array(
    'name'  => 'end_t',
    'type'  => 'time',
    'class' => 'form-control',
    'id'    => 'end_time',
    'value' => '',
);

$title = array(
    'name'  => 'title',
    'type'  => 'text',
    'value' => '',
    'id'=>'event_title',
    'class'=>'form-control'
);
$desc = array(
    'name'  => 'desc',
    'class' => '',
    'id'=>'editor',
    'style'=>'width:475px; height:50px'
);
?>

<div class="modal fade calendar-event-panel"
     id="new-event"
     tabindex="-1"
     role="dialog"
     aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title text-danger">New Event</h4>
            </div>
            <div class="modal-body">

                <?php echo form_open('calendar/add_event'); ?>
                <table class="table table-hover table-responsive">
                    <tr>
                        <td class="text-right">
                            <span class="label-text text-info">Title</span>
                        </td>
                        <td>
                            <?php echo form_input($title); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">
                            <span class="label-text text-info">Start</span>
                        </td>
                        <td class="input-group">
                            <?php echo form_input($start); ?>
                            <span class="input-group-addon">Time</span>
                            <?php echo form_input($start_time); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">
                            <span class="label-text text-info">End</span>
                        </td>
                        <td class="input-group">
                            <?php echo form_input($end); ?>
                            <span class="input-group-addon">Time</span>
                            <?php echo form_input($end_time); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">
                            <span class="label-text text-info">Details</span>
                        </td>
                        <td>
                            <?php echo form_textarea($desc); ?>
                            <a href="#" class ="label label-default" onclick="toggleArea1();">Toggle Editor</a>

                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary">Save changes</button>
                        </td>
                    </tr>
                </table>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>