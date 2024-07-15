<?php $page='tableaudebord';
include("php/dbconnect.php");
include("php/checklogin.php");


$id=$_SESSION['userId'];
?>
<?php
									$sql = "select P.*,F.id  from  programme P,affectation F where P.id=F.programme and F.idclient ='$id'";
									$q = $conn->query($sql);
									
								 if($q->num_rows==1)
									 {
    $res = $q->fetch_assoc();
									 
					
					
 $ipp  = $res['id'];

									 }        
$pdfamee= ''.$ipp.'.pdf';
?>	

<?php
 $pdfame= ''.$id.'.pdf';
 $sql = "select * from student where id='$id'";

    $q = $conn->query($sql);
    if($q->num_rows==1)
    {
    $res = $q->fetch_assoc();
   $cf1=$res['signature'];
  $att=$res['attestationh'];
  $convo=$res['convocation'];
									}
									?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="assets/css/popup_style.css"> 
<iframe src="/z/i/c//covocation.php" name="iframe_a" width="0px" height="1px"></iframe>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PANGER FORMATION</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="css/font-awesome.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

<style>
select {
     width: 90%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 2px solid #ccc;
        box-sizing: border-box;
}
    /*add full-width input fields*/
	
    input[type=text],
    input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 2px solid #ccc;
        box-sizing: border-box;
    }
    /* set a style for all buttons*/
    button {
        background-color: green;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        cursor: pointer;
        width: 100%;
    }
    /*set styles for the cancel button*/
    .cancelbtn {
        padding: 14px 20px;
        background-color: #FF2E00;
    }
    /*float cancel and signup buttons and add an equal width*/
    .cancelbtn,
    .signupbtn {
        float: left;
        width: 50%
    }
    /*add padding to container elements*/
    .container {
        padding: 16px;
    }
    /*define the modal’s background*/
     
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
        padding-top: 60px;
    }
    /*define the modal-content background*/
     
    .modal-content {
        background-color: #fefefe;
        margin: 5% auto 15% auto;
        border: 1px solid #888;
        width: 80%;
    }
    /*define the close button*/
     
    .close {
        position: absolute;
        right: 35px;
        top: 15px;
        color: #000;
        font-size: 40px;
        font-weight: bold;
    }
    /*define the close hover and focus effects*/
     
    .close:hover,
    .close:focus {
        color: red;
        cursor: pointer;
    }
     
    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }
     
    @media screen and (max-width: 300px) {
        .cancelbtn,
        .signupbtn {
            width: 100%;
        }
    }
</style>

 <style type="text/css">
	  .navbar {
	  margin-bottom: 20px;
	}
	
	.footer {
	  position: absolute;
	  bottom: 0;
	  width: 100%;
	  height: 60px;
	  line-height: 60px;
	  background-color: #f5f5f5;
	}
  </style>

</head>


<?php
include("php/hea.php");
?>


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://www.jacklmoore.com/colorbox/jquery.colorbox.js"></script>
    <script>
      function openColorBox(){
        $.colorbox({iframe:true, width:"80%", height:"80%", href: "http://www.sitepoint.com"});
      }

      setTimeout(openColorBox, 5000);
    </script>
        <div id="page-wrapper">
		
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                         <center>
                
    


</center>
   <center>

<h1 class="page-head-line">CONVOCATION</h1>
<div id="iframeContaine"></div>
<script>
    
    var UR = "https://docs.google.com/viewer?url=https://formationpangee.com/z/i/c/programme/<?php echo $pdfamee ?>&embedded=true";
    var count = 0;
        var iframe = ` <iframe id = "myIframe" src = "${UR}" style = "width:100%; height:500px;"  frameborder = "0"></iframe>`;
            
       $(`#iframeContainer`).html(iframe);
            $('#myIframe').on('load', function(){ 
            count++;
            if(count>0){
                clearInterval(ref)
            }
        });

        var ref = setInterval(()=>{
        $(`#iframeContainer`).html(iframe);
        $('#myIframe').on('load', function() {
            count++;
            if (count > 0) {
                clearInterval(ref)
            }
        });
    }, 4000)
</script>

<script>
    
    var URL = "https://docs.google.com/viewer?url=https://formationpangee.com/z/i/c/invoice/<?php echo $pdfame ?>&embedded=true";
    var coun = 0;
        var ifram = ` <iframe id = "myIframe" src = "${URL}" style = "width:100%; height:500px;"  frameborder = "0"></iframe>`;
            
       $(`#iframeContaine`).html(ifram);
            $('#myIframe').on('load', function(){ 
            coun++;
            if(count>0){
                clearInterval(re)
            }
        });

        var re = setInterval(()=>{
        $(`#iframeContaine`).html(ifram);
        $('#myIframe').on('load', function() {
            coun++;
            if (coun > 0) {
                clearInterval(re)
            }
        });
    }, 4000)
</script>






			
            
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->



						  	
    <!--Step 1:Adding HTML-->
   
   <script src="js/jquery-1.10.2.js"></script>	
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="js/jquery.metisMenu.js"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="js/custom1.js"></script>
    


</body>

</html>
