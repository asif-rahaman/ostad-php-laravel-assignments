<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text],input[type=email], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  width:50%;
  margin:0 auto;
}
</style>
</head>
<body>

<h3 style="text-align:center;">Contact Form</h3>

<div class="container">
  <form action="form-action.php"  method="post">
    <label for="fname">Name</label>
    <input type="text" id="name" name="name" placeholder="Your name..">

    <label for="lname">Email</label>
    <input type="email" id="email" name="email" placeholder="Your email..">
    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>