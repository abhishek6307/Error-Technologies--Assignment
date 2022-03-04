<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import CSV</title>
    <script src="jquery.min.js"></script>
</head>
<body>
    
<form  method="post" name="import" id="import" enctype="multipart/form-data">
         <label for="">Choose csv file</label>
         <input type="file" name="file" accept=".csv">
         <!-- <button type="submit" name="imports" id="imp-btn" >Import</button> -->
         <input type="submit" value="Import" name="import" id="imp-btn">
         
     </form>
     <script>

         jQuery("#import").on('submit', function(e) {
             jQuery("#imp-btn").val("Please wait ...");
             jQuery("#imp-btn").attr('disabled', true);
             jQuery.ajax({
                 url:"submit.php",
                 type:'post',
                 data:jQuery("#import").serialize(),
                 success:function(result) {
                    alert(result);
                    jQuery('#import')[0].reset();
                    jQuery("#imp-btn").val("Import");
                    jQuery("#imp-btn").attr('disabled', false);
                 }
             });
             e.preventDefault();
           
         });
     </script>
</body>
</html>

<!-- 
     <div id="loading"></div>
   <script src="main.js"></script>  -->