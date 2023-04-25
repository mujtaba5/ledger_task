
<?php
$this->load->view('layouts/header'); ?>
	
<style>
	.container-form{
		margin-left: 10%;
		margin-right: 10%;
		border: solid 1px lightgray;
		margin-top: 2%;
	}

	.control_2{
		padding: 0.2rem 0.75rem !important;
	}

	.heading-margin{
		margin:1%;
	}

	.navbar {
    padding: 15px 10px;
    background: #fff;
    border: none;
    border-radius: 0;
    margin-bottom: 40px;
    -webkit-box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
    box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
}

.navbar-btn {
    -webkit-box-shadow: none;
    box-shadow: none;
    outline: none !important;
    border: none;
}

#item-list_wrapper{
	padding:15px !important;
}
	

.navbar{
	background: #39388F !important;
}
.navbar-brand{
	color:white !important;
	margin-left:45% !important;
}
.navbar-brand>h3{
	margin-block-start: auto;
}
.container-fluid>.navbar-header, .container>.navbar-collapse, .container>.navbar-header {
	width:100%;
}

#container>h2{
	margin-left:1.5%;
}

footer{
	background: #39388F !important;
	color:white !important;
	padding: 2%;
	margin-top:5%;
}
.text-white{
	color:white !important;
	
}

.btn-right{
	float:right;
	margin-right:1.5%;
}

div.dt-buttons {
   
    margin-bottom: 0.7%;
    margin-left: 0.75%;
}

button.dt-button, div.dt-button, a.dt-button, input.dt-button {
    border-radius: 2px;
    color: white;
    background-color: #5bc0de !important;
    background-image:none !important;
}

button.dt-button:hover:not(.disabled), div.dt-button:hover:not(.disabled), a.dt-button:hover:not(.disabled), input.dt-button:hover:not(.disabled) {
    border: 1px solid #666;
    background-color: black !important;
}
</style>




<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
	   <div  class="navbar-brand d-flex justify-content-center"><h3>Internal Ledger</h3> </div>
    </div>
   
  </div>
</nav>

<div id="container" class="container-form">
 <!-- mpadding-15  -->
<h2>My Ledgers List
<button class="btn btn-danger btn-sm rounded-0 btn-right" type="button" data-toggle="tooltip" 
data-placement="top" onclick="" title="Add">
	 <i class="fa fa-plus"></i> Add Ledger
</button>
						
</h2>
	<table id="item-list" class="table table-bordered table-striped table-hover">
		<thead>
			<tr>
				<th>Sr #</th>
				<th>Description</th>
				<th>DateTime</th>
				<th>Amount</th>
				
			</tr>
		</thead>
		<tbody>
		</tbody>
		<tfoot>
      <tr>
	   <th colspan="3">Ledger total amount</th>
	   <th id="total_order"></th>
      </tr>
     </tfoot>
	</table>
</div>

<footer>
<!-- Copyright -->
<div class="text-center p-3">
    © 2023 Copyright:
    <a class="text-white" href="#">Company_ledger.com</a>
  </div>
  <!-- Copyright -->
</footer>
</body>

<script>
$(document).ready(function(){
	$('.footer-section').hide();
	// $('.announcment_bar').hide();

    $('#item-list').DataTable({
        // Processing indicator
        "processing": true,
        // DataTables server-side processing mode
        "serverSide": true,
        // Initial no order.
        "order": [],
        // Load data from an Ajax source
        "ajax": {
            "url": "<?php echo base_url('get-Ledger-list-datatable/'); ?>",
            "type": "POST"
        },
		drawCallback:function(settings)
		{
		$('#total_order').html(settings.json.total);
		},
		dom: 'lBfrtip',
		buttons: [
			{ extend: 'csv', text:'<i class="fa fa-download"></i> Export CSV',
				className: 'btn btn-primary' },
			{ extend: 'excel', className: 'btn btn-primary ',
				text:'<i class="fa fa-list"></i> Export Excelsheet',
			},
  
		],
		"lengthMenu": [ [10, 25, 50], [10, 25, 50, "All"] ],
        //Set column definition initialisation properties
        "columnDefs": [{ 
            "targets": [0],
            "orderable": false
        }]
    });

});

	

	



</script>	

</html>