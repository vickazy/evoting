<? session_start();
if ($_SESSION['nis'])
{
?>
<?php error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Contact Us</title>
	<link href='images/osis.png' rel='shortcut icon'>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">APLIKASI PILKOSIS</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
               <li><a href="index_siswa.php" ><font face="Edo" color="#bcc00">Home</font></a></li>
			    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="images/user.png" height="20" width="20"><font face="Edo" color="red"></i>Account</font><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                           <a href="#" onclick="alert('Maaf Anda Belum Melakukan Pemilihan')"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                       
                        <li class="divider"></li>
                        <li>
                           <a href="#" onclick="alert('Maaf Anda Belum Melakukan Pemilihan')"><i class="fa fa-fw fa-power-off"></i><font color="red"> Log Out</font></a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
           <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
				
                    <li class="ts-label"><b><font color="00ff00" size="3">PILIHAN</font></b></li>
				<li class="open"><a href="index_siswa.php"><img src="images/house.png" height="25" width="25"> <font color="00ffff">HOME</font></a></li>
				<li><a href="tutorial.php"><img src="images/tutorial.png" height="25" width="25"> <font color="00ffff">Tutorial Pemilihan</font></a>
				
				</li>
				<li><a href="about.php"><img src="images/aboutus.png" height="25" width="30"> <font color="00ffff"> Tentang Aplikasi Ini</font></a></li>
				<li><a href="help.php"><img src="images/contact_png.png" height="25" width="30">  <font color="00ffff">Contact Us</font></a></li><br><br><br><br><br><br>
				
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
				
                    
            <!-- /.container-fluid -->

        <img src="images/banner.png" width="100%" height="250px"><br>
					<div id="contheader">
                  <h3 align="center" class="style3"><b>Administrator</b></h3>
        </div><br><br>
<div id="content">
<div id="content2">						
<center><td><font align="center" face="Cyberfall" size="5" color="blue">Untuk Bantuan Silahkan Hubungi</font><center><td><font align="center" face="Cyberfall" size="5" color="red"> Admin</font><font align="center" face="Cyberfall" size="5" color="blue"> dibawah Ini:</font></center>
<td><img src="images/telp.png"><font face="Airstrike" size="6" color="black">Bisa Telfon, SMS.. </font><img src="images/sms.png"><br>
<br><div class="panel panel-default">
									
									
									<table class="table table-hover" width="100%">
									
											
											<tbody align="center">
												<tr>
													
													
													<td><font align="center" face="Archive" size="5" color="grey">083863873299</td>
													
												</tr>
												<tr>
													
													
													<td><font align="center" face="Archive" size="5" color="grey">083863461689</td>
													
												</tr>
												<tr>
													
													
													<td><font align="center" face="Archive" size="5" color="grey">087737640138</td>
													
												</tr>
											</tbody>
										</table></div>
								</div>
								</div>
								<div class="clearing"></div> <br><br><br>
           <div id="footer" align="center">
                <p><font face="Cyberfall" size="4" color="black">Copyright &copy; 2015, designed by <a href="#">osis_team</a></font></p>
            </div>
        </div><!-- main -->
		
    </div><!-- page -->
	<script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
</body>
</html>

        <?
}else{
	?><script language="javascript">
	alert("Maaf, Anda tidak berhak mengakses halaman ini!!");
	document.location="index.php";
	</script>
	<?
}
?>
