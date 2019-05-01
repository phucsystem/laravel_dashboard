@extends('layouts/master')

@section('content')

@javascript(compact('pusherKey', 'pusherCluster', 'clientConnectionPath', 'environment', 'openWeatherMapKey'))
<div id="dashboard">
    <dashboard class="font-sans">
        <uptime position="a1:a24"></uptime>
        <last-mails position="b1:b24"></last-mails>
        <team-member name="Johan" avatar="{{ gravatar('johan@webbab.se') }}" birthday="1990-10-11" position="d1:d4"></team-member>
        <team-member name="Daniel" avatar="{{ gravatar('daniel@webbab.se') }}" birthday="1990-05-12" position="d5:d8"></team-member>
        <team-member name="Monica" avatar="{{ gravatar('monica@syvmonica.se') }}" birthday="1990-05-28" position="d9:d12"></team-member>
        <time-weather position="e1:e6" date-format="ddd DD/MM" time-zone="Europe/Stockholm" weather-city="Gävle"></time-weather>
        <internet-connection position="e1:e6"></internet-connection>
        <orders position="e7:e24"></orders>
    </dashboard>
</div>

@endsection
