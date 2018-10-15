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
  <h3 class="text-center">MEDICAL NOTIFICATION OF CAUSE OF DEATH</h3>
  <br />

  <p class="text-center">I Hereby certify that I have medically attended </p>

<br /><br />

  <p>Mr {{ $firstname }}  {{ $lastname }} of {{ $residential_address }} who was  apparently or stated to be aged {{ $age }} years, that I last saw {{ $firstname }}  {{ $lastname }} </p>

  <p>on the {{ date("d", strtotime($last_seen_date)) }} day of {{ date("F", strtotime($last_seen_date)) }},

      {{ date("Y", strtotime($last_seen_date)) }}, that {{ ($gender == "Male") ? "he":"she" }} Died as I am aware or informed on the on the {{ date("d", strtotime($death_date)) }} day of {{ date("F", strtotime($death_date)) }}

      at {{ $death_time }} and that the cause of death was to the best of my knowledge and belief as herein stated, viz:- <br />
    </p>

  <p>Primary Cause {{ $primary_cause }} </p>

  <p>Secondary Cause {{ $secondary_cause }} </p>

  <p>And that the disease had continued {{ $disease_time }} </p>

  <p>Witness my hand this  on the {{ date("d", strtotime($witness_date )) }} day of {{ date("F", strtotime($witness_date)) }},

      {{ date("Y", strtotime($witness_date)) }}</p>

  <p><img src="{{ public_path() . '/images/' . $doctor_signature }}" /> <br /></p>

  <p>Name (in Block Letter): {{ $doctor_name }}</p>

  <p>Medical Qualification: {{ $doctor_designation }}</p>

  <p>Address: {{ $doctor_address }}</p>
</div>
</body>
</html>
