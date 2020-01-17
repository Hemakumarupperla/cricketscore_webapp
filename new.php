
<script src ="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
 $.getJSON("https://cricapi.com/api/fantasySummary/?apikey=6aP8B4MImxSNxI6fevBmC2ZshO42&unique_id="+<?php echo $_GET['key'];?>, function(data1) {
       console.log(data1);
 for(let i =0;i<data1.data.batting.length;i++){
            for(let j=0;j<data1.data.batting[i].scores.length;j++){
                      if(data1.data.batting[i].scores[j].batsman == 'Extras'){
                                      continue;
                                   }
                           document.writeln(data1.data.batting[i].scores[j].batsman,"  ",data1.data.batting[i].scores[j].R,"    ",data1.data.batting[i].scores[j]['dismissal-info']);
                           document.writeln("<br>");
}
}
    });
</script>