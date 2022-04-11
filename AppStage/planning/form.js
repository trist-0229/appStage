
$(document).ready(function () {
    $("form").submit(function (event) {
      var formData = {
        first_name: $("#first_name").val(),
        last_name: $("#last_name").val(),
        start_time: $("#start_time").val(),
        end_time: $("#end_time").val(),
      };
  
      $.ajax({
        type: "POST",
        url: "insert.php",
        data: formData,
        dataType: "json",
        encode: true,
      }).done(function (data) {
        console.log(data);
      });
  
      event.preventDefault();
      document.getElementById("form").reset();
    });
  });