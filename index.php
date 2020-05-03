<?php

   $link = "https:/disease.sh/v2/countries";
   $ch = curl_init(); // cUrl active
   curl_setopt($ch, CURLOPT_URL, $link); //url
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   $result = curl_exec($ch);
   curl_close($ch); // cUrl stop
   //echo "$result"; //i checked
   $file='data.json';
   file_put_contents($file,$result); // i wrote json data
  // $data=json_decode($result); // array
  // print_r($data); //print array

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Corona Counter</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="table-responsive">
        <h1 style="background-color:DarkSalmon;" align="center"> COVİD-19 with Numbers </h1>
        <table class="table table-bordered" id="corona_table">
          <tr class="success">
            <th>Country</th>
            <th>Cases</th>
            <th>Deaths</th>
            <th>Recovered</th>
            <th>Tests</th>
          </tr>
        </table>
      </div>
    </div>
  </body>
</html>
<script>
      $(document).ready(function(){
        $.getJSON("data.json", function(data){
          var corona_data = '';
          $.each(data, function(key, value){
            corona_data += '<tr>';
            corona_data += '<td>' + value.country+'</td>';
            corona_data += '<td>' + value.cases+'</td>';
            corona_data += '<td>' + value.deaths+'</td>';
            corona_data += '<td>' + value.recovered+'</td>';
            corona_data += '<td>' + value.tests+'</td>';
            corona_data += '</tr>'
          });
          $('#corona_table').append(corona_data);
        });
      });
  </script>
