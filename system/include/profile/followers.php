<?
$cpcv = 0;
	$quei = mysqli_query($link, "SELECT 1 FROM users WHERE login='{$dot1}'");
	$roi = mysqli_fetch_array($quei);
	if ($roi) {
		$quex = mysqli_query($link, "SELECT * FROM profile WHERE login='{$dot1}'");
		$rox = mysqli_fetch_array($quex);
	$au_nm = $rox['login'];
	$au_id = $rox['id'];
	$au_avatar = $rox['avatar'];
	$au_rating = $rox['rating'];
	$au_fon = $rox['afon'];
	$au_kkd = $rox['kkode'];
			$qlex = mysqli_query($link, "SELECT * FROM o_titul WHERE id='{$au_kkd}'");
			$rlx = mysqli_fetch_array($qlex);
			$au_ll = $rlx['s_titul'];
			$qlel = mysqli_query($link, "SELECT * FROM prof_opt WHERE f_idprofile='{$au_nm}'");
				$rll = mysqli_fetch_array($qlel);
				$lu_ll = $rll['f_up'];
	echo"
<div id='header' class='_g'>
	<div style='background:url(http://".$_SERVER['HTTP_HOST']."/include/afon/".$au_fon.");background-position:0px ".$lu_ll."px;' class='sai_mu'>
		<div>";
		if($dot1 == $_SESSION['nLog']){
		echo"<div class=' _prof_f _mji_'>
			<img class='ui_av' src='http://".$_SERVER['HTTP_HOST']."/include/avatars/".$au_avatar."'>";
		}else{echo"<div class=' _prof_d _mji_'>
		<img class='ui_av' src='http://".$_SERVER['HTTP_HOST']."/include/avatars/".$au_avatar."'>";}
		echo"
			</div>
			<div class='_mji_ _kik_'>
				<span>".$au_nm."</span>
				<div class='ev_ie'>
					<span>[".$au_ll."]</span>
				</div>
			</div>
		</div>
	</div>
</div>";

?>
<div id="header" class="_t">
<?
require('system/include/profile/prof_menu.php');
?>
	<div class="ui_pr_tr">
		<div class="_kji_ kap_pp">
		<div id="porta_s" >
<?  
	$dot1 = $_GET['par'];
	$quertc50 = mysqli_query($link, "SELECT 1 FROM o_followers WHERE `f_master`='{$dot1}'");
	$kc_mum = mysqli_num_rows($quertc50);
	if($kc_mum != 0){
	$query55 = mysqli_query($link, "SELECT DISTINCT f_master,f_author FROM o_followers WHERE `f_master`='{$dot1}'");
	while ($row5 = mysqli_fetch_array($query55)){
	$ff_author = $row5['f_author'];
		$query54 = mysqli_query($link, "SELECT login,avatar FROM profile WHERE `login`='{$ff_author}'");
		$row4 = mysqli_fetch_array($query54);
		$ff_aava = $row4['avatar'];
	
	echo"		
			<div class='krug_g2 pprt1'>
				<div class='krug_4'>
						<img src='http://".$_SERVER['HTTP_HOST']."/include/avatars/".$ff_aava."' class='krug_im'>
					<div class='kijo'>
						<a class='dec_b' href='/".$ff_author."'>".$ff_author."</a>
					</div>

				</div>
			</div>";
		}
	}else{
		echo"<div class='oioi_susu t0_zelist'></div>
				<div class='t1_menderl'>
					<p>".$dot1." isn’t followed anyone yet.</p>
				</div>";
	}	
?>			
	</div>
	</div>
	<div class='_kji_ kas_pp'>
<?
require('system/include/profile/ui_rightprof.php');
?>
	</div>
	</div>
</div>
<?
}else{
echo'this user is not yet!';
}
?>
