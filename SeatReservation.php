<?php
//echo "hello";
$conn = mysqli_connect('localhost','root','','busentry') or die('Unable to connect');
$db = mysqli_select_db($conn,'busentry') or die('unable to connect');
//if($conn)
//	echo "connecttion success";
if(isset($_POST['submit']))
{
	//echo "submit pressed";
	



	

	
		
		$seat1=$_POST['seatcount'];
		//echo $seat1;
		
		for($i=1;$i<=$seat1;$i++)
		{
			$name=$_POST['name1'.$i];
			$age=$_POST['age1'.$i];
			$seatno=$_POST['seatno'.$i];
			$status=1;
		
			
			$query="INSERT INTO bus(Name,Age,Seatno,Status) VALUES ('$name','$age','$seatno','$status')";
			$result=mysqli_query($conn,$query);
			//if($result)
				//echo "data inserted successfully";
		}
		
	



}
$check = mysqli_query($conn,"Select * from bus where Status=1");
$count=mysqli_num_rows($check);

$result =array();

	//echo $i;
while($row = mysqli_fetch_array($check))
	{
array_push($result,$row[2]);


/*echo '<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>';
echo '<script>';
echo '$(document).ready(function(){';
echo 'alert("hello")';
echo '}';
echo '</script>';*/
}
$seatno= json_encode($result);
//echo $seatno;

//echo $display;
//$disable = $display ?'':'disabled="disabled"';



mysqli_close($conn);



?>
<html>
<head>
<title>Insert title here</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
	//var count = (<?php echo json_encode($count); ?>);
	var selected_seats = <?php echo $seatno; ?>;
	alert(selected_seats.length);
	for(var i=0; i<selected_seats.length;i++)
	{
		$('input[value='+selected_seats[i]+']').addClass('selected');
		
	}
	$('.selected').each(function(){
		$(this).prop('checked',true);
		$(this).attr('disabled',true);
		

	});
	//alert(<?php echo json_encode($seatno); ?>);
	$('#details input').change(function(){
		
		
		if(this.checked){
			var namecount = document.getElementById('namecount').value;
		var agecount = document.getElementById('agecount').value;
		var seatcount= document.getElementById('seatcount').value;
		//var gendercount= document.getElementById('gendercount').value;
		namecount++;
		seatcount++;
		agecount++;
		//gendercount++;
		//alert(namecount);
		//alert(seatcount);
		//alert(agecount);
			//var li = $('<li></li>');
			
			var s =$(this).val();
			//var addDiv = '<div class="add_details">Name : <input type="text" name="name1'+namecount+'" value="Name">	Age : <input type="text" name="age_field'+agecount+'" value="Age"> Seat no: <input type="text" name="seatno'+seatcount+'" disabled value = '+s+'></div>';
						$('#details').append('</br><div id="add'+s+'">Name : <input type="text" name="name1'+namecount+'" Placeholder="Name">	Age : <input type="text" name="age1'+agecount+'" Placeholder="Age">  Seat no: <input type="text" readonly="readonly" name="seatno'+seatcount+'" value = '+s+' ></div>');
		document.getElementById('namecount').value=namecount;
		document.getElementById('agecount').value=agecount;
		document.getElementById('seatcount').value=seatcount;
		}
		
		//$('.seats').click(function(){
    //$('#inputs input:checked').parents('form').remove();
	//$('.add_details').parent('#details').
//});
		else
		{
			var s =$(this).val();
			
			//$('#details #div1:last).remove();
			$('#details').find('#add'+s+'').remove();
			// $('#details .add_details:val()').remove();
		
			
			
			
		}
		
		
	});
	
});
</script>

</head>
<body>
<div>
<form id="details" method="post">

<input type="hidden" value="0" id="namecount" name="namecount"/>
<input type="hidden" value="0" id="agecount" name="agecount"/>
<input type="hidden" value="0" id="seatcount" name="seatcount"/>

<input type="checkbox" class="seats" value="1"/>
<input type="checkbox" class="seats" value="2"/>
<input type="checkbox" class="seats" value="3"/>
<input type="checkbox" class="seats" value="4"/>
<input type="checkbox" class="seats" value="5"/>
<input type="checkbox" class="seats" value="6"/>
<input type="checkbox" class="seats" value="7"/>
<input type="checkbox" class="seats" value="8"/>
</br>
<input type="checkbox" class="seats" value="9"/>
<input type="checkbox" class="seats" value="10"/>
<input type="checkbox" class="seats" value="11"/>
<input type="checkbox" class="seats" value="12"/>
<input type="checkbox" class="seats" value="13"/>
<input type="checkbox" class="seats" value="14"/>
<input type="checkbox" class="seats" value="15"/>
<input type="checkbox" class="seats" value="16"/>
</br>
<input type="checkbox" class="seats" value="17"/>
</br>
<input type="checkbox" class="seats" value="18"/>
<input type="checkbox" class="seats" value="19"/>
<input type="checkbox" class="seats" value="20"/>
<input type="checkbox" class="seats" value="21"/>
<input type="checkbox" class="seats" value="22"/>
<input type="checkbox" class="seats" value="23"/>
<input type="checkbox" class="seats" value="24"/>
<input type="checkbox" class="seats" value="25"/>
</br>
<input type="checkbox" class="seats" value="26"/>
<input type="checkbox" class="seats" value="27"/>
<input type="checkbox" class="seats" value="28"/>
<input type="checkbox" class="seats" value="29"/>
<input type="checkbox" class="seats" value="30"/>
<input type="checkbox" class="seats" value="31"/>
<input type="checkbox" class="seats" value="32"/>
<input type="checkbox" class="seats" value="33"/>
&nbsp;
<img src="steering1.png" alt="driver"  style="width:15px; height:15px;">
</br>


<input type="submit" value="submit" id="submit" name="submit"/>



</form>
</div>
</body>
</html>
