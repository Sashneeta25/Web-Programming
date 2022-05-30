<!DOCTYPE html>
<html>
<head>
  <title>Week 6 Deliverables</title>
  <style>
    html {
    height:100%;
    }
    body {
    height: 946px;
    background:linear-gradient(to bottom, #00cc99 0%, #ccff99 100%)fixed;
  }

    p{
      display: table-row;
    }

    label{
      display: table-cell;
      vertical-align: top;
    }

    input{
      display: table-cell;
    }

  </style>
</head>
 
<body>
 
<form method="post" action="insert.php">
  <p>
  <label>Name :</label> &nbsp;
  <input type="text" name="name" size="40" required style="margin-left: 30px">
  </p>
  <br>
  <p>
  <label>Email :</label> &nbsp;
  <input type="text" name="email" size="25" required style="margin-left: 30px">
  </p>
  <br>
  <p>
  <label>Comments :<br></label> &nbsp;
  <textarea name="comment" cols="40" rows="8" required></textarea>
  </p>
  <br>
  <input type="submit" name="add_form" value="Add a New Comment" style="margin-left: 88px"> &nbsp;
  <input type="reset">
</form>
</body>
</html>