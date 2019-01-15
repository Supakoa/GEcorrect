<?php 
if(isset($_POST['gogo'])){
    
    print_r($_POST['text']);
}
?>


		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="test.php" method="post">
<p>This is a paragraph.</p>
<p>This is another paragraph.</p>

<ol>
  <li>List item 1</li>
  <li>List item 2</li>
  <li>List item 3</li>
</ol>
<div class = "singha">
</div>
<button type="submit"name="gogo">gogo</button>
</form>
<button id="btn1">Append text</button>
<button id="btn2">Append list items</button>
</body>
</html>




<script>
$(document).ready(function(){
  $("#btn1").click(function(){
      var eiei = ""
    $(".singha").append("<input type=\"text\" name = \"text[]\">");
  });

  $("#btn2").click(function(){
    $("ol").append("<li>List item 1</li><li>List item 2</li><li>List item 3</li>");
  });
//   <div class=\"col-md-4 form-group\"><label for=\"value\">ห้อง</label><select name=\"\" id=\"room\" class=\"form-control select2\"><option>1701</option><option>1702</option><option>3111</option> </select><hr> </div><div class=\"col-md-4\"></div><div class=\"col-md-4 form-group\"><label for=\"value\">จำนวน</label><input id=\"value\" class=\"form-control\" type=\"text\" placeholder="1."><hr></div><div class=\"col-md-12 center\" ><button id = \"btn1\">+</button> </div>
});
</script>