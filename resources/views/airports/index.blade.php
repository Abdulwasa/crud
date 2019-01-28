

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Airports</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
          {!! $map['js'] !!}
      <style>
      body{
        margin:0px;
        padding: 0px;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
        background: #E8DFE1;
      }
        .header{
          margin: 0px 45%;
          font-family: sans-serif;
          font-weight: 100;
          }

        .contents{
          width: 100%;
          height: 100%;
          margin:0px;
          padding: 0px;
          display: flex;
          flex-direction: row;
          justify-content: center;
          flex-wrap: wrap;
          font-family: sans-serif;
          font-weight: 100;
        }
        .airports{
          width: 300px;
          height: 260px;
          background: #02020220;
          border: solid #0504 2px;
        }
        .airports:hover{
          background: #02020200;
          margin: 1px;
          padding: 1px;
          transition: transform 5s easeout;
          border: solid #8082 2px;
        }
        a{
          text-decoration: none;
        }
        .airport-infos{
          color: #4B484A;
          text-align: center;
        }
        .airport-infos{
          margin-top: 60px
        }
        .airports:hover > .airports-name{
          color: #4B484A;
        }
       .more, .edit, .delete{
            width: 40px;
            height: 20px;
            border: none;
            color: white;
            text-align: center;
            display: inline-block;
            font-size: 10px;
            margin: 1px;
            cursor: pointer;
            border-radius: 5%;
            outline: none;
            text-decoration: none;
          }
          .more{
            background-color: #69A64E; /* Green */
            padding-top: 4px;
          }
          .delete{
            background-color: #DF1E5B; /* Green */
            padding: 4px 4px;
          }
          .edit{
            background-color: #5E4DAB; /* Green */
            padding-top: 4px;
          }

        .form-controller{
            margin-left: 400px;
            width: 500px;
            background: #F1B8C3;
            padding: 10px;
            box-shadow: -1px 1px 7px 0px rgba(0,0,0,0.75);
        }
          .new-header{
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
            background: #FB8979;
            color: #ffffff;
            border: none;
            outline: none;
            cursor: pointer;
          }
          .error{
              margin: 10px 100px;
              color: red;
          }
          @media screen  and (min-width: 1700px){
            .new-header{
              margin-left: 700px;
            }
            .form-controller{
              margin-left: 500px;
              width: 600px;
            }
          }
          @media screen  and (min-width: 1200px){
            .new-header{
              margin-left: 550px;
            }

          }
          @media screen  and (max-width: 1200px){
            .new-header{
              margin-left: 250px;
            }
            .form-controller{
              margin-left: 200px;
              width: 550px;
            }
          }
          @media screen  and (max-width: 800px){
            .new-header{
              margin-left: 180px;
            }
            .form-controller{
              margin-left: 100px;
              width: 400px;
            }
          }
          @media screen  and (max-width: 500px){
            .new-header{
              margin-left: 80px;
            }
            .form-controller{
              margin-left: 50px;
              width: 300px;
            }
          .header{
            margin: 0px 35%;
          }
        }
    </style>
    </head>
    <body>
{!! $map['html'] !!}
      <div class="header">
          <h1> Airports</h1>
        </div>
        @if ($message = Session::get('message'))
          <div class="alert alert-success">
              <p>{{ $message }}</p>
          </div>
        @endif

        <div class="contents">

          @foreach($airports as $airport)
                <div class="airports" class="airports-name">
                    <div class="airport-infos">
                        <h4>{{$airport->airport_name}}</h4>

                        @foreach($country as $coun)
                          @if($coun->name == $airport->country)

                            <p>{{$coun->name}}, {{$airport->location}}, {{$coun->code}}</p>
                          @endif
                          @endforeach
                        <a href="/airlines" class="more">show</a><br>
                         <a class="edit" href="{{ route('airports.update', $airport->id) }}">Edit</a>
                         <form action="{{ route('airports.destroy', [$airport->id]) }}"
                               method="POST"
                               onclick="return confirm('Do you want delete It ?')">
                               {{ csrf_field() }}
                               {{ method_field('DELETE') }}

                             <button type="submit" class="delete">Delete</button>
                          </form>
                    </div>
                  </div>

            @endforeach
          </div>

            {!! Form::open(['route'=> 'airports.store']) !!}
            <h1 class="new-header"> Add new Airport </h1>
            <div class="form-controller">
              {!! Form::label('label', 'enter the airport name') !!}
              {!! Form::text('airport_name', null, ['class'=>'airport-name']) !!}

              <br />
              {!! Form::label('label', 'enter the country') !!}
              {!! Form::text('country', null, ['class'=>'country']) !!}

              <br />
              {!! Form::label('location', 'enter the location') !!}
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
        </div>
    </body>
</html>
