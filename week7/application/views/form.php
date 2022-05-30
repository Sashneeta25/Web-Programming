<!DOCTYPE html>
<html>
<head>
<meta>
  <title><?php echo $title; ?></title>
  <style>
    html {
    height:100%;
    }
    body {
    height: 946px;
    background:linear-gradient(to bottom, #66ffff 0%, #3333cc 100%)fixed;
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
  
<body bgcolor="#FFFFFF" text="#000000">
<?php echo validation_errors(); ?>
<form name="form1" method="post" action="">
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
  <input type="hidden" name="form-submitted" value="add" />
  <input type="submit" name="Submit" value="Add a New Comment" style="margin-left: 88px">&nbsp;
  <input type="reset">
  <br>
</form>
</body>
</html>