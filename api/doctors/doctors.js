//<script type="text/javascript" src="doctors.json"></script>
//<script type="text/javascript" src="doctors.js"></script>
function load(){

	var mydata = JSON.parse(records);
	alert(mydata[0].POSITION);
	alert(mydata[0].NAME);
	alert(mydata[0].SURNAME);
	alert(mydata[0].MIDDLENAME);
	alert(mydata[0].ROOMNUM);
	alert(mydata[0].SALARY);
	alert(mydata[1].POSITION);
	alert(mydata[1].NAME);
	alert(mydata[1].SURNAME);
	alert(mydata[1].MIDDLENAME);
	alert(mydata[1].ROOMNUM);
	alert(mydata[1].SALARY);
}