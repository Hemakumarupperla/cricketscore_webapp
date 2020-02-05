<!DOCTYPE html>
<html>
<head>
	<meta name= 'viewport' content = "width=device-width,initial-scale=1.0">
	<style>
		.b
		{
			border:1px solid white;
			background-color:grey;
			color:white;
			font-weight: bold;
			padding:2px 3px;
			height: 30px;


		}
		
		.b1
		{
			position: relative;
			bottom:5px;
		}
	  .tab
	  {text-align:left;
	  }	
	
	  @media(max-width: 500px){
	  	  .scr{
	  
	  	display: inline;
	  	position: relative;
	  	left:90px;
	  	font-size:2.9vw;
	  }
	
	@media(max-width: 500px){
		.row,.rows,.tab,.vin
	  {
	  	padding-right: 1vw;
	  	padding-bottom: 0.5vw;
	  	border:1px;
	  	height:0.3vw;
	  	 border-collapse:separate;
	  	 border-spacing: 0 1.5vw;
	  	 text-align:left;
         font-size:3vw;
	  	 
	  }

	}
	.trow{
		margin-bottom: 0;
	}
	@media(max-width: 500px){
		.extras,.refcmt{
			font-size:2.6vw;
			font-weight: bold;
			
		}
	}
	 
	 .tab>:nth-child(odd){
 background-color: lightgrey;
 width:200px;


}

@media(max-width:500px){
.head{
	padding:4px 4px;
	color:white;
	font-weight:bold;
	font-size:2.9vw;
	margin-top: 0;
	border:1px solid white;
	background-color: #008B8B;
	width:100vw;
	height:2.8vw;
	
}
}
	</style>
	
	<title></title>
</head>
<body>

</body>
</html>
<script src = "https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
	  var inng = <?php echo $_GET['j'];?>;
              fetch("https://dev132-cricket-live-scores-v1.p.rapidapi.com/scorecards.php?seriesid="+<?php echo $_GET['sid'];?>+"&matchid="+<?php echo $_GET['mid'];?>, {
	"method": "GET",
	"headers": {
		"x-rapidapi-host": "dev132-cricket-live-scores-v1.p.rapidapi.com",
		"x-rapidapi-key": "58c637e2a4mshdc73000604d617bp166404jsn6d692798bbc2"
	}
}).then(response =>{
	return (response.json());
	
	
}).then(Myjson =>{
    var head = document.createElement('div');
	var x = document.createElement('p');
	x.innerHTML =Myjson.fullScorecard.innings[inng].run+" - "+Myjson.fullScorecard.innings[inng].wicket+'('+Myjson.fullScorecard.innings[inng].over+')';
	head.innerHTML = 'Batting';
	head.className = 'head';
	x.className = 'scr';
	document.body.appendChild(head);
	$('.head').append(x);	
 
    var table = document.createElement('table');
    table.className = 'tab';
   var tr = document.createElement('tr');
   var t1 = document.createElement('th');
   var tt1 = document.createElement('th');
   var t2 = document.createElement('th');
   var t3 = document.createElement('th');
   var t4 = document.createElement('th');
   var t5 = document.createElement('th');
   var t6 = document.createElement('th');
   var txt1 = document.createTextNode('Batsmen');
    var txt7 = document.createTextNode('');
   var txt2 = document.createTextNode('R');
   var txt3 = document.createTextNode('B');
   var txt4 = document.createTextNode('4s');
   var txt5 = document.createTextNode('6s');
   var txt6 = document.createTextNode('SR');
  
   t1.appendChild(txt1);
   tt1.appendChild(txt7);
   t2.appendChild(txt2);
   t3.appendChild(txt3);
   t4.appendChild(txt4);
   t5.appendChild(txt5);
   t6.appendChild(txt6);

    t1.className = 'rows';
       t2.className = 'rows';
        t3.className = 'rows';
          t4.className = 'rows';
       t5.className = 'rows';
        t6.className = 'rows';
        tt1.className = 'rows';

   tr.appendChild(t1);
   tr.appendChild(tt1)
      tr.appendChild(t2);
      tr.appendChild(t3);
      tr.appendChild(t4);
      tr.appendChild(t5);
      tr.appendChild(t6);
       table.appendChild(tr);
        

  for(var  j1 = 0;j1<Myjson.fullScorecard.innings[inng].batsmen.length;j1++){
  	
  	if(Myjson.fullScorecard.innings[inng].batsmen[j1].strikeRate!="-" && Myjson.fullScorecard.innings[inng].batsmen[j1].balls!=0){
     
  
      var tr = document.createElement('tr');
      tr.className = 'trow';
      var td1 = document.createElement('td');
      var td = document.createElement('td');
      var td2 = document.createElement('td');
      var td3 = document.createElement('td');
      var td4 = document.createElement('td');
      var td5 = document.createElement('td');
      var td6= document.createElement('td');

      var text1 = document.createTextNode(Myjson.fullScorecard.innings[inng].batsmen[j1].name);
      var text2 = document.createTextNode(Myjson.fullScorecard.innings[inng].batsmen[j1].runs);
      var text3 = document.createTextNode(Myjson.fullScorecard.innings[inng].batsmen[j1].balls);
      var text4 =  document.createTextNode(Myjson.fullScorecard.innings[inng].batsmen[j1].howOut);
       var text5 = document.createTextNode(Myjson.fullScorecard.innings[inng].batsmen[j1].fours);
      var text6= document.createTextNode(Myjson.fullScorecard.innings[inng].batsmen[j1].sixes);
      var text7 =  document.createTextNode(Myjson.fullScorecard.innings[inng].batsmen[j1].strikeRate);

      td1.className = 'row';
       td2.className = 'row';
        td3.className = 'row';
        td4.className = 'row';
       td5.className = 'row';
        td6.className = 'row';
        td.className = 'row';
      td1.appendChild(text1);
      td.appendChild(text4);
      td2.appendChild(text2);
      td3.appendChild(text3);
      td4.appendChild(text5);
      td5.appendChild(text6);
      td6.appendChild(text7);

      tr.appendChild(td1);
      tr.appendChild(td);
      tr.appendChild(td2);
      tr.appendChild(td3);
      tr.appendChild(td4);
      tr.appendChild(td5);
      tr.appendChild(td6);
      table.appendChild(tr);
  document.body.appendChild(table);
      }
  	
  }
  var head1 = document.createElement('p');
  head1.innerHTML = 'Bowling';
  head1.className =   'head';
  document.body.appendChild(head1);
  var arr = ['.name','.runsConceded','.maidens','.wickets','overs','noBalls','wides','economy'];
  var arr1 = ['Bowler','R','M','W','O','NB','Wd','ECO'];
  var table2 = document.createElement('table');
  table2.className = 'tab';
  var tr = document.createElement('tr');
  for(var it = 0;it<=7;it++) {
   var hd = document.createElement('th');
   var bt = document.createTextNode(arr1[it]);
   hd.appendChild(bt);
   tr.appendChild(hd);
   table2.appendChild(tr);
   hd.className = 'vin';
}
   for(var j2=0;j2<Myjson.fullScorecard.innings[inng].bowlers.length;j2++){
   	var tr = document.createElement('tr');
   	for(var v=0;v<=7;v++){

   		var td = document.createElement('td');
   		td.className = 'vin';
   		if(v==0){
   		var tabnode  = document.createTextNode(Myjson.fullScorecard.innings[inng].bowlers[j2].name);
   		   }
   		else if(v==1){var tabnode  = document.createTextNode(Myjson.fullScorecard.innings[inng].bowlers[j2].runsConceded);}
   		else if(v==2){var tabnode  = document.createTextNode(Myjson.fullScorecard.innings[inng].bowlers[j2].maidens);}
   		else if(v==3){var tabnode  = document.createTextNode(Myjson.fullScorecard.innings[inng].bowlers[j2].wickets);}
   		else if(v==4){var tabnode  = document.createTextNode(Myjson.fullScorecard.innings[inng].bowlers[j2].overs);}
   		else if(v==5){var tabnode  = document.createTextNode(Myjson.fullScorecard.innings[inng].bowlers[j2].noBalls);}
   		else if(v==6){var tabnode  = document.createTextNode(Myjson.fullScorecard.innings[inng].bowlers[j2].wides);}
   		else if(v==7){var tabnode  = document.createTextNode(Myjson.fullScorecard.innings[inng].bowlers[j2].economy);}
   		td.appendChild(tabnode);
   		tr.appendChild(td);
   		table2.appendChild(tr);
   	}

   }

   document.body.appendChild(table2);
   elm = document.createElement("hr");
   elm.className = 'hr'
   document.body.appendChild(elm);
   var ex = document.createElement('p');
   ex.className = 'extras'
   ex.innerHTML = "Extras(B:"+Myjson.fullScorecard.innings[inng].bye+","+"LB:"+Myjson.fullScorecard.innings[inng].legBye+","+"Wd:"+Myjson.fullScorecard.innings[inng].wide+","+"Nb:"+Myjson.fullScorecard.innings[inng].noBall+")";
   document.body.appendChild(ex);
   var hr2 = document.createElement('hr');
   hr2.className = 'hr';
   document.body.appendChild(hr2);
   var head2 = document.createElement('p');
  head2.innerHTML = 'commentary';
  head2.className =   'head';
  document.body.appendChild(head2);
 
});


fetch("https://dev132-cricket-live-scores-v1.p.rapidapi.com/comments.php?seriesid="+<?php echo($_GET[sid]);?>+"&matchid="+<?php echo($_GET[mid]);?>, {
	"method": "GET",
	"headers": {
		"x-rapidapi-host": "dev132-cricket-live-scores-v1.p.rapidapi.com",
		"x-rapidapi-key": "58c637e2a4mshdc73000604d617bp166404jsn6d692798bbc2"
	}
}).then(response => {
	return(response.json());
}).then(Myjson => {
	for(var ov = 0;ov<Myjson.commentary.innings[inng].overs.length;ov++){
		//console.log(Myjson.commentary.innings[inng].overs[ov].number);
		for(var bal = 0;bal<Myjson.commentary.innings[inng].overs[ov].balls.length;bal++){
			//console.log(Myjson.commentary.innings[inng].overs[ov].balls[bal].ballNumber);
			for(cmt = 0;cmt<Myjson.commentary.innings[inng].overs[ov].balls[bal].comments.length;cmt++){
				var comment = document.createElement('p');
				var overbal =  Myjson.commentary.innings[inng].overs[ov].number+"." +Myjson.commentary.innings[inng].overs[ov].balls[bal].ballNumber;
				comment.innerHTML = overbal+":"+Myjson.commentary.innings[inng].overs[ov].balls[bal].comments[cmt].text
				//console.log(Myjson.commentary.innings[inng].overs[ov].balls[bal].comments[cmt].text);
				document.body.appendChild(comment);
				comment.className = 'refcmt';
				var hrr = document.createElement('hr');
				document.body.appendChild(hrr);

			}
		}

	}
});


 </script>


