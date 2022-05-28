function reply_click(clicked_id)
	{
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var result = Number(this.responseText);
			DisplayItem();
			
			if(result==1){
				alert("Item Already Added");
				 
			}
			if(result == 5){
				alert("Item not available in stock");
			}
		}
	}
	xmlhttp.open("GET", "query.php?ItemId="+clicked_id, true);
	xmlhttp.send();
	// xmlhttp.send("ItemId="+clicked_id+"@ItemIds");
}



function DisplayItem(){
	let tbody = document.getElementById('DisplayData');
	// let Gtotal = document.getElementById('Gtotal');
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if(this.responseText =='0'){
			}
			else{
				tbody.innerHTML=this.responseText;
				subTotal();			
								
			}
		}
	}
	xmlhttp.open("GET", "query.php?DataShow", true);
	xmlhttp.send();
}
function show_item(clicked_id){
	let m_body = document.getElementById('mbody');
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
				//alert(this.responseText);
				m_body.innerHTML=this.responseText;	
				$("#exampleModal").modal("show");
				
		}
	}

	xmlhttp.open("GET", "query.php?showinfo="+clicked_id, true);
	xmlhttp.send();
}



function remove_item(clicked_id)
	{
		var r = confirm("Want to remove this?");
			if(r == true){
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
				DisplayItem();
				}
			}
				xmlhttp.open("GET", "query.php?RemoveItem="+clicked_id, true);
				xmlhttp.send();
	}
					// xmlhttp.send("ItemId="+clicked_id+"@ItemIds");
}

function changeQty(clicked_id,itemvalue)
	{
		
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
				DisplayItem();
				}
			}
				xmlhttp.open("GET", "query.php?UpItem="+clicked_id+"&itemvalue="+itemvalue, true);
				xmlhttp.send();
	
					// xmlhttp.send("ItemId="+clicked_id+"@ItemIds");
}


let clearbtn = document.getElementById('ClearCard');
clearbtn.addEventListener('click',Clearfunction);
function Clearfunction(){
	swal({
		title: "Are you sure?",
		text: "Once deleted, you will not be able to recover this imaginary list!",
		icon: "warning",
		buttons: true,
		dangerMode: true,
		})
	.then((willDelete) => {
		if (willDelete) {
			var xhr = new XMLHttpRequest();
			xhr.onload = function() {
			document.location = 'pos_invoice.php';
			}
			xhr.open('GET', 'query.php?ClearCard', true);
			xhr.send();
  		} 
	});
}

function myFunction() {
	var input, filter, table, tr, td, i, txtValue;
	input = document.getElementById("myInput");
	filter = input.value.toUpperCase();
	table = document.getElementById("myTable");
	tr = table.getElementsByTagName("tr");
	for (i = 0; i < tr.length; i++) {
	  td = tr[i].getElementsByTagName("td")[1];
	  if (td) {
		txtValue = td.textContent || td.innerText;
		if (txtValue.toUpperCase().indexOf(filter) > -1) {
		  tr[i].style.display = "";
		} else {
		  tr[i].style.display = "none";
		}
	  }       
	}
  }
  function myCompany() {
	var input, filter, table, tr, td, i, txtValue;
	input = document.getElementById("company");
	filter = input.value.toUpperCase();
	table = document.getElementById("myTable");
	tr = table.getElementsByTagName("tr");
	for (i = 0; i < tr.length; i++) {
	  td = tr[i].getElementsByTagName("td")[2];
	  if (td) {
		txtValue = td.textContent || td.innerText;
		if (txtValue.toUpperCase().indexOf(filter) > -1) {
		  tr[i].style.display = "";
		} else {
		  tr[i].style.display = "none";
		}
	  }       
	}
  }
function OrderConfirm(){
	var customerid, totaldiscount, vat, grandtotal, due,paidamount;
	//customerid = document.getElementById('')
	customerid = 1;
	totaldiscount = Number(document.getElementById('totaldiscount').value);
	grandtotal = Number(document.getElementById('Total').value);
	due = Number(document.getElementById('duelbl').innerHTML);
	vat = Number(document.getElementById('vat').value);
	paidamount = Number(document.getElementById('paidamount').value);
	
	if(grandtotal>0){
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
				swal({
					title: "Success",
					text: "Want to print this",
					icon: "success",
					buttons: true,
					
					})
				.then((willDelete) => {
					if (willDelete) {
						document.location = 'msg.php';
					  }
					  else
					  {
						document.location = 'pos_invoice.php';
					  }
				});
			}
		}
		xmlhttp.open("GET", "query.php?customerid="+customerid+"&totaldiscount="+totaldiscount+"&grandtotal="+grandtotal+"&due="+due+"&vat="+vat+"&paidamount="+paidamount+"&ordersubmit", true); 
		xmlhttp.send();
	}
	else{
		swal({
			title: "Nothing to submit!",
			icon: "warning",
			// buttons: true,
			dangerMode: true,
			})
	}
}

function edit_unit(clicked_id){
	let m_body = document.getElementById('mbody3');
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
				//alert(this.responseText);
				m_body.innerHTML=this.responseText;	
				$("#exampleModal3").modal("show");
				
		}
	}

	xmlhttp.open("GET", "query.php?edit_unit="+clicked_id, true);
	xmlhttp.send();
}

