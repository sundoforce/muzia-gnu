<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

add_stylesheet('<link rel="stylesheet" href="'.$nt_lnb_url.'/lnb.css">', 0);
add_stylesheet('<link rel="stylesheet" href="'.$nt_lnb_url.'/amt/css/amt-lng1.css">', 0);
add_javascript('<script src="'.$nt_lnb_url.'/lnb.js"></script>', 0);

$tweek = array("일", "월", "화", "수", "목", "금", "토");
?>

<aside id="nt_lnb" class="f-small amt-lng1">
	<div class="nt-container">
		<!-- LNB Left -->
		<div class="pull-left">
			<ul>
				<li><a href="javascript:;" id="favorite">즐겨찾기</a></li>
				<li><a href="<?php echo G5_BBS_URL ?>/new.php">새글</a></li>
				<li><a><?php echo date('m월 d일');?>(<?php echo $tweek[date("w")];?>)</a></li>
			</ul>
		</div>
		<!-- LNB Right -->
		<div class="pull-right">
			<ul>
			<?php if($is_member) { // 로그인 상태 ?>
		    	<li><
			       <a href="<?php echo G5_ATTENDANCE_URL ?>/attendance.php">출석부</a>
                </li>
				<?php if(IS_NA_NOTI) { // 알림 ?>
            					<li><a href="<?php echo G5_BBS_URL ?>/noti.php">
            						알림<?php if ($member['as_noti']) { ?> <b class="orangered"><?php echo number_format($member['as_noti']) ?></b><?php } ?>
            						</a>
            					</li>
            				<?php } ?>
				<li><?php echo $member['sideview'] ?></li>
				<?php if ($is_admin == 'super' || $member['is_auth']) { ?>
					<li><a href="<?php echo correct_goto_url(G5_ADMIN_URL); ?>">관리</a></li>
				<?php } ?>
				<li>
				<a href="<?php echo G5_BBS_URL ?>/memo.php" target="_blank" class="win_memo">
                	쪽지함<?php if ($member['mb_memo_cnt']) { ?> <span class="orangered"><?php echo number_format($member['mb_memo_cnt']);?></span><?php } ?>
                </a>
                </li>
				<li>
					<a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=register_form.php">
						정보수정
					</a>
				</li>
                <li>
                <?php if($stats['now_total']) { ?>
                    <a href="<?php echo G5_BBS_URL ?>/current_connect.php">접속자 <?php echo number_format($stats['now_total']) ?><?php echo ($stats['now_mb']) ? ' (<b class="orangered">'.number_format($stats['now_mb']).'</b>)' : ''; ?></a>
                <?php } else { ?>
                    <a href="<?php echo G5_BBS_URL ?>/current_connect.php">접속자</a>
                <?php } ?>
                </li>
			<?php } else { // 로그아웃 상태 ?>
				<li><a href="<?php echo G5_BBS_URL ?>/login.php?url=<?php echo $urlencode ?>">로그인</a></li>
				<li><a href="<?php echo G5_BBS_URL ?>/register.php">회원가입</a></li>
			<?php } ?>
				
			<?php if($is_member) { ?>
				<li><a href="<?php echo G5_BBS_URL ?>/logout.php">로그아웃</a></li>
			<?php } ?>
			</ul>
		</div>
		<div class="clearfix"></div>
	</div>
</aside>
