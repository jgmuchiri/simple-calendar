<div id='calendar'></div>

<?php
$this->load->view($this->module . 'new_event');
$this->load->view($this->module . 'edit_event');
$this->load->view($this->module . 'view_event');
?>

<script type="text/javascript">
    //calendar
    calendar = $('#calendar').fullCalendar({
        editable: false,
        selectable: false,
        eventLimit: true,
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        events: {
            url: '<?php echo site_url('calendar/events'); ?>'
        },
        //end click
        timeFormat: 'H(:mm)',
        eventClick: function (calEvent, jsEvent, view) {
            var start_d = calEvent.start.format("MM/DD/YYYY");
            var start_t = calEvent.start_t;
            var end_d = calEvent.end.format("MM/DD/YYYY");
            var end_t = calEvent.end_t;

            $('#view-event').modal('show');
            $('.modal-title').html(calEvent.title);
            $('.event-start-sm').html(start_d + ' ' + start_t);
            $('.event-end-sm').html(end_d + ' ' + end_t);
            $('.event-desc').html(calEvent.description);
            //edit event
            $('.edit-event-btn').click(function () {
                $('#edit-event').modal('show');
                $('#view-event').modal('hide');
                $('input#event_id').val(calEvent.id);
                $('input#event_title').val(calEvent.title);
                /*
                 //populate input fields (currently disabled)
                 $('input#start_date').attr('type', 'text').val(start_d);
                 $('input#start_time').attr('type', 'text').val(start_t);
                 $('input#end_date').attr('type', 'text').val(end_d);
                 $('input#end_time').attr('type', 'text').val(end_t);
                 */
                $("textarea#editor2").val(calEvent.description);
            });
            //delete event
            $('.trash-event-btn').click(function () {
                if (confirm('Are you sure you want to delete this?')) {
                    $.ajax({
                        type: "POST",
                        url: '<?php echo site_url('calendar/delete_event'); ?>',
                        data: 'event_id=' + calEvent.id,
                        success: function () {
                            window.location.href = 'calendar';
                        },
                        error: function () {
                            window.location.href = 'calendar';
                        }
                    });
                }
            });
        },
        //day click
        dayClick: function (calEvent, jsEvent, view) {
            $('#new-event').modal('show');
        }
    });

    $('.fc-right').prepend('<button class="btn btn-default new-event-btn">' +
        '<span class="glyphicon glyphicon-plus"></span>' +
        'add event' +
        '</button>');
    $('.new-event-btn').click(function () {
        $('#new-event').modal('show');
    });
</script>