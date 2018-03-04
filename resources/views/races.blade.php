@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">

            <!-- Current Races -->
            @if (count($races) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading" align="center">
                        Current Race List
                    </div>

                    <div class="panel-body table-responsive">
                        <table class="table table-striped race-table">
                            <thead>
                                <th>Race Name</th>
                                <th>Meeting</th>
                                <th>Type</th>
                                <th>Closing Time</th>
                            </thead>
                            <tbody>
                                @foreach ($races as $race)
                                    <tr id="{{ 'tr'.$race['id'] }}" onclick="goRace({{ $race['id'] }})">
                                        <!-- <td class="table-text"><div>{{ $race['id'] }}</div></td> -->
                                        <td class="table-text"><div>{{ $race['race_name'] }}</div></td>
                                        <td class="table-text"><div>{{ $race['meeting'] }}</div></td>
                                        <td class="table-text"><div>{{ $race['meeting_type'] }}</div></td>
                                        <td class="table-text" id="{{ 'td'.$race['id']}}"><div>{{ $race['close_time'] }}</div></td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

<script>
    function countdown(datetime_str, element_id_str, tr_id) {
        // Set the date we're counting down to
        var countDownDate = new Date(datetime_str).getTime();
    
        // Update the count down every 1 second
        var x = setInterval(function() {
   
            // Get todays date and time
            var now = new Date().getTime();
                 
            // Find the distance between now an the count down date
            var distance = countDownDate - now;
                             
            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                                                         
            // Output the result in an element with id="demo"
            if (days > 0) {
                document.getElementById(element_id_str).innerHTML = days + "d " + hours + "h "
                           + minutes + "m " + seconds + "s ";
            } else if (hours > 0) {
                document.getElementById(element_id_str).innerHTML = hours + "h "
                           + minutes + "m " + seconds + "s ";
            } else if (minutes > 0) {
                document.getElementById(element_id_str).innerHTML = minutes + "m " + seconds + "s ";
            } else {
                document.getElementById(element_id_str).innerHTML = seconds + "s ";
            }                                                                   
            // If the count down is over, write some text 
            if (distance < 0) {
                clearInterval(x);
                document.getElementById(element_id_str).innerHTML = "Closed";
                $('#'+tr_id).remove();
            }
        }, 1000);
    }
    function goRace(race_id) {
        window.location = "{{ url('race/') }}" + '/' + race_id;
    }
    @foreach ($races as $race)
        countdown("{{ $race['close_time'] }}", "{{ 'td'.$race['id'] }}", "{{ 'tr'.$race['id'] }}");
    @endforeach 
</script>
