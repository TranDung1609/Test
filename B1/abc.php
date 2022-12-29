<?php 
		$fileLogName = "log.txt";
		if (!file_exists($fileLogName)) {
            $fileLog = fopen($fileLogName, 'w+');
            fwrite($fileLog, '1');
        } else {
            $fileReadLog = fopen("log.txt", 'r+');
            $data = fread($fileReadLog, filesize("log.txt"));
            $data = ++$data;
            $fileNewLog = fopen("log.txt", 'w');
            fwrite($fileNewLog, $data);
            fclose($fileNewLog);
        }
   
 ?>	
