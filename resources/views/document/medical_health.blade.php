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
  <h2>Bordered Table</h2>
  <p>The .table-bordered class adds borders to a table:</p>
  <table class="table table-bordered">
    <tbody>
      <tr>
        <th>Temperature</th>
        <td>{{ $temperature }}</td>
      </tr>
      <tr>
        <th>ecg</th>
        <td>{{ $ecg }}</td>
      </tr>
      <tr>
        <th>hepatatitis</th>
        <td>{{ $hepatatitis }}</td>
      </tr>
      <tr>
        <th>fbs</th>
        <td>{{ $fbs }}</td>
      </tr>
      <tr>
        <th>hiv</th>
        <td>{{ $hiv }}</td>
      </tr>
      <tr>
        <th>stool</th>
        <td>{{ $stool }}</td>
      </tr>
      <tr>
        <th>blood_pressure</th>
        <td>{{ $blood_pressure }}</td>
      </tr>
      <tr>
        <th>urinalysis</th>
        <td>{{ $urinalysis }}</td>
      </tr>
      <tr>
        <th>genotype</th>
        <td>{{ $genotype }}</td>
      </tr>
      <tr>
        <th>Doctor</th>
        <td>{{ $doctor_name }}</td>
      </tr>
      <tr>
        <th>Doctor Signature</th>
        <td><img src="{{ public_path() . '/images/' . $doctor_signature }}"/></td>
      </tr>
    </tbody>
  </table>
</div>
</div>
</body>
</html>
