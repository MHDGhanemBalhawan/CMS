<?php session_start();
	include 'includes/db.php';
	$login_err = '';
	if(isset($_GET['login_error'])){
		if($_GET['login_error'] == 'empty'){
			$login_err = '<div class="alert alert-danger">User Name or Password was empty!</div>';
		}elseif($_GET['login_error'] == 'wrong'){
			$login_err = '<div class="alert alert-danger">User Name or Password was Wrong!</div>';
		}elseif($_GET['login_error'] == 'query_error'){
			$login_err = '<div class="alert alert-danger">There is a Database Issue!</div>';
		}
	}
	/* $per_page = 5;
	if(isset($_GET['page'])){
		$page = $_GET['page'];
	} else {
		$page = 1;
	}
	$start_from = ($page-1) * $per_page; */
	
	
	// new pagination
	
	
$tableName="tbl_post";
$targetpage = "index.php";
$limit = 2;

$query = "SELECT * FROM $tableName WHERE pos_status = 'published'";
$pre_query = mysqli_query($conn,$query);
//$total_pages = mysqli_fetch_array($pre_query);
//$total_pages = $total_pages[num];
$count = mysqli_num_rows($pre_query);
$total_pages = ceil($count/$limit);

$stages = 3;

if(isset($_GET['page'])){
		$page = $_GET['page'];
	} else {
		$page = 1;
	}
//$page = mysqli_escape_string($conn,$_GET['page']);

if($page){
$start = ($page - 1) * $limit;
}else{
$start = 0;
}


	
?>
<!DOCTYPE html>
<HTML lang="en">

<html>
	<head>
<TITLE>Home</TITLE>
<LINK REV="made" href="mailto:mghanemb@gmail.com">
<META NAME="keywords" CONTENT="web, design, development, company, local, internet, www, world, wide, cyber, online, website, motion, flash, html, javascript, site, webpage, homepage, marketing, database, mysql, sql, access, microsoft, site, search, engine, marketing, submission, submit, graphic, design, webmaster, images, artistic, classy, layout, Website, Web Design, website development, web development, Internet, Website Designers, Internet Solutions, site submission, interactive, dynamic, top, IT, internet marketing, advertising, Database Integration, MySQL, strategy, strategies, Database, Flash, HTML, DHTML, Motion Design, JavaScript, Multimedia, Presentation, website promotion, web promotion, website marketing, web marketing, web hosting, efficient results, internet business, small business, quality design, e-commerce, e-commerce company, search engine submission, search engine ranking, graphic design, industry leader, site maintenance, cheap, reasonable, inexpensive, affordable, web page makers, computer consulting, Internet consulting, web consulting, real estate, realtor, realty, scan, online, images, rebuild, redesign, professional, Web Designs, design, web, web design, web designs, database, databases, databases designs, Databases Designs, advertising, Advertising, Printing, networks, computer, computers, london, uk, web design london, web design, Web Designs, Databases Designs, Advertising, London , UK , web design London, database design London UK, html UK, web designs, web design uk, advertising, computer, computer uk, computers, computers UK, network, networks, networks uk, programs, programs design uk, flash design uk, databases, databases design UK, Access, access design UK, php UK, php, mysql, London, UK, Mhd. Ghanem Balhawan, Ghanem, ghanem balhawan design.">
<META NAME="description" CONTENT="Modeled Ideas is a UK-based Internet Consulting and web development company offering services such as Website Design, Web Development, Databases and Flash multimedia.">
<META NAME="author" CONTENT="Mhd. Ghanem Balhawan">
<META NAME="ROBOTS" CONTENT="NOINDEX,FOLLOW">
	<title>MHD Ghanem Balhawan</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="bootstrap/css/mystyle.css">
	<script src="bootstrap/js/myscript.js"></script>
	<script src="bootstrap/js/jquery.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>
	
	
	</head>
	<body id="Home">
	<?php include 'includes/header.php'; ?>
	<!--carousel -->
	<div class="container-fluid carouselContainer hidden-sm">
        <div id="myCarousel" class="carousel slide" data-ride="carousel" width="100%" height="100%">
        <!-- Indicators -->
            <ol class="carousel-indicators" dir="auto">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
			<!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="images/nature3.jpg" alt="Nature" width="100%">
                </div>
                <div class="item">
                    <img src="images/tech2.jpg" alt="Technology" width="100%">
                </div>
                <div class="item">
                    <img src="images/photo1.jpg" alt="Photography" width="100%">
                </div>
            </div>
			<!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><span class="sr-only">Next</span></a>
        </div>
    </div>
	 <div class="col-lg-11" style="margin:5px;width:5px;height:5px;"></div>
	<div class="col-lg-4 visible-xs">
		<?php include 'includes/sidebar.php'; ?>
	</div>
	<div class="containerArticle">
		<?php echo $login_err; ?>
		<article class="row">
			<section class="col-md-8">
				<?php
					$sel_sql = "SELECT * FROM `tbl_post` WHERE pos_status ='published' ORDER BY pos_id DESC LIMIT $start, $limit";
					$pre_sql = mysqli_query($conn,$sel_sql);
						while($rows = mysqli_fetch_assoc($pre_sql)){
							echo '
							<div class = "panel panel-success"  id="article">
								<div class="panel-heading">
									<h3><a href ="post.php?pos_id='.$rows['pos_id'].'">'.$rows['pos_title'].'</a></h3>
								</div>
								<div class="panel-body">
									<div class = "col-lg-4">
										<img src="'.$rows['pos_image'].'" alt="image" width = "100%">
									</div>
									<div class="col-lg-8">
										<p>'.substr($rows['pos_description'],0,250).'......</p>
									</div>
										<a href ="post.php?pos_id='.$rows['pos_id'].'" class = "btn btn-primary">Read More</a>
								</div>
							</div>
							';
							}
				?>
			</section>
			<div class="visible-lg col-xs-4 pull-right"><?php include 'includes/sidebar.php'; ?></div>
		</article>
		
		<div class="text-center">
	<!--<ul class="pagination"> -->
			<?php
			
			// Get page data
$query1 = "SELECT * FROM $tableName LIMIT $start, $limit";
$result = mysqli_query($conn,$query1);

// Initial page num setup
if ($page == 0){$page = 1;}
$prev = $page - 1;
$next = $page + 1;
$lastpage = ceil($total_pages/$limit);
$LastPagem1 = $lastpage - 1;

$paginate = '';
if($lastpage > 1)
{

//$paginate .= "<ul class='pagination'>";
$paginate .= "<div class='paginate'>";

// Previous
if ($page > 1){
$paginate.= "<a href='$targetpage?page=$prev'>previous </a>";
}else{
$paginate.= "<span class='disabled'>previous </span>"; }

// Pages
if ($lastpage < 7 + ($stages * 2)) // Not enough pages to breaking it up
{
for ($counter = 1; $counter <= $lastpage; $counter++)
{
if ($counter == $page){
$paginate.= "<span class='current'> $counter</span>";
}else{
$paginate.= "<a href='$targetpage?page=$counter'> $counter</a>";}
}
}
elseif($lastpage > 5 + ($stages * 2)) // Enough pages to hide a few?
{
// Beginning only hide later pages
if($page < 1 + ($stages * 2))
{
for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
{
if ($counter == $page){
$paginate.= "<span class='current'>$counter</span>";
}else{
$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";}
}
$paginate.= "...";
$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";
}
// Middle hide some front and some back
elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
{
$paginate.= "<a href='$targetpage?page=1'>1</a>";
$paginate.= "<a href='$targetpage?page=2'>2</a>";
$paginate.= "...";
for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
{
if ($counter == $page){
$paginate.= "<span class='current'>$counter </span>";
}else{
$paginate.= "<a href='$targetpage?page=$counter'>$counter </a>";}
}
$paginate.= "...";
$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";
}
// End only hide early pages
else
{
$paginate.= "<a href='$targetpage?page=1'>1</a>";
$paginate.= "<a href='$targetpage?page=2'>2</a>";
$paginate.= "...";
for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
{
if ($counter == $page){
$paginate.= "<span class='current'>$counter</span>";
}else{
$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";}
}
}
}

// Next
if ($page < $counter - 1){
$paginate.= "<a href='$targetpage?page=$next'> next</a>";
}else{
$paginate.= "<span class='disabled'> next</span>";
}

//$paginate.= "</ul>";
$paginate.= "</div>";

}
//echo $total_pages.' Results';
// pagination
echo $paginate;
			
				/* $pagination_sql = "SELECT pos_id FROM tbl_post WHERE pos_status = 'published'";
				$pre_pagination = mysqli_query($conn, $pagination_sql);
				$count = mysqli_num_rows($pre_pagination);
				$total_pages = ceil($count/$per_page);
				for($i=1;$i<=$total_pages;$i++){
					echo '<li><a href="index.php?$page='.$i.'">'.$i.'</a></li>';
				} */
			?>
			<!--	</ul> -->
		</div>
	</div>
	</body>
	<?php include_once 'includes/footer.php'; ?>
</html>