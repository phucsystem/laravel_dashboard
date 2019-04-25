@extends('layouts/master')

@section('content')

@javascript(compact('pusherKey', 'pusherCluster', 'clientConnectionPath', 'environment', 'openWeatherMapKey'))
<div id="dashboard">
    <dashboard class="font-sans">
        <uptime position="a1:a24"></uptime>
        <last-mails position="b1:b24"></last-mails>
        <team-member name="adriaan" avatar="{{ gravatar('adriaan@spatie.be') }}" birthday="1995-10-22" position="c1:b8"></team-member>
        <team-member name="brent" avatar="{{ gravatar('brent@spatie.be') }}" birthday="1994-07-30" position="c9:b16"></team-member>
        <team-member name="ruben" avatar="{{ gravatar('ruben@spatie.be') }}" birthday="1994-05-16" position="c17:b24"></team-member>
        <team-member name="alex" avatar="{{ gravatar('alex@spatie.be') }}" birthday="1996-02-05" position="d1:c8"></team-member>
        <team-member name="freek" avatar="{{ gravatar('freek@spatie.be') }}" birthday="1979-09-22" position="d9:c16"></team-member>
        <team-member name="sebastian" display-name="seb" avatar="{{ gravatar('sebastian@spatie.be') }}" birthday="1992-02-01" position="d17:d24"></team-member>
        <time-weather position="e1:e6" date-format="ddd DD/MM" time-zone="Europe/Stockholm" weather-city="Gävle"></time-weather>
        <internet-connection position="e1:e6"></internet-connection>
        <calendar position="e7:e24"></calendar>
    </dashboard>
</div>

@endsection
