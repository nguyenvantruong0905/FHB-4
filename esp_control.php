<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="refresh" content="3">
    <title>He Thong Dieu Khien</title>
    <link rel = "stylesheet" type="text/css" href="style.css"/>
 
  
</head>
<body  align="center">
 		<br />
		<header> 
       
         <h2> <span style="color:#00F">HỆ THỐNG ĐIỀU KHIỂN THIẾT BỊ TỪ XA QUA MẠNG </span><br />
         
   	 
      </h2>
      </header>
  
   <?php
  
   $jsonString = file_get_contents("test/test.json");
   $data = json_decode($jsonString, true);
	
	  $user='abcd_ef';
	if(isset($_POST['LED1_ON']))
	{
		if($user==$_POST['LED1_ON'])
		{
		$data['led1'] = "on";		
		}
	}
 
	if(isset($_POST['LED1_OFF']))
	{
		if($user==$_POST['LED1_OFF'])
		{
		$data['led1'] = "off";
		}
	}	
   
	$newJsonString = json_encode($data);
	file_put_contents("test/test.json", $newJsonString);
 
   ?>     
   
 <form action="esp_control.php" method="post">       
	<table border="2" width=100% height="400px" align="center">
		<tr class="indam">
        	<td bgcolor="#FFCC00">TÊN THIẾT BỊ</td>
            <td bgcolor="#FFCC00">TRẠNG THÁI</td>
            <td bgcolor="#FFCC00"> ĐIỀU KHIỂN</td>
            
        </tr>
        <tr>
        	<td><h2>Thiết bị 1</h2></td>
            <td>
            	<img id="myImage1" src="pic_bulboff10.png" width="60" height="60">
            </td>
            <td> <p>
            <?php
			$user='abcd_ef';
             echo "   <button style='height:60px; width:60px;' type='submit'  name='LED1_ON' value='$user'>ON</button> ";
             echo "   <button style='height:60px; width:60px;' type='submit'  name='LED1_OFF' value='$user'>OFF</button> ";
			?>
				</p>
                </td>
        </tr>
       
 
    </table>
 </form>
 
 <?php
   $jsonString = file_get_contents("test/test.json");
	$data = json_decode($jsonString, true);
 
 if ($data['led1'] == 'on')
 {
	echo "	  <script>";
   	echo " document.getElementById('myImage1').src = 'pic_bulbon10.png' ";
   	echo "    </script> ";
 }
 
 
 ?>
