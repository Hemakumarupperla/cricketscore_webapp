<!DOCTYPE html>
<html>
<head>
	<link rel="manifest" href="/manifest.json">
		<meta name= 'viewport' content = "width=device-width,initial-scale=1.0">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<style>
		.ms
		{
			border:2px solid;
			color: white;
			background-color: #008B8B;
			padding:4px 4px;
		}
		@media(max-width:500px){
			.teamscore{
				font-size:3.8vw;
				padding-left:0.5vw;
			}
		}
		@media(max-width:500px){
		.ms
		{
			border:2px solid;
			color: white;
			background-color: #368BC1;
			padding-bottom:8px;
			padding-top:8px;
			font-weight:bold;
			font-size:3.4vw;
		}
			
		}
		.st
		{
			color:green;
			font-weight:bold;
			font-size:3.8vw;
			padding-left:0.5vw;
		}
		.summary
          {
          	color: red;
		 font-size:3.7vw;
          	font-weight: bold;
		  padding-left:0.5vw;
          }
          @media(max-width:2000px)
		  {
          .but
          {
          margin-right: 5px;
          color: #008B8B;
          padding:4px 4px;
          background-color:white;
          font-weight:bold;
         
          }
		}
.navbar-brand
      {
      	font-weight:bold;
      }
		  
		
	@media(max-width:500px)
       {
          .but
          {
          margin-right: 9.3px;
          color: #008B8B;
          padding:8px 8px;
          background-color:white;
          font-weight:bold;
           font-size:3vw;
            margin-left:5px;
         
          }
		}
	</style>
	<script src = "https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<body>
	<nav class = 'navbar navbar-expand-md bg-info navbar-dark'>
		 <a class="navbar-brand" href="#">	Livebuzz</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="live.html">UPCOMING</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="completed.html">COMPLETED</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.html">CONTACT US</a>
      </li>    
    </ul>
  </div>  
</nav>
<script>
	
	function getdetails(jk,sid,mid){
            document.location.href = "scoreboard.php?sid="+sid+"&mid="+mid+"&j="+jk;
          
	}
function getscore(sid,mid){
	  return new Promise( resolve => {
    
                      fetch("https://dev132-cricket-live-scores-v1.p.rapidapi.com/scorecards.php?seriesid="+sid+"&matchid="+mid, {
	"method": "GET",
	"headers": {
		"x-rapidapi-host": "dev132-cricket-live-scores-v1.p.rapidapi.com",
		"x-rapidapi-key": "58c637e2a4mshdc73000604d617bp166404jsn6d692798bbc2"
	}
})
.then(response => {
	return(response.json());

})
.then(function(data2){
	resolve(data2);
	 
	});
});

	}

fetch("https://dev132-cricket-live-scores-v1.p.rapidapi.com/matches.php?completedlimit=20&inprogresslimit=30&upcomingLimit=30", {
	"method": "GET",
	"headers": {
		"x-rapidapi-host": "dev132-cricket-live-scores-v1.p.rapidapi.com",
		"x-rapidapi-key": "58c637e2a4mshdc73000604d617bp166404jsn6d692798bbc2"
	}
})
.then((response) =>{
 return response.json();
})
.then(async  MyJson =>{
     console.log(MyJson);
	if(MyJson.meta.completedMatchCoun ==0){
		console.log("null")
	}
     for(let i = 0;i<MyJson.matchList.matches.length;i++){
                var div = document.createElement('div');
                 let   sid = MyJson.matchList.matches[i].series.id;
                  let mid = MyJson.matchList.matches[i].id;
                div.className = 'c'+i;
                var match = document.createElement('p');
                match.className = 'ms';
                match.innerHTML = MyJson.matchList.matches[i].series.name+"             "+MyJson.matchList.matches[i].venue.name;
                 document.body.appendChild(div);
                 $('.c'+i).append(match)
                 var team1 = MyJson.matchList.matches[i].homeTeam.name;
                   var team2 = MyJson.matchList.matches[i].awayTeam.name;
                 if(MyJson.matchList.matches[i].status== 'LIVE'){
                   var status = document.createElement('p');
                   status.innerHTML = 'LIVE';
                   status.className = 'st';
                   $('.c'+i).append(status);
                         }
                         if(MyJson.matchList.matches[i].status!= 'UPCOMING'){
                   if(MyJson.matchList.matches[i].scores.homeOvers!= 0.0){
                                var score = document.createElement('p');
			         score.className = 'teamscore';
                                score.innerHTML =team1+"  "+ MyJson.matchList.matches[i].scores.homeScore+"("+ MyJson.matchList.matches[i].scores.homeOvers+")";
                                $('.c'+i).append(score);
                                  }
                   if(MyJson.matchList.matches[i].scores.awayOvers!= 0.0)
                   {var score = document.createElement('p');
		     score.className = 'teamscore';
                                score.innerHTML =team2+"  "+ MyJson.matchList.matches[i].scores.awayScore+"("+ MyJson.matchList.matches[i].scores.awayOvers+")";
                                 $('.c'+i).append(score);
                   }
                   var sum = document.createElement('p');
                   sum.innerHTML = MyJson.matchList.matches[i].matchSummaryText;
                   sum.className = 'summary';
                   $('.c'+i).append(sum);
               

              
                 getscore(sid,mid).then( data2 =>{

                console.log(data2);
                for(let  j = 0;j<data2.fullScorecard.innings.length;j++){
                  	 var button = document.createElement('button');
                  	 button.innerHTML =data2.fullScorecard.innings[j].name;
                  	 button.className  = 'ing'+i+j;
                  	 
                  	  $('.c'+i).append(button);
                  	 $('.ing'+i+j).click(function(){
                  	 	getdetails(j,MyJson.matchList.matches[i].series.id, MyJson.matchList.matches[i].id);                 	
                  	 	 });
                  	 button.className = 'but'; 

                  }
                  
                 	});
	 
				 
               	     
                 }
              
                if(MyJson.matchList.matches[i].status== 'UPCOMING'){
                 	var status = document.createElement('p');
                   status.innerHTML = 'UPCOMING';
                   status.style.color = 'red';
                   $('.c'+i).append(status);
                 }
	  
}//for loop
     
});

</script>
</body>
<script>
 if ('serviceWorker' in navigator) {
    console.log("Will the service worker register?");
    navigator.serviceWorker.register('service-worker.js')
      .then(function(reg){
        console.log("Yes, it did.");
     }).catch(function(err) {
        console.log("No it didn't. This happened:", err)
    });
 }
</script>
</html>
