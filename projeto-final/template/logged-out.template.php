<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Natare App - <?= $current_route['title'] ?></title>
</head>

<body>
  <?php
  include 'view/' . $current_route['view'];
  ?>
</body>

</html>