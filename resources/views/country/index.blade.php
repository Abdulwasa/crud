@foreach($countries as $country)
  <a href="" class="airports-name well"><b>Name</b>: {{$country->name}}</a>
  <p><b>Country code</b>: {{$country->code}}</p>
@endforeach
