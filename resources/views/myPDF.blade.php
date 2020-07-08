<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
       <h3 style="text-align: center; margin-bottom:50px;"> Racun turisticke organizacije</h3>

        <div style="display:inline-block; width:50%;">
            <div style="font-size:18px;font-weight:bold;">Turisticka organizacija</div>
            <div style="font-size:18px;font-weight:bold;">Vojvode Stanka Radonjica 63</div>
            <div style="font-size:18px;font-weight:bold;">Podgorica</div>
        </div>
        <div style="display:inline-block; width:50%; ">
            <div style="display:inline-block;float: right;font-size:16px;font-weight:bold;">Telefon: 069-123-456</div> <br>
            <div style="display:inline-block;float: right;font-size:16px;font-weight:bold;">Fax: 020-123-456</div> <br>
            <div style="display:inline-block;float: right;font-size:16px;font-weight:bold;">Email: ito@t-com.me</div> <br>
        </div>

      
        <div>
            <div style="display:inline-block;font-size:16px;font-weight:bold;">Detalji o registraciji </div>
            <div style="display:inline-block;float: right;">Informator: {{$userName}}</div>
        </div>
     
       <table style="border-collapse: collapse; border: 1px solid black; width:100%;   ">
        <thead>
          <tr>
            <th style="border: 1px solid black;padding:5px">Datum prijave gosta</th>
            <th style="border: 1px solid black;padding:5px">Datum odjave gosta</th>
            <th style="border: 1px solid black;padding:5px">Ukupno trajanje (u danima)</th>
          </tr>
        </thead>
        <tbody>
          <tr style="background: lightgray;">
            <td style="border: 1px solid black;padding:5px;text-align:center;">{{$checkIn}}</td>
            <td style="border: 1px solid black;padding:5px;text-align:center;">{{$checkOut}}</td>
            <td style="border: 1px solid black;padding:5px;text-align:center;">{{$count}}</td>
          </tr>
        </tbody>
      </table>

      <div style="margin-top:50px;">
        <div style="display:inline-block;font-size:16px;font-weight:bold;">Detalji o Gostu </div>
    </div>
 
   <table style="border-collapse: collapse; border: 1px solid black; width:100%;   ">
    <thead>
      <tr>
        <th style="border: 1px solid black;padding:5px">Ime</th>
        <th style="border: 1px solid black;padding:5px">Prezime</th>
        <th style="border: 1px solid black;padding:5px">Broj putne isprave</th>
        <th style="border: 1px solid black;padding:5px">Vrsta isprave</th>
      </tr>
    </thead>
    <tbody>
      <tr style="background: lightgray;">
        <td style="border: 1px solid black;padding:5px;text-align:center;">{{$guestName}}</td>
        <td style="border: 1px solid black;padding:5px;text-align:center;">{{$guestLastname}}</td>
        <td style="border: 1px solid black;padding:5px;text-align:center;">{{$guestDocumentNumber}}</td>
        <td style="border: 1px solid black;padding:5px;text-align:center;">{{$guestDocument}}</td>
      </tr>
    </tbody>
  </table>

        <div style="margin-top:50px;">
            <div style="display:inline-block;font-size:16px;font-weight:bold;">Detalji o stanodavcu </div>
        </div>

        <table style="border-collapse: collapse; border: 1px solid black; width:100%;   ">
        <thead>
        <tr>
            <th style="border: 1px solid black;padding:5px">Ime</th>
            <th style="border: 1px solid black;padding:5px">Prezime</th>
            <th style="border: 1px solid black;padding:5px">Grad</th>
            <th style="border: 1px solid black;padding:5px">Adresa</th>
        </tr>
        </thead>
        <tbody>
        <tr style="background: lightgray;">
            <td style="border: 1px solid black;padding:5px;text-align:center;">{{$landlordName}}</td>
            <td style="border: 1px solid black;padding:5px;text-align:center;">{{$landlordLastname}}</td>
            <td style="border: 1px solid black;padding:5px;text-align:center;">{{$city}}</td>
            <td style="border: 1px solid black;padding:5px;text-align:center;">{{$address}}</td>
        </tr>
        </tbody>
        </table>

       

        <table style="border-collapse: collapse; border: 1px solid black; width:30%;margin-top:50px;   ">
        <thead>
        <tr>
            <th style="border: 1px solid black;padding:5px">Ukupna cijena</th>
        </tr>
        </thead>
        <tbody>
        <tr style="background: lightgray;">
            <td style="border: 1px solid black;padding:5px;text-align:center;">{{$price}}</td>
        </tr>
        </tbody>
        </table>
    </div>
</body>
</html>