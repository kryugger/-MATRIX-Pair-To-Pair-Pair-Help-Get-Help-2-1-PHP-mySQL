<?php
Include('include-global.php');
$pagename = "My Referrals";
$title = "$pagename - $basetitle";
Include('include-header.php');
?>


<style>
	



::-moz-focus-inner { 
  padding: 0;
  border: 0;
}


button {
  position: relative;
/*  background-color: #aaa;
  border-radius: 0 3px 3px 0;
  cursor: pointer;*/
}

.copied::after {
  position: absolute;
  top: 12%;
  right: 110%;
  display: block;
  content: "COPIED";
  font-size: 1.40em;
  padding: 2px 10px;
  color: #fff;
  background-color: #22a;
  border-radius: 3px;
  opacity: 0;
  will-change: opacity, transform;
  animation: showcopied 1.5s ease;
}

@keyframes showcopied {
  0% {
    opacity: 0;
    transform: translateX(100%);
  }
  70% {
    opacity: 1;
    transform: translateX(0);
  }
  100% {
    opacity: 0;
  }
}

</style>
</head>
<body class="stretched" data-loader="<?php echo $baseloader; ?>" data-loader-color='<?php echo "#$basecolor"; ?>'>
<?php
Include('include-navbar-user.php');
Include('include-subhead.php');
?>
<section id="content">
<div class="content-wrap">
<div class="container clearfix">



<div class="row">
	<div class="col-md-12">
		
<label>YOUR REFERRAL LINK:</label>

<div class="input-group mb15">
<input type="text" class="form-control input-lg" id="ref" value="<?php echo "$baseurl/register/$user"; ?>"/>
<span class="input-group-btn">
<button data-copytarget="#ref" class="btn btn-success btn-lg">COPY TO CLIPBOARD</button>
</span>
</div>



	</div>
</div>


<br><br><br><br>


<?php 
$count = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE ref='".$uid."'"));
$mallu = mysql_fetch_array(mysql_query("SELECT mallu FROM users WHERE id='".$uid."'"));
$small = mysql_fetch_array(mysql_query("SELECT MIN(amount) FROM packs"));
?>

<div class="row">
<h3 style="text-align: center;"> LIST OF YOUR REFERRALS (<?php echo $count[0]; ?>)  <br>
<span>YOUR REFERRALS BONUS BALANCE <?php echo "$mallu[0] $basecurrency"; ?></span><br>
<small><strong>YOU CAN RECYCLE THIS BALANCE WHEN YOU HAVE <span style="color: #<?php echo $basecolor; ?>"><?php echo "$small[0] $basecurrency"; ?></span></strong></small>
</h3>

<?php

if ($small[0]<=$mallu[0]) {

echo "<a href=\"$baseurl/RecycleByRef\" class=\"btn btn-success btn-lg btn-block\">RECYCLE ME WITH THIS BALANCE</a>

<br><br><br><br>
";


}


$ddaa = mysql_query("SELECT id, username FROM users WHERE ref='".$uid."' ORDER BY id DESC");
while ($data = mysql_fetch_array($ddaa))
{
?>
<div class="col-md-4"><b class="btn btn-info btn-lg btn-block"><?php echo $data[1]; ?></b></div>
<?php 
}
 ?>
</div><!-- row -->


</div>
</div>
</section>
<?php 
include('include-footer.php');
?>



<script>
	

(function() {

	'use strict';
  
  // click events
  document.body.addEventListener('click', copy, true);

	// event handler
	function copy(e) {

    // find target element
    var 
      t = e.target,
      c = t.dataset.copytarget,
      inp = (c ? document.querySelector(c) : null);
      
    // is element selectable?
    if (inp && inp.select) {
      
      // select text
      inp.select();

      try {
        // copy text
        document.execCommand('copy');
        inp.blur();
        
        // copied animation
        t.classList.add('copied');
        setTimeout(function() { t.classList.remove('copied'); }, 1500);
      }
      catch (err) {
        alert('please press Ctrl/Cmd+C to copy');
      }
      
    }
    
	}

})();

</script>
</body>
</html>
