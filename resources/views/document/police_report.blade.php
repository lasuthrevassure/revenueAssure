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
  <h2 class="text-center">Lagos State University Teaching Hospital, Ikeja</h2>

  <br />

  <table class="table">
    <tbody>
      <tr>
          <td>Police Ref: {{ $police_ref }}</td>
          <td>{{ $hospital_ref }} Hospital</td>
      </tr>
      <tr>
        <td>Hospital Ref: {{ $hospital_ref }}</td>

          <td>{{ $signed_date }}</td>
      </tr>
    </tbody>
  </table>

  <br />
<h2 class="text-center">MEDICAL REPORT</h2>

<br /><br />

  <p>I {{ $doctor_name }}  Medical Practitioner of {{ $medical_ref }}  do hereby certify that on the {{ date("d", strtotime($report_date)) }} day of {{ date("F", strtotime($report_date)) }},

    {{ date("Y", strtotime($report_date)) }}</p>

<br /><br />

  <p>Police <u>{{ $police }}</u> did bring to me for examinations </p>

<br /><br />

  <p>     A person named {{ $firstname }} {{ $lastname }} {{ $gender }} </p>

  <p>     Complaint: {{ $complaint }}</p>

  <p>     Upon examination I found as follows {{ $medical_statement }}.</p>

<br /><br />

  <p>Name: {{ $doctor_name }} </p>
  
<img src="{{ public_path() . '/images/' . $doctor_signature }}" /> <br />

  <p>Designation: {{ $doctor_designation }} </p>

  <p>{{ $signed_date }}</p>

</div>
</body>
</html>
