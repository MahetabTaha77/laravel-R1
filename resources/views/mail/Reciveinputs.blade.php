
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
    <h2 class="text-center">Contac Form</h2>
	<div class="row justify-content-center">
		<div class="col-12 col-md-8 col-lg-6 pb-5">
                  
                            <div class="card-body p-3">

                                <!--Body-->
                         
                                            <table class="column" style="border-spacing:0;width:100%;max-width:300px;vertical-align:top;display:inline-block;">
                                                        <thead>
                                                            <h2> Car Detalils</h2>
                                                        </thead>
                                                        <tr>
                                                            <td style="padding:10px;">
                                                                <th>First Name : {{ $name }} </th><br>                                           
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding:10px;">
                                                            <th>Email : {{ $email}}  </th><br>                                           
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding:10px;">
                                                            <th>Subject : {{$subject }}  </th><br>                                           
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding:10px;">
                                                            <th>Message : {{ $messages}}  </th><br>                                           
                                                            </td>
                                                        </tr>
                                                        
                                              </table>
                                    

  
</div>
</div>
</div>
</body>
</html>
