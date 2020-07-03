<!DOCTYPE html>
<html>
<head>
	<title>Jquery </title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#b1").click(function(){
    $("p").hide();
  });
});
$(document).ready(function(){
  $("#b2").click(function(){
    $("h2").hide();
  });
});
$(document).ready(function(){
  $("#b3").click(function(){
    $(".hideall").hide();
  });
});
</script>


</head>
<body>
<h2>This is a heading</h2>

<p>This is a paragraph.</p>
<p>This is another paragraph.</p>

<button class = "hideall" id= "b1">Click me to hide paragraph</button>
<button class = "hideall" id= "b2">Click me to hide Heading</button>
<button class = "hideall" id= "b3">Click me to hide all buttons</button>
</body>
</html>