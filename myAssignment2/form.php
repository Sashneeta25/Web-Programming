
<!DOCTYPE html>
<html>
  <head>
    <title>Assignment 2-My Guestbook</title>
    <style>
      html {
      height:100%;
      }
      body {
      height: 946px;
      background:linear-gradient(to top, #ffccff 0%, #cc6699 100%)fixed;

      }
      form  { 
        display: table;      
      }
      p     {
       display: table-row;  
     }
      label {
       display: table-cell; 
       vertical-align: top;
     }
      input {
       display: table-cell; 
     }

    </style>
  </head>
  <body>
  <form method="post" action="insert.php">
  <p>
  <label> Name : </label>&nbsp;
  <input type="text" name="name" size="40" required>
  </p>
  <br>
  <p>
  <label> Email : </label>&nbsp;
  <input type="text" name="email" size="25" required>
  </p>
  <br>
  <p>
    <label> How did you find me? </label>&nbsp;
     <select name="howfind" required>
    <option value = "From a friend">From a friend</option>
        <option value = "I googled you">I googled you</option>
        <option value = "Just surf on in">Just surf on in</option>
        <option value = "From your Facebook">From your Facebook</option>
        <option value = "I clicked an ad">I clicked an ad</option> 
        </select>
  </p>
  <br>
  <p>
  <label>I like your:</label>
  <input type="checkbox" id="frontpage" name="frontpage" value="Front Page" label for="frontpage"> Front page</label> <br>
  <input type="checkbox" id="form" name="form" value="Form" label for="form"> Form </label><br>
  <input type="checkbox" id="userInterface" name="userInterface" value="User interface" label for="userInterface"> User interface</label>
  </p>
  <br>
  <p>
  <label> Comments :<br> </label>&nbsp;
  <textarea name="comment" cols="40" rows="8" required></textarea>
  <br>
  </p>
  <br><label> <br>
    <input type="submit" name="add_form" value="Add a New Comment"> &nbsp;
    <input type="reset"></label></form>
</body>
</html>
