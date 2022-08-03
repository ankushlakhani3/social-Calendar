<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Social Calendar</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $( "[id^='myid']" ).each(function() {
                    $(this).css("color",$(this).css("background-color"));
                    $(this).css("background-color", "transparent");
                });
            });
        </script>
        <style>
            #carddiv
            {
                width: auto;
                height: 200px;
                background-color:transparent;
                background-repeat: no-repeat;
                margin-bottom:60px;
                border-radius: 5px;
            }
            #cardb
            {
                margin-left:100px;
                padding: 8px 12px;
                background-color: transparent;
                border: 1px solid #0000FF;
                color:#0000FF;
                border-radius: 10px;
            }
            #imgtext 
            {
                margin-left:600px;
                margin-top: -200px;
                position: absolute;
            }
            a 
            {
                color: blue;
                font-size:20px;
                text-decoration: none; 
            }
            #cardimg
            {
                margin-left:83px;
                margin-top:10px; 
                border-radius: 5px;
                    
            }  
            #headerdiv
            {
                width: 100%;
                height: auto;
                background-repeat: no-repeat;
            }
            #headerimg
            {
                width: 100%;
                height: 100%;
                
            }    
            #cardh61
            {
                margin-top:25px;
            }
            #cardh2
            {
                font-size: 40px;padding-left:0px;
            }
            #cardh4
            {
                padding-left:10px;padding-top:10px;
            }

            #cardh62
            {
                padding-left:5px;
            }
            #spanmonth
            {
                padding-bottom:20px;
            }
        </style>
    </head>
    <body >
        <div id= "headerdiv">

            <img id="headerimg" src="{{$data['calendar_banner_url']}}">
                <?php $months= array("January","February","March","April","May","June","July","August","September","October","November","December");
                $key =array_search($data['month'], $months); $pid=$key-1;$nid=$key+1;?>
            <h1 id="imgtext"><a href="{{ route('root', ['id' => $pid]) }}" class="ml-1 underline"><span class="glyphicon glyphicon-menu-left btn btn-light-outline" ></span></a>&nbsp;<span id="spanmonth" >{{$data['calendar_banner_text']}}</span>&nbsp; 
            <a href="{{ route('root', ['id' => $nid]) }}" class="ml-1 underline"><span class="glyphicon glyphicon-menu-right btn btn-light-outline" ></span></a></h1>
        </div>
          
       
        @for($i=0;$i < 29; $i=$i+0)
            @if($data['month']==='February' && $i===28)
                @break
            @endif
            <div class="container-fluid">
            <div class="row  ">
                @for($j=0;$j < 4; $j++) 
                    @if(count($data['days'])<$i+1)
                        @if(count($data['days'])===30)
                            <div class="col-sm">
                            </div>
                            <div class="col-sm">
                            </div>
                        @endif      
                        @if(count($data['days'])===31)
                            <div class="col-sm">
                            </div>
                        @endif
                        @break
                    @endif
        
        
                    <div class="col-sm">
                        <?php if (isset($data['days'][$i]['card_color'])){?>
                        <div id="myide{{$i}}" style="{{$data['days'][$i]['card_color']}}"> <?php  } else { ?><div > <?php  }  ?>  
                            <h6 id="cardh61">{{strtoupper($data['days'][$i]['day_of_the_week']);}} </h6>
                            <h2  id="cardh2" >{{$data['days'][$i]['day_of_the_month']}}</h2>
                        </div>
                        
                        <?php if (isset($data['days'][$i]['card_color'])){?>
                        <div id="carddiv" style="{{$data['days'][$i]['month_week_color']}}"> <?php  } else { ?><div id="carddiv"> <?php  }  ?>
                            <h4 id="cardh4" > <b>{{$data['days'][$i]['card_header']}}</b></h4>
                            <h6 id="cardh62" >{{$data['days'][$i]['card_body']}}</h6></br>
                            <button id="cardb" >Schedule Post</button>
                            <?php if (isset($data['days'][$i]['card_image'])){?>
                            <img id ="cardimg" src="{{$data['days'][$i]['card_image']}}">
                            <?php  }?>
                            <img id ="cardimg" src="">
                        </div>
                    </div>
                    <?php $i=$i+1; ?>
                @endfor
            </div>
            </div>
        @endfor
    </body>
</html>

