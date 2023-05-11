<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.css" />
</head>
<body>

<div class="container my-5">
  <h2>PHP To Do List</h2>
  
  <div class="row">
    <div class="col-sm-6">
        <?php
            include("database.php");
            include("delete-to-do.php");
            include("to-do-form.php");
            include("to-do-list.php");
        ?>
    </div>
     <div class="col-sm-6">
      <div id='calendar'></div>
     </div>
  </div>
</div>
<!-- JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="assets/js/bootstrap-datetimepicker.js"></script>
<!-- Languages -->
<script src="assets/js/locales/bootstrap-datetimepicker.uk.js"></script>
<script src="
https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js
"></script>
<script>

document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth', // Set the initial view to month
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay' // Add day, week, month buttons
    },
    events: function(info, successCallback, failureCallback) {
      // Process the received data and pass it to the calendar
      var events = <?php echo json_encode($works['data']); ?>;
      // Iterate through the response and create event objects
      events.forEach(function(eventData) {
        var event = {
          title: eventData.work_name,
          start: eventData.start_date,
          end: eventData.end_date,
          // Add more properties as needed
        };
        events.push(event);
      });
      // // Call the success callback with the populated events array
      successCallback(events);
      // // Call the failure callback in case of error
      // failureCallback(error);
    },
    views: {
      dayGridMonth: { // Month view configuration
        // Month view options here
        fixedWeekCount: true, // Always display six weeks in a month
        weekNumbers: false, // Display week numbers
        firstDay: 1 // Set Monday as the first day of the week
      },
      timeGridWeek: { // Week view configuration
        // Week view options here
        slotDuration: '00:30:00', // Set time slot duration to 30 minutes
        slotLabelInterval: '01:00:00', // Display time slot labels every hour
        allDaySlot: false // Hide the "all-day" slot
      },
      timeGridDay: { // Day view configuration
        // Day view options here
        slotDuration: '00:15:00', // Set time slot duration to 15 minutes
        slotLabelInterval: '00:30:00', // Display time slot labels every 30 minutes
        allDaySlot: false // Hide the "all-day" slot
      }
    }
  });

  calendar.render();
});

</script>
<script>
    $(function(){
      $('.default').datetimepicker();
    });

  </script>
</body>
</html>