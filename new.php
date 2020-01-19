
<script src ="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
 $.getJSON("https://cricapi.com/api/fantasySummary/?apikey=6aP8B4MImxSNxI6fevBmC2ZshO42&unique_id="+<?php echo $_GET['key'];?>, function(data1) {
   
  var  xx = <?php echo $_GET['ind'];?>;
   document.writeln(xx);
    });
</script>