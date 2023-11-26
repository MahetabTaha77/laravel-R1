<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2> Car Detalils</h2>
  <p>The .table-hover class enables a hover state on table rows:</p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Car Title : {{ $cars->carTitle}} </th><br>
      </tr>
      
      <tr>
      <th>Description : {{ $Cars->price}}</th><br>
      </tr>
      <tr>
      <th>Description : {{ $Cars->description}}</th><br>
      </tr>
      <tr>
      <th>Publish : {{ $cars->published}}</th><br>
      </tr>
    </thead>
    
  </table>
</div>

</body>
</html>
