<?php require('login.php'); ?>

<script>
function validateForm()
{
var x=document.forms["article"]["title"].value;
var y=document.forms["article"]["summary"].value;
var z=document.forms["article"]["body"].value;
if (x==null || x=="")
  {
  alert("A title must be entered");
  return false;
  }if (y==null || y=="")
  {
  alert("A summary must be entered");
  return false;
  }if (z==null || z=="")
  {
  alert("A body must be entered");
  return false;
  }
}

function clean(t) {
	t.value = t.value.toString().replace(/[^a-zA-Z 0-9\n\r]+/g, '');
}
</script>
<h1>Submit a Post</h1>
<form name="article" method="post" action="action.php" onsubmit="return validateForm()">
<label for="title">Title:</label><br>
<input type="text" name="title" id="title" maxlength="255" onchange = "clean(this)" "><br>
<label for="summary">Summary:</label><br>
<input type="text" name="summary" maxlength="255" onchange = "clean(this)" ><br>
<label for="body">Body:</label><br>
<textarea name="body" rows="10" cols="30" maxlength="1000" onchange = "clean(this)" ></textarea><br>
<input type="submit">
<input type="reset">
</form>