<html>
<body>
	<head>
        <meta name="viewport" content = "width = device-width,initial-scale = 1.0">
<style >
    .vs
    {
        border:2px solid #008080;
        background-color:;
        padding: 2px 2px;
        background-color:#008080;
        color:white;
    }
    .stat
    {
        color:red;
        font-weight:bold;
    }
    </style>
		<script src ="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	</head>
	<body>
		<script>
			function getScore(id, callback) {
    $.getJSON("https://cricapi.com/api/cricketScore/?apikey=6aP8B4MImxSNxI6fevBmC2ZshO42&unique_id="+id, function(data1) {
        callback(data1);
    });
}
    function navigate(id) {
      document.location.href = 'new.php/?key='+id;
}
$( document ).ready(function() {
    $.getJSON("http://cricapi.com/api/matches/?apikey=6aP8B4MImxSNxI6fevBmC2ZshO42",function(data){
        var len = data.matches.length;
        var arr = [];
        for(let i=0;i<len;i++){
             var start = data.matches[i].matchStarted
            if(start == true)
            {
            var msgContainer = document.createElement('div');
             var my = data.matches[i]['team-1'] + '           VS            ' + data.matches[i]['team-2'];
               id = data.matches[i].unique_id;
              var x = data.matches[i].date;
              var pp = document.createElement('p');
              var pppp = document.createElement('p');
              msgContainer.className  = 'YurClass'+i;
               pp.innerHTML = my;
               pp.className = 'vs';
               pppp.className = 'd'
               pppp.innerHTML = x;
            

               document.body.appendChild(msgContainer);
                  $('.YurClass'+i).append(pp);
                   $('.YurClass'+i).append(pppp);
                
                      $('.YurClass'+i).click(function(){
                           navigate(data.matches[i].unique_id);


                              });
                             
                       

            /* 2nd  API*/
            getScore(id, function(data1) {
                
                var st = data1.stat;
              
                  var ppp = document.createElement('p');
                  var scr = document.createElement('p');
                  if(data1.score == undefined)
                  {
                    data1.score = "";
                  }
                  scr.innerHTML = data1.score;
                  scr.className = 'scrr';
                 ppp.innerHTML = st;
                 ppp.className = 'stat';
                   $('.YurClass'+i).append(scr);
                 $('.YurClass'+i).append(ppp);
                
            });
            
           
             
        }
    }
    console.log(arr);
    
    });
});

		</script>
	</body>
	

</html>
