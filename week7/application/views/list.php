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
a.one:link, a:visited {
    color: black;
    text-align: center;
    text-decoration: underline;
    display: inline-block;
  }

  a.one:hover, a:active {
  background-color: #ffff66;
  }

  </style>
</head>
 
<body bgcolor="#FFFFFF" text="#000000">
  <ol>
    <?php
    foreach ($result as $record): ?>
      <li>
      Name : <?php echo $record->user; ?><br>
      Email : <?php echo $record->email; ?><br>
      Date / Time : <?php echo $record->postdate." / ".$record->posttime; ?><br>
      Comment : <?php echo nl2br($record->comment); ?><br>
      Action : <a class="one" href="<?php echo base_url('myguestbook/edit/'); echo $record->id; ?>">Edit</a>
      / <a class="one" href="<?php echo base_url('myguestbook/remove/'); echo $record->id; ?>">Delete</a>
      <hr>
      </li>
    <?php endforeach; ?>
  </ol>
  <div align="center">
    [ <a class="one" href="<?php echo base_url('myguestbook/create/'); ?>">Add</a> ]
  </div>
</body>
  
</html>