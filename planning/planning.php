<?php
require_once(dirname(__FILE__)."\..\inc\header.php");
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Jquery Fullcalandar Integration with PHP and Mysql</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
  <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script src="form.js"></script>
  <script>
   
  $(document).ready(function() {
   var calendar = $('#calendar').fullCalendar({
    editable:true,
    header:{
     left:'prev,next today',
     center:'title',
     right:'month,agendaWeek,agendaDay'
    },
    events: 'load.php',
    selectable:true,
    selectHelper:true,
    select: function(start, end, allDay)
    {
     var title = prompt("Enter Event Title");
     if(title)
     {
      var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
      var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
      $.ajax({
       url:"insert.php",
       type:"POST",
       data:{title:title, start:start, end:end},
       success:function()
       {
        
        alert("Added Successfully");
       }
      })
     }
    },
    editable:true,
    eventResize:function(event)
    {
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
     var title = event.title;
     var id = event.id;
     $.ajax({
      url:"update.php",
      type:"POST",
      data:{title:title, start:start, end:end, id:id},
      success:function(){
       calendar.fullCalendar('refetchEvents');
       alert('Event Update');
      }
     })
    },

    eventDrop:function(event)
    {
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
     var title = event.title;
     var id = event.id;
     $.ajax({
      url:"update.php",
      type:"POST",
      data:{title:title, start:start, end:end, id:id},
      success:function()
      {
       calendar.fullCalendar('refetchEvents');
       alert("Event Updated");
      }
     });
    },

    eventClick:function(event)
    {
     if(confirm("Are you sure you want to remove it?"))
     {
      var id = event.id;
      $.ajax({
       url:"delete.php",
       type:"POST",
       data:{id:id},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Event Removed");
       }
      })
     }
    },

   });
  });
   
  </script>
 </head>
 <body>
  <br />
  <h2 align="center"><a href="#">Planning des soutenances</a></h2>
  <br />
  <div class="container">
   <div id="calendar"></div>
  </div>
  <div class="form-popup" id="myForm">
  <form action="insert.php" method="POST" class="form-container" id="form">
    <h3>Informations de la soutenance</h3>

    <label for="firstName"><b>Nom</b></label>
    <input type="text" placeholder="Votre nom" name="first_name" id="first_name" required>
    <div class="invalid-feedback">
                Valid first name is required.
              </div>

    <label for="prénom"><b>Prénom</b></label>
    <input type="text" placeholder="Votre prénom" name="last_name" id="last_name" required>
    <div class="invalid-feedback">
                Valid last name is required.
              </div>
    
    
    <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Information complémentaires</h4>
        <form class="needs-validation" novalidate>
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="start" class="form-label">Heure de début</label>
              <input type="text" class="form-control" name="start_time" id="start_time" placeholder="" value="">
              
            </div>

            <div class="col-sm-6">
              <label for="end" class="form-label">Heure de fin</label>
              <input type="text" class="form-control" name ="end_time" id="end_time" placeholder="" value="" >

            </div>
            
    <button type="submit" class="btn">Enregistrer</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
    
  </form>
  
 </body>
</html>
