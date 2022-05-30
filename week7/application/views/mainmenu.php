<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title; ?></title>
  <style>
    html {
    height:100%;
    }
    body {
    height: 946px;
    background:linear-gradient(to top, #66ffff 0%, #3333cc 100%)fixed;
  }


  </style>
</head>
<body>
<div align="center">
  <table width="379" height="286" border="3" bordercolor="#666666">
    <tr>
      <td height="190" bgcolor="#ccffff">
          <p align="center"><strong>My Guestbook</strong></p>
          <p align="center">Date : <?php echo date("d-m-Y",time()); ?></p>
          <p align="center">Time :  <?php date_default_timezone_set("Asia/Kuala_Lumpur"); echo date("H:i",time()); ?></p>
          <p align="center"><a href="<?php echo base_url('myguestbook/create/'); ?>">Add</a> | <a href="<?php echo base_url('myguestbook/view/'); ?>">List</a></p>
      </td>
    </tr>
  </table>
</div>
  
</body>
</html>