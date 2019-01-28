<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Airports and Airline</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->

      <style>
      body{
        margin:0px;
        padding: 0px;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
      }
      .form-controller{
          margin-left: 400px;
          width: 500px;
          background: #FF5733;
          padding: 10px;
          box-shadow: -1px 1px 7px 0px rgba(0,0,0,0.75);
      }
        h1{
            margin-left: 380px
       }
        input[type=text]{
          width: 100%;
          padding: 10px 20px;
          margin: 4px 0;
          box-sizing:border-box;
          outline: none;
          border-radius: 2px;
          background: #FC7B60;
          border: none;
        }
        input[type=submit] {
          width: 30%;
          padding: 12px 20px;
          margin: 4px 0px;
          box-sizing: border-box;
          outline: none;
          background: #FB8971;
          color: #ffffff;
          border: none;
          outline: none;
        }
        .error{
            margin: 10px 100px;
            color: red;
        }
        @media screen  and (min-width: 1700px){
          h1{
            margin-left: 700px;
          }
          .form-controller{
            margin-left: 500px;
            width: 600px;
          }
        }
        @media screen  and (min-width: 1200px){
          h1{
            margin-left: 550px;
          }

        }
        @media screen  and (max-width: 1200px){
          h1{
            margin-left: 250px;
          }
          .form-controller{
            margin-left: 200px;
            width: 550px;
          }
        }
        @media screen  and (max-width: 800px){
          h1{
            margin-left: 180px;
          }
          .form-controller{
            margin-left: 100px;
            width: 400px;
          }
        }
        @media screen  and (max-width: 500px){
          h1{
            margin-left: 80px;
          }
          .form-controller{
            margin-left: 50px;
            width: 300px;
          }
        }
    </style>
    </head>
    <body>
      {!! Form::open(['route'=> ['airports.update', $airport->id], 'method' => 'put']) !!}
      <h1> Updating the airport</h1>
      <div class="form-controller">
        {!! Form::label('label', 'update the airport name') !!}
        {!! Form::text('airport_name', null, ['class'=>'airport-name']) !!}

        <br />
        {!! Form::label('label', 'update the country') !!}
        {!! Form::text('country', null, ['class'=>'country']) !!}

        <br />
        {!! Form::label('location', 'update the location') !!}
        {!! Form::text('location', null, ['class'=>'location']) !!}
        <br />
        {!! Form::submit('Submit', ['class' => 'btn btn-submit']) !!}
      </div>
      {!! Form::close() !!}

      <div>
        <div class="error">
          @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    </body>
</html>
