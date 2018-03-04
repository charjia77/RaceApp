@extends('layouts.app_less_content')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">

            <!-- Current Races -->
            @if (count($race_details['competitors']) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading" align="center">
                        Current Race Detail
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped race-table">
                            <thead>
                                <th>Position</th>
                                <th>Competitor</th>
                            </thead>
                            <tbody>
                                @foreach ($race_details['competitors'] as $k => $competitor)
                                    <tr>
                                        <td class="table-text"><div>{{ $k+1 }}</div></td>
                                        <td class="table-text"><div>{{ $competitor }}</div></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div align="center"> 
                            <form action="{{ url('/') }}">
                                <input type="submit" value="Back To Race List" />
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

<script>
    setTimeout(function(){
       window.location.reload(1);
    }, 5000);   // get new positions of all competitors every 5s.
</script>
