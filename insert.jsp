<!DOCTYPE html>
<html>
<head>
<meta >
<title>new registration</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<form method="post"><br><br>

name :<input type="text" name="txtName" id="txtName"/><br><br>
address name :<input type="text" name="txtAddress" id="txtAddress"/><br><br>
city_name :<input type="text" name="txtCity" id="txtCity" /><br><br>
state :<input type="text" name="txtState" id="txtState"/><br><br>
zip<input type="text" name="txtZipCode" id="txtZipCode"/><br><br>
phone<input type="text" name="txtPhone" id="txtPhone"/><br><br>
email<input type="text" name="txtEmail" id="txtEmail"/><br><br>


<input type="submit" value="submit" id="save_data"/>

</form>
<script>
$(document).ready(function() {
$("#save_data").click(function() {
alert("success");
$.ajax({
url: "Save.jsp",
type: "post",
data: {
name:$('#txtName').val(),
address:$('#txtAddress').val(),
city:$('#txtCity').val(),
state:$('#txtState').val(),
zipCode:$('#txtZipCode').val(),
phone:$('#txtPhone').val(),
email:$('#txtEmail').val(),
}
});
});
});
</script>
</body>
</html>
