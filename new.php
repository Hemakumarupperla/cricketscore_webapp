
<script src ="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
 $.getJSON("https://cricapi.com/api/fantasySummary/?apikey=6aP8B4MImxSNxI6fevBmC2ZshO42&unique_id="+<?php echo $_GET['key'];?>, function(data1) {
   
  var  xx = <?php echo $_GET['ind'];?>;
console.log(data1);
   for(j=0;j<data1.data.batting[xx].scores.length;j++){ 
    if(data1.data.batting[xx].scores[j].batsman == 'Extras'){
       continue;
              }
      document.writeln(data1.data.batting[xx].scores[j].batsman+"      "+data1.data.batting[xx].scores[j].R+"    "+data1.data.batting[xx].scores[j]['dismissal-info']);
       document.writeln("<br>");
}
    });
</script>