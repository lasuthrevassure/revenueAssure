<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Lagos State University Teaching Hospital, Ikeja</h2>

  <br /> <br />

  <p>I beg to inform that {{ $title }} {{ $firstname }} {{ $lastname }} is unable to attend his/her duty in consequence of illness. </p>

  <br /> <br />

  {{ $doctor_name }} <br />

  <sup>......................................</sup> <br />

  Name of medical officer <br />
  <br /> <br />

  <img src="{{ public_path() . '/images/' . $doctor_signature }}" /> <br />

  <sup>......................................</sup> <br />
      signature <br />

  <br /> <br />
  
  To the Head of The {{ $to_department }} Department.

</div>
</div>
</body>
</html>
