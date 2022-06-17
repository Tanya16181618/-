<?php
$file = file("count.txt");
$count = implode("", $file);
$count++;
$myfile = fopen("count.txt","w");
fputs($myfile,$count);
fclose($myfile);
?>
  	<hr>
      	<footer>

        	<div class="text-muted text-center"style="color: #f5f5dc;">
                Developed by Brezgina T.  <br> 2022<br>Views - <?=$count?>
        	</div>
      	</footer>
    </div> <!-- /container -->
  </body>
</html>

