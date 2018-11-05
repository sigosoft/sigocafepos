<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Sigo cafepos</title>
    <link rel="icon" href="favicon.ico" type="image/icon">
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap core CSS     -->

  <link href="assets/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="assets/css/buttons.dataTables.min.css" rel="stylesheet">
 


    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="assets/css/paper-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />

 
    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/themify-icons.css" rel="stylesheet">

</head>
<body>


<?php include "sidebar.php";
$counter =1;
require_once("../android_connection.php");
 //$result     = mysqli_query($conn,"SELECT * from category");
 if(isset($_POST['submit']))
{




$CategoryName=$_POST['name'];
$Categoryid=$_POST['cate'];

   
     $query="INSERT INTO sub_category(subcategory_name,	category_id) VALUES ('$CategoryName','$Categoryid')";
       



     if (mysqli_query($conn, $query))
     {

       echo "<script> alert('subCategory Added Successfully');window.location.href = 'viewsubcat.php';</script>";

     } 
 
     else 
     {
  
       echo "<script> alert('Error Please Try Again');window.location.href = 'viewsubcat.php';</script>";
     }


    
   
   
}
?>

<h4>&nbsp;&nbsp;&nbsp;Click and edit on specific fields, it will be automaticallly saved</h4>
       <form  class="form-horizontal" method="post" action="">
                                <div class="form-group"><label class="col-sm-2 control-label">Name</label>

                                    <div class="col-sm-10"><input type="text" name="name" class="form-control"></div>
                                </div>
                               
                               <div class="form-group"><label class="col-sm-2 control-label">Category</label>

                                    <div class="col-sm-10">
                                        
                                        <select name="cate" class="form-control">
                                            <?php
                                            $result     = mysqli_query($conn,"SELECT * from category");
                                            while ($row = mysqli_fetch_array($result)){
                                            ?>
                                            <option value="<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></option>
                                           <?php } ?>
                                        </select>
                                        
                                        </div>
                                </div>

                                
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-primary pull-right" type="submit" name="submit">Add</button>
                                    </div>
                                </div>
                            </form>

        <footer class="footer">
            <div class="container-fluid">
               
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> Powered by <i class="fa fa-heart heart"></i> <a href="http://www.sigosoft.com">Sigosoft</a>
                </div>
            </div>
        </footer>

    </div>
</div>


</body>

 <script>
     function saveInlineEdit(editableObj,column,id) {
// no change change made then return false
if($(editableObj).attr('data-old_value') === editableObj.innerHTML)
return false;
// send ajax to update value
$(editableObj).css("background","#FFF url(loader.gif) no-repeat right");
$.ajax({
url: "ajax.php",
type: "POST",
dataType: "json",
data:'column='+column+'&value='+editableObj.innerHTML+'&id='+id,
success: function(response) {
// set updated value as old value
$(editableObj).attr('data-old_value',editableObj.innerHTML);
$(editableObj).css("background","#FDFDFD");
},
error: function () {
console.log("errr");
}
});
}
 </script>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="assets/js/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

<script src="assets/js/jquery-1.12.4.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/buttons/1.4.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.print.min.js"></script> 
    <script>
    $(document).ready(function() {
    $('#tb').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
    } );
    </script>


</html>
