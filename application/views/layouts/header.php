<!doctype html>
  <html lang="en">

  <head>
    <title>Internal Ledger</title>
    <link rel="shortcut icon" type="<?=base_url();?>image/png" href="<?=base_url();?>images/favicon.png" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
	  
    <!-- <link rel="stylesheet"type="text/css"href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
    <script type="text/javascript"src="http://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script> -->
    <script type="text/javascript"src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>
  <script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>
 
  </head>
  <style>
    .parentDiv {
      position: absolute;
      width: 100%;
      background-color: black;
      color: white;
    }

    .nav {
      text-align: center;
    }
  </style>

  <style>
    .legend {
      background-color: #fff;
      border-radius: 3px;
      bottom: 30px;
      box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
      font: 12px/20px 'Helvetica Neue', Arial, Helvetica, sans-serif;
      padding: 10px;
      position: absolute;
      right: 10px;
      z-index: 1;
    }

    .legend h4 {
      margin: 0 0 10px;
    }

    .legend div span {
      border-radius: 50%;
      display: inline-block;
      height: 10px;
      margin-right: 5px;
      width: 10px;
    }

    .top-2{
      margin-top: 2%;
      color:black;
    }

    .ctrl-span{
      border:solid 1px black;padding: 5px;border-radius:6px;vertical-align: text-bottom;
    }

    .v-top{
      vertical-align: top;
    }
   
  </style>

  <body>

  
    

    <!-- // body content here -->