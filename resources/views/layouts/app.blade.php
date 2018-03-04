<!DOCTYPE html>
<html>

<head>
    <meta charset='UTF-8'>
    
    <title>Race List</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/style.css">
    
    <!--[if !IE]><!-->
    <style>
    
    /* 
 *  Max width before this PARTICULAR table gets nasty
 *      This query will take effect for any screen smaller than 760px
 *          and also iPads specifically.
 *              */
    @media 
    only screen and (max-width: 500px) {
    
        /* Force table to not be like tables anymore */
        table, thead, tbody, th, td, tr { 
            display: block; 
        }
        
        /* Hide table headers (but not display: none;, for accessibility) */
        thead tr { 
            position: absolute;
            top: -9999px;
            left: -9999px;
        }
        
        tr { border: 1px solid #ccc; }
        
        td { 
            /* Behave  like a "row" */
            border: none;
            border-bottom: 1px solid #eee; 
            position: relative;
            padding-left: 50%; 
        }
        
        td:before { 
            /* Now like a table header */
            position: absolute;
            /* Top/left values mimic padding */
            top: 6px;
            left: 6px;
            width: 45%; 
            padding-right: 10px; 
            white-space: nowrap;
        }
        
        /*
 *      Label the data
 *              */
        td:nth-of-type(1):before { content: "Race Name"; }
        td:nth-of-type(2):before { content: "Meeting"; }
        td:nth-of-type(3):before { content: "Type"; }
        td:nth-of-type(4):before { content: "Closing Time"; }
    }
    
    
    </style>
    <!--<![endif]-->

</head>

<body>
    @yield('content')
        
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
