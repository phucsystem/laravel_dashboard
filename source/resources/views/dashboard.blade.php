@extends('layouts/master')

@section('content')

@javascript(compact('pusherKey', 'clientConnectionPath', 'environment', 'openWeatherMapKey'))
<div id="dashboard">
    <dashboard class="font-sans">
        <twitter :initial-tweets="{{ json_encode($initialTweets) }}" position="a1:a12"></twitter>
        {{--<calendar position="a13:24"></calendar>--}}
        <uptime position="a13"></uptime>
        <tile-timer on="16:00" off="19:00">
            <trains position="a1:a24"></trains>
        </tile-timer>
        <team-member name="Nga" avatar="{{ gravatar('ngathanh225@gmail.com') }}" birthday="1991-05-22" position="b1:b8"></team-member>
        <team-member name="brent" avatar="{{ gravatar('brent@spatie.be') }}" birthday="1994-07-30" position="b9:b16"></team-member>
        <team-member name="freek" avatar="{{ gravatar('freek@spatie.be') }}" birthday="1979-09-22" position="b17:b24"></team-member>
        <team-member name="ruben" avatar="{{ gravatar('ruben@spatie.be') }}" birthday="1994-05-16" position="c9:c16"></team-member>
        <team-member name="sebastian" display-name="seb" avatar="{{ gravatar('sebastian@spatie.be') }}" birthday="1992-02-01" position="c17:c24"></team-member>
        <team-member name="willem" avatar="{{ gravatar('willem@spatie.be') }}" birthday="1975-09-04" position="d17:d24"></team-member>
        <team-member name="Phuc" avatar="{{ gravatar('phucsystem@gmail.com') }}" birthday="1990-04-08" position="c1:c8"></team-member>
        <time-weather position="e1:e6" date-format="ddd DD/MM" time-zone="Asia/Ho_Chi_Minh" weather-city="Saigon"></time-weather>
        <internet-connection position="e1:e6"></internet-connection>
        <statistics position="d1:d10"></statistics>
        <uptime position="d1:d10"></uptime>
        <calendar position="e7:e16"></calendar>
        <velo position="e17:e24"></velo>
    </dashboard>
</div>

@endsection
<script>
    import Calendar from "../js/components/Calendar";
    export default {
        components: {Calendar}
    }
</script>