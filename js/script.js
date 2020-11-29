
$(document).ready(function(){
	
	$("#bonus").blur(function(){
		var bonus = parseFloat($(this).val());
		var net_salary = parseFloat($("#net_salary").val());
		$("#net_salary").val(net_salary + bonus);
		$("changed_amount").val(net_salary + bonus);
		
	});
	$("#exchange").blur(function(){
		var exchange = parseFloat($(this).val());
		var net_salary = parseFloat($("#net_salary").val());
		$("#changed_amount").val(net_salary * exchange);
		
		
	});
	

	$("#employee_id").change(function(){
		var emp_id = $(this).val();
	  if(emp_id != 0){
		 
		  $.post("find_absent.php","employee_id=" + emp_id,function(data){
			
			$("#absent_amount").val(data);  
			  
	  });
	   $.post("find_overtime.php","employee_id=" + emp_id,function(data){
			
			$("#overtime_amount").val(data);  
			  
	  });

		$.post("find_gross_salary.php","employee_id=" + emp_id,function(data){
		
		data = data.trim();
			 
		if(data <= 5000) {
			tax = 0;
		}
		else if(data <= 12500) {
			tax = data * 2 / 100;
		}
		else if(data <= 50000) {
			tax = data * 5 / 100;
		}
		else {
			tax =  data * 10 / 100;
		}
	
	
	$("#tax").val(tax);
	
	var gross_salary = parseFloat(data);
	
				var absent = $("#absent_amount").val();
				var overtime = $("#overtime_amount").val();
				
				var net_salary = gross_salary + parseFloat(overtime) - parseFloat(absent) - tax;
				
				
				$("#net_salary").val(net_salary);
				
	 $("#changed_amount").val(net_salary);
	 
	  });
		 $.post("find_currency.php","employee_id=" + emp_id,function(data){
			 
			  if(data.trim() == "AFS"){
			     $("#salary_currency").text("دالر");  
			  }
             else{
	             $("#salary_currency").text("افغانی");
			 }			  
	  });
	  
    }
		
 });
	
	
	
	
	$("#product_id").change(function(){
		var product_id = $(this).val();
	  if(product_id != 0){
		  $.post("find_unitprice.php","id=" + product_id,function(data){
			 $("#unitprice").val(data);  
		  });
		  
	  $.post("find_available_quantity.php","id=" + product_id,function(data){
            $("#qty").text(data);
			$("#qty").show();
		  if(data == 0){
			  $("#submit_btn").attr("disabled","disabled");
		  }	
		  else{
			  $("#submit_btn").removeAttr("disabled");
		  }
	  });
	  
	  }
	  else {
		  $("#unitprice").val("");
	  }
		
	});
	
	
	$("a#print").click(function(){
	    window.print();
	});
	
	
	
	$("#unitprice").blur(function(){
		var unitprice = $("#unitprice").val();
	    var quantity  = $("#quantity").val();
		var totalprice = unitprice * quantity;
		$("#totalprice").val(totalprice); 
	});
	
	
	$("#quantity").blur(function(){
		var unitprice = $("#unitprice").val();
	    var quantity  = $("#quantity").val();
		var totalprice = unitprice * quantity;
		$("#totalprice").val(totalprice); 
	});
	
	$("a.delete").click(function(){
		var sure = window.confirm("آیا مطمئن هستید؟");
		if(!sure){
			event.preventDefault();
		}
	});
});