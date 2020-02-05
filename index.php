<!DOCTYPE html>
<html>
<head>
	<style>
		.ms
		{
			border:2px solid;
			color: white;
			background-color: #008B8B;
			padding:4px 4px;
		}
		@media(max-width:1000px){
			.teamscore{
				font-size:1.5vw;
			}
		}
		@media(max-width:1000px){
		.ms
		{
			border:2px solid;
			color: white;
			background-color: #008B8B;
			padding-bottom:8px;
			padding-top:8px;
			font-weight:bold;
			font-size:1.4vw;
		}
			
		}
		.st
		{
			color:green;
			font-weight:bold;
			font-size:1.8vw;
		}
		.summary
          {
          	color: red;
		 font-size:1.3vw;
          	font-weight: bold;
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
          @media(max-width:1000px)
	  {
		.im
		  {
			width:200px;
			height:70px;
			  border:2px solid black;
			  
		  }
		  
		}
		  
		
	@media(max-width:1000px)
       {
          .but
          {
          margin-right: 9.3px;
          color: #008B8B;
          padding:8px 8px;
          background-color:white;
          font-weight:bold;
           font-size:3.8vw;
         
          }
		}
	</style>
	<script src = "https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<body>
<script>
	var img = document.createElement('img');
	img.className = 'im';
	img.src = "logocric.png";
	document.body.appendChild(img);
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

fetch("https://dev132-cricket-live-scores-v1.p.rapidapi.com/matches.php?completedlimit=6&inprogresslimit=7&upcomingLimit=5", {
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
</html>
