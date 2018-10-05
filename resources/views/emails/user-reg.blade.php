<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title></title>

        <style type="text/css">
        </style>    
    </head>
    <body style="margin:0; padding:0; background-color:#F2F2F2;">
        <center>
            <h3>Registration alert</h3>
            <p>Dear {{$user['name']}}</p>
            This is to notify you that you have given user access into Lasuth revenue assurance and below is your login detail </br>
            <ul>
                <li>Email: <b>{{$user['email']}}</b> </li>
                <li>Password: <b>{{$user['password']}}</b> </li>
            </ul>

            Please login  using the following link<br><br>
            ---<br>
            <a href="{{$user['url']}}">{{$user['url']}}</a><br>
        </center>
    </body>
</html>