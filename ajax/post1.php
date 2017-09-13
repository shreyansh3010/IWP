<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $(".hideme").hide();

        $(".btn").click(function(){
            $(".hideme").toggle(900);
        });
    });
</script>

		  <?php include('../config.php');
		  include('../check.php');
		  $post_id = $_GET['postid'];
		        $sql = mysqli_query($con,"SELECT title, /*image,*/ author, date, intro FROM blog WHERE id='$post_id' ");
                $row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
				$title = $row['title'];
			//	$image = $row['image'];
				$author = $row['author'];
				$date = $row['date'];
				$intro = $row['intro'];
				?>

<div class="container inner tp0">
  <div class="box">
    <div class="slider-pro portfolio-slider">
      <div class="sp-slides">
        <div class="sp-slide"> <img class="sp-image" src="style/images/blog/<?php echo $image;?>" alt="" />
          <h4 class="sp-layer sp-overlay sp-padding" 
					data-position="leftBottom" data-horizontal="40" data-vertical="92"
					data-show-transition="right" data-show-delay="500" ><a href="profile.php?username=<?php echo $author;?>"> <?php echo $author;?> </a></h4>
          <p class="sp-layer sp-overlay sp-padding" 
					data-position="leftBottom"  data-horizontal="40" data-vertical="40" 
					data-show-transition="left" data-show-delay="700"><?php echo $date;?></p>
        </div>
      </div>
      <!-- /.sp-slides -->
    </div>
    <!-- /.slider-pro -->
    
    <div class="divide50"></div>
    
    <h1 class="post-title"><?php echo $title;?></h1>
    <p><?php echo $intro;?></p>
    <div class="divide10"></div>
	<?php $username = $_SESSION['username'];
	
	$sql1 = mysqli_query($con,"SELECT price,author FROM blog WHERE id='$post_id' ");
	$row1=mysqli_fetch_array($sql1,MYSQLI_ASSOC);
	$price = $row1['price'];
	$author = $row1['author'];
	
	$sql2 = mysqli_query($con,"SELECT post_id FROM purchase WHERE user='$username' and post_id='$post_id' ");
	      $row2=mysqli_fetch_array($sql2,MYSQLI_ASSOC);
		  $purchase = $row2['post_id'];
		  if($price!=0){
		  if (empty($purchase)&& $username != $author){
	?>
    <a href="purchase.php?postid=<?php echo $post_id;?>" class="btn"><strong>BUY NOW!!</strong></a>
		  <?php }
          else if (!empty($purchase)|| $username == $author) { ?>
	<a href="blog-post.php?postid=<?php echo $post_id;?>" class="btn"><strong>View more!!</strong></a>
		  <?php }}
		 else if($price==0){?>
	<a href="blog-post.php?postid=<?php echo $post_id;?>" class="btn"><strong>View more!!</strong></a>
		  <?php }?>
    
  </div>
  <!-- /.box -->
</div>
<!-- /.container -->

<!-- INSERT PAGE SCRIPTS HERE -->
<script type="text/javascript">
		$( '.portfolio-slider' ).sliderPro({
			width: 1070,
			height: 600,
			fade: true,
			arrows: true,
			buttons: false,
			autoHeight: true,
			autoScaleLayers: true,
			thumbnailArrows: false,
			autoplay: false,
			slideDistance: 0,
			thumbnailWidth: 125,
			thumbnailHeight: 80
		});
</script>