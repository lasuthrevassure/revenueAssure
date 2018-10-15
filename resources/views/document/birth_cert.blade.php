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
  <h3 class="text-center">AYINKE HOUSE</h3>

  <br />
  <h3 class="text-center">NOTIFICATION OF BIRTH</h3>
  <br />

  <p class="text-center">This is to certify that a {{ $gender }} baby was delivered by</p>

<br /><br />

  <p>Mr {{ $father }}  and Miss/Mrs {{ $mother }}</p>

  <p>Residing at {{ $residential_address }}.</p>

  <p>At {{ $delivery_time }} on {{ date("d", strtotime($delivery_date)) }} day of {{ date("F", strtotime($delivery_date)) }},

      {{ date("Y", strtotime($delivery_date)) }}</p>

  <p>Consultant InCharge {{ $consultant }} </p>


  <p>Delivered by {{ $delivered_by }}  Birth Weight {{ $birth_weight }}</p>

  <table class="table">
    <tbody>
      <tr>
          <td>
                <p>{{ $chief_matron }} </p>

                <p>Chief Matron I/C</p>
          </td>
        <td>
          <p>{{ $doctor_name }} </p>

          <img src="{{ public_path() . '/images/' . $doctor_signature }}" /> <br />

          <p>{{ $doctor_designation }} </p>

        </td>
      </tr>
    </tbody>
  </table>




</div>
</body>
</html>
