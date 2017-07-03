<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Jeu Post IT</title>
  <link rel="stylesheet" href="./jquery-ui.min.css">
  <link rel="stylesheet" href="style.css" type="text/css">
  <script src="./jquery.js"></script>
  <script src="./jquery-ui.min.js"></script>
</head>
<body>


  <div id="wrapper">
  </div>

<div class="palette">
  <input type="color" id="colorpicker" value="#ffffff" />
<div class="pixel yellow"></div>
<div class="pixel black"></div>
<div class="pixel blue"></div>
<div class="pixel orange"></div>
<div class="pixel red"></div>
<div class="pixel purple"></div>
<div class="pixel green"></div>
<div class="pixel white"></div>
</div>

<script>
var rows = 16;
var columns = 16;
var $row = $("<div />", {
    class: 'row'
});
var $square = $("<div />", {
    class: 'square'
});

$(document).ready(function () {

    //add columns to the the temp row object
    for (var i = 0; i < columns; i++) {
        $row.append($square.clone());
    }
    //clone the temp row object with the columns to the wrapper
    for (var i = 0; i < rows; i++) {
        $("#wrapper").append($row.clone());
    }
});

$(document).ready(function() {
  $("#colorpicker").on("change",function(){
    $(".palette").append($("<div />", { id: 'new'}));
    $('#new').last().css("background-color",$("#colorpicker").val());


  });
     $('#new').draggable({
       drag: function(e, ui) {
         var color = $(this).css('background-color');
         $('.square').droppable({
            drop: function (e, ui) {
            $(this).css("background-color",color);
            }
        });
        },
       snap : '.square',
       helper: 'clone',
       revert: 'valid',
       cursor: "move"
    });
});


</script>

</body>
</html>
