<? session_start();
if ($_SESSION['id_admin'])
{
?>
<?php error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); ?>
<?php require_once('Connections/koneksi.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
  $updateSQL = sprintf("UPDATE siswa SET nama_siswa=%s, kelas=%s, password=%s WHERE nis=%s",
                       GetSQLValueString($_POST['nama_siswa'], "text"),
                       GetSQLValueString($_POST['kelas'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['nis'], "text"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($updateSQL, $koneksi) or die(mysql_error());

  $updateGoTo = "tampil_dpt.php?nis=" . $row_dpt['nis'] . "";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_dpt = "-1";
if (isset($_GET['nis'])) {
  $colname_dpt = $_GET['nis'];
}
mysql_select_db($database_koneksi, $koneksi);
$query_dpt = sprintf("SELECT * FROM siswa WHERE nis = %s ORDER BY nis ASC", GetSQLValueString($colname_dpt, "text"));
$dpt = mysql_query($query_dpt, $koneksi) or die(mysql_error());
$row_dpt = mysql_fetch_assoc($dpt);
$totalRows_dpt = mysql_num_rows($dpt);
?>
<?php error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); ?>
<!DOCTYPE html>
<!-- Template by Quackit.com -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Edit DPT</title>
	<link href='images/osis.png' rel='shortcut icon'>
    <!-- Bootstrap Core CSS -->
    <link href="css_admin/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS: You can use this stylesheet to override any Bootstrap styles and/or apply your own styles -->
    <link href="css_admin/custom.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Logo and responsive toggle -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-fire"></span> PILKOSIS</a>
            </div>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li >
                        <a href="index_admin.php">Home</a>
                    </li>
                    <li>
                        <a href="tampil_dpt.php">DPT</a>
                    </li>
					<li>
                        <a href="tampil_komentar.php">Komentar</a>
                    </li>
                    <li>
                        <a href="calon_ketos.php">Input Caksis & Cawaksis</a>
                    </li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Akun <span class="caret"></span></a>
						<ul class="dropdown-menu" aria-labelledby="about-us">
							<li><a href="#">Profile Admin</a></li>
							<li><a href="logout_admin.php">Logout</a></li>
						</ul>
					</li>
                </ul>


            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

	<div class="jumbotron feature">
		<div class="container">
		
		<div id="feature-carousel" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#feature-carousel" data-slide-to="0" class="active"></li>
					<li data-target="#feature-carousel" data-slide-to="1"></li>
					<li data-target="#feature-carousel" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<a href="#">
							<img class="img-responsive" src="holder.js/1140x200?bg=9ACD32&text=Image%201" alt="">
						</a>
						<div class="carousel-caption">
							<h3>Dramatically Engage</h3>
							<p>Objectively innovate empowered manufactured products whereas parallel platforms.</p>
						</div>
					</div>
					<div class="item">
						<a href="#">
							<img class="img-responsive" src="holder.js/1140x200?bg=9ACD32&text=Image%202" alt="">
						</a>
						<div class="carousel-caption">
							<h3>Efficiently Unleash</h3>
							<p>Dramatically maintain clicks-and-mortar solutions without functional solutions.</p>
						</div>
					</div>
					<div class="item">
						<a href="#">
							<img class="img-responsive" src="holder.js/1140x200?bg=9ACD32&text=Image%203" alt="">
						</a>
						<div class="carousel-caption">
							<h3>Proactively Pontificate</h3>
							<p>Holistically pontificate installed base portals after maintainable products.</p>
						</div>
					</div>			  
				</div>
			<a class="left carousel-control" href="#feature-carousel" role="button" data-slide="prev">
			  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			  <span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#feature-carousel" role="button" data-slide="next">
			  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			  <span class="sr-only">Next</span>
			</a>
		  </div>

		</div>
	</div>

<div class="container-fluid"><center>
		<h1>Edit DPT Aplikasi Pilkosis<p>
                    <small>Periode 2017/2018</small>
                </h1></center>
		<!-- Left Column -->
		<div class="col-sm-3">

			<!-- List-Group Panel -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<h1 class="panel-title"><span class="glyphicon glyphicon-random"></span> List Admin</h1>
				</div>
				<div class="list-group">
					<a href="#" class="list-group-item">Slamet Apriyanto<span class="badge">2014/2015</span></a>
					<a href="#" class="list-group-item">Widiyanto<span class="badge">2014/2015</span></a>
					<a href="#" class="list-group-item">Hafidh Difa Al-Haq<span class="badge">2015/2016</span></a>
					<a href="#" class="list-group-item">Aditya Himawan<span class="badge">2016/2017</span></a>
					<a href="#" class="list-group-item">Misbakhul Munir<span class="badge">2016/2017</span></a>
				</div>
			</div>

			<!-- Text Panel -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<h1 class="panel-title"><span class="glyphicon glyphicon-cog"></span> Catatan</h1>
				</div>

				<div class="panel-body">
					<p>Mohon untuk Admin agar tidak boleh Memanipulasi Data Hasil Pilkosis ini *Admin 2016/2017</p>
				</div>
			</div>
		
		</div><!--/Left Column-->
  
  
		<!-- Center Column -->
		<div class="col-sm-6">
		
			<!-- Alert -->
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Warning:</strong> Selain Admin Pilkosis dilarang akses Halaman ini!!!
			</div>		
		
			<!-- Articles -->
			<div class="row">
				<article class="col-xs-12">
<div id="main">
          <!-- sidebar --> 
         	              
      <div id="content">
                <div id="contheader">
        </div>
<div class="panel panel-success">
									<div class="panel-heading">
										<h3 class="panel-title"><h3 align="center" class="style3"><font face="Helvetica" color="blue" size="12">Edit Daftar Pemilih Tetap</font></h3>
									</div>
								
                    <div class="post">
                      <div align="center" class="entry">
                  <form action="<?php echo $editFormAction; ?>" method="post" name="form2" id="form2">
        <table width="324" height="195" align="center">
          <tr valign="middle">
            <td align="right" nowrap="nowrap"><div align="left"><span class="style1">NIS</span></div></td>
            <td><?php echo $row_dpt['nis']; ?></td>
          </tr>
          <tr valign="baseline">
            <td align="right" valign="middle" nowrap="nowrap"><div align="left"><span class="style1">Nama Siswa:</span></div></td>
            <td valign="middle"><input type="text" name="nama_siswa" value="<?php echo htmlentities($row_dpt['nama_siswa'], ENT_COMPAT, ''); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" valign="middle" nowrap="nowrap"><div align="left"><span class="style1">Kelas</span></div></td>
            <td valign="middle"><label>
              <select name="kelas" title="Kelas">
           		<option value="X Akuntansi 1">X Akuntansi 1</option>
                <option value="X Akuntansi 2">X Akuntansi 2</option>
                <option value="X Akuntansi 3">X Akuntansi 3</option>
                <option value="X Akuntansi 4">X Akuntansi 4</option>
                <option value="X Adm. Perkantoran 1">X Adm. Perkantoran 1</option>
                <option value="X Adm. Perkantoran 2">X Adm. Perkantoran 2</option>
                <option value="X Adm. Perkantoran 3">X Adm. Perkantoran 3</option>
                <option value="X Tata Niaga 1">X Tata Niaga 1</option>
                <option value="X Tata Niaga 2">X Tata Niaga 2</option>
                <option value="X Tata Niaga 3">X Tata Niaga 3</option>
                <option value="X RPL 1 ">X RPL 1</option>
                <option value="X RPL 2 ">X RPL 2</option>
                <option value="X Multimedia 1">X Multimedia 1</option>
                <option value="X Multimedia 2">X Multimedia 2</option>
                <option value="XI Akuntansi 1">XI Akuntansi 1</option>
                <option value="XI Akuntansi 2">XI Akuntansi 2</option>
                <option value="XI Akuntansi 3">XI Akuntansi 3</option>
                <option value="XI Akuntansi 4">XI Akuntansi 4</option>
                <option value="XI Adm. Perkantoran 1">XI Adm. Perkantoran 1</option>
                <option value="XI Adm. Perkantoran 2">XI Adm. Perkantoran 2</option>
                <option value="XI Adm. Perkantoran 3">XI Adm. Perkantoran 3</option>
                <option value="XI Tata Niaga 1">XI Tata Niaga 1</option>
                <option value="XI Tata Niaga 2">XI Tata Niaga 2</option>
                <option value="XI Tata Niaga 2">XI Tata Niaga 2</option>
                <option value="XI RPL 1 ">XI RPL 1</option>
                <option value="XI RPL 2 ">XI RPL 2</option>
                <option value="XI Multimedia 1">XI Multimedia 1</option>
                <option value="XI Multimedia 2">XI Multimedia 2</option>
               
                <option value="XII Akuntansi 1">XII Akuntansi 1</option>
                <option value="XII Akuntansi 2">XII Akuntansi 2</option>
                <option value="XII Akuntansi 3">XII Akuntansi 3</option>
                <option value="XII Akuntansi 4">XII Akuntansi 4</option>
                <option value="XII Adm. Perkantoran 1">XII Adm. Perkantoran 1</option>
                <option value="XII Adm. Perkantoran 2">XII Adm. Perkantoran 2</option>
                <option value="XII Tata Niaga 1">XII Tata Niaga 1</option>
                <option value="XII Tata Niaga 2">XII Tata Niaga 2</option>
                <option value="XII RPL 1 ">XII RPL 1</option>
                <option value="XII RPL 2 ">XII RPL 2</option>
                <option value="XII Multimedia 1">XII Multimedia 1</option>
                <option value="XII Multimedia 2">XII Multimedia 2</option>
              </select>
               
            </label></td>
          </tr>
		  
          <tr valign="baseline">
            <td align="right" valign="middle" nowrap="nowrap"><div align="left"><span class="style1">Password</span></div></td>
            <td valign="middle"><input type="text" name="password" value="<?php echo htmlentities($row_dpt['password'], ENT_COMPAT, ''); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td height="32" align="right" valign="middle" nowrap="nowrap"><div align="left"></div></td>
            <td valign="middle"><input type="submit" value="Edit DPT" /></td>
          </tr>
        </table>
        <input type="hidden" name="MM_update" value="form2" />
        <input type="hidden" name="nis" value="<?php echo $row_dpt['nis']; ?>" />
    </form> 					
				      <p>&nbsp;</p></td>
				  
                   
                  </div>
                    </div><div class="post"></div>
                    <!-- post -->	
                </div><!-- content2 -->		
                 </div>
					
					
			
					</div>
				</article>
			</div>
			
		</div><!--/Center Column-->

</div></div></div>
 
	
	<footer>
	
        
        <div class="small-print">
        	<div class="container">
        		<p><a href="#">Terms &amp; Conditions</a> | <a href="#">Privacy Policy</a> | <a href="#">Contact</a></p>
        		<p>Copyright &copy;OSIS_TEAM 2016/2017 </p>
        	</div>
        </div>
	</footer>

	
    <!-- jQuery -->
    <script src="js_admin/jquery-1.11.3.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js_admin/bootstrap.min.js"></script>
	
	<!-- IE10 viewport bug workaround -->
	<script src="js_admin/ie10-viewport-bug-workaround.js"></script>
	
	<!-- Placeholder Images -->
	<script src="js_admin/holder.min.js"></script>
	
</body>

</html>

 <?
}else{
	?><script language="javascript">
	alert("Maaf, Anda tidak berhak mengakses halaman ini!!");
	document.location="login.php";
	</script>
	<?
}
?>