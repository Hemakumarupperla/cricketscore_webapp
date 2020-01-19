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
    {    clear:left;
        color:red;
        font-weight:bold;
    }
    .fi
    { position: relative;
      top:70%;
      border:2px solid grey;
      padding:2px 2px;
      display:inline;
    margin-right: 8px;
    }
    .si
    {  
      border:2px solid grey;
      padding:2px 2px;
      display:inline;
      
     
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
function getdetails(id, callback) {
    $.getJSON("https://cricapi.com/api/fantasySummary/?apikey=6aP8B4MImxSNxI6fevBmC2ZshO42&unique_id="+id, function(data2) {
        callback(data2);
    });
}
function navigate(id,index){
  document.location.href = "new.php?key="+id+"&ind="+index;
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
                   getScore(id,function(data1){
                 var scr = document.createElement('p');
                 if(data1.score == undefined)
                  {
                    data1.score = "";
                  }
                  scr.innerHTML = data1.score;
                  scr.className = 'scrr';
                   $('.YurClass'+i).append(scr);
               })
            
            /* 2nd  API*/
            getdetails(id,function(data2){
              console.log(data2);
              if(data2.data.batting.length == 1)
              {  if(data2.data.batting[0].title!=""){
                var finng =  document.createElement('button');
                     finng.className = 'fi'+i;
                finng.innerHTML = data2.data.batting[0].title;
                  $('.YurClass'+i).append(finng);
                
                }

                  
              }
              else
              { if(data2.data.batting[0].title!=""){
                var finng =  document.createElement('button');
                finng.className = 'fi'+i;
                finng.innerHTML = data2.data.batting[0].title;
                
                               }
                
                 if(data2.data.batting[0].title!=""){
                 var sinng =  document.createElement('button');
                 sinng.className = 'si'+i;
                  sinng.style.margin = '3px','3px';
                 sinng.innerHTML = data2.data.batting[1].title;
                  $('.YurClass'+i).append(finng);
                  $('.YurClass'+i).append(sinng);
                  }

                }
                $('.fi'+i).click(function(){
                  index = 0;
                  navigate(data.matches[i].unique_id,index);
                });
                      
               $('.si'+i).click(function(){
                index = 1;
                  navigate(data.matches[i].unique_id,index);
                });
               
              
            });
            getScore(id, function(data1) {
                
                var st = data1.stat;
              
                  var ppp = document.createElement('p');
                  if(data1.stat == undefined)
                  {
                    st = "";
                  }
                 ppp.innerHTML = st;
                 ppp.className = 'stat';
                 $('.YurClass'+i).append(ppp);
                
            });

             
        }
    }
    
    
    });
});

		</script>
	</body>
	

</html>
