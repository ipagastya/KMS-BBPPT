<!DOCTYPE html>
<html>
<head>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

	<style type="text/css">
		body{
			margin-top:20px;
			background-color:#e9ebee;
		}

		.be-comment-block {
			margin-bottom: 50px !important;
			border: 1px solid #edeff2;
			border-radius: 2px;
			padding: 50px 70px;
			/*border:1px solid #ffffff;*/
		}

		.comments-title {
			font-size: 16px;
			color: #262626;
			margin-bottom: 15px;
			font-family: 'Conv_helveticaneuecyr-bold';
		}

		.be-img-comment {
			width: 60px;
			height: 60px;
			float: left;
			margin-bottom: 15px;
		}

		.be-ava-comment {
			width: 60px;
			height: 60px;
			border-radius: 50%;
		}

		.be-comment-content {
			margin-left: 80px;
		}

		.be-comment-content span {
			display: inline-block;
			width: 49%;
			margin-bottom: 15px;
		}

		.be-comment-name {
			font-size: 13px;
			font-family: 'Conv_helveticaneuecyr-bold';
		}

		.be-comment-content a {
			color: #383b43;
		}

		.be-comment-content span {
			display: inline-block;
			width: 49%;
			margin-bottom: 15px;
		}

		.be-comment-time {
			text-align: right;
		}

		.be-comment-time {
			font-size: 11px;
			color: #b4b7c1;
		}

		.be-comment-text {
			font-size: 13px;
			line-height: 18px;
			color: #7a8192;
			display: block;
			background: #f6f6f7;
			border: 1px solid #edeff2;
			padding: 15px 20px 20px 20px;
		}

		.form-group.fl_icon .icon {
			position: absolute;
			top: 1px;
			left: 16px;
			width: 48px;
			height: 48px;
			background: #f6f6f7;
			color: #b5b8c2;
			text-align: center;
			line-height: 50px;
			-webkit-border-top-left-radius: 2px;
			-webkit-border-bottom-left-radius: 2px;
			-moz-border-radius-topleft: 2px;
			-moz-border-radius-bottomleft: 2px;
			border-top-left-radius: 2px;
			border-bottom-left-radius: 2px;
		}

		.form-group .form-input {
			font-size: 13px;
			line-height: 50px;
			font-weight: 400;
			color: #b4b7c1;
			width: 100%;
			height: 50px;
			padding-left: 20px;
			padding-right: 20px;
			border: 1px solid #edeff2;
			border-radius: 3px;
		}

		.form-group.fl_icon .form-input {
			padding-left: 70px;
		}

		.form-group textarea.form-input {
			height: 150px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="be-comment-block">
			<form class="form-block" action="save_comment.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="username" value="<?php echo $username?>">
				<input type="hidden" name="idinformasi" value=<?php echo $idinfo?>>
				<div class="row">
					<!-- <div class="col-xs-12 col-sm-6">
						<div class="form-group fl_icon">
							<div class="icon"><i class="fa fa-user"></i></div>
							<input class="form-input" type="text" placeholder="Your name">
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 fl_icon">
						<div class="form-group fl_icon">
							<div class="icon"><i class="fa fa-envelope-o"></i></div>
							<input class="form-input" type="text" placeholder="Your email">
						</div>
					</div> -->
					<div class="col-12">									
						<div class="form-group">
							<textarea class="form-input" name="comment_text" required="" placeholder="Tulis komentarmu di sini"></textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<input type="submit" name="submit" class="btn btn-primary pull-left" style="margin-left: 16px;">
				</div>
			</form>

			<?php
				$qcomment = $koneksi->query("
					SELECT komentar.id, komentar.tanggal, komentar.isi, akun.nama, akun.nip 
					FROM komentar 
					JOIN akun ON komentar.idakun = akun.id 
					WHERE komentar.idinformasi = '$idinfo' 
					ORDER BY komentar.tanggal DESC");
				$n_comment = $qcomment->num_rows;
			?>
			</br>
			<h1 class="comments-title">Komentar (<?php echo $n_comment; ?>)</h1>

			<?php
				if ($n_comment > 0) {
					while ($row_comment = $qcomment->fetch_assoc()):
			?>
			<div class="be-comment">
				<!-- AVA USER -->
				<div class="be-img-comment">	
					<img src="libs/assets/img/admin-avatar.png" alt="" class="be-ava-comment">
				</div>
				<div class="be-comment-content">
					<!-- NAMA USER & TGL COMMENT -->
					<span class="be-comment-name">
						<?php echo $row_comment['nama']; ?> (<?php echo $row_comment['nip'] ?>)
					</span>
					<span class="be-comment-time">
						<i class="fa fa-clock-o"></i>
						<?php echo $row_comment['tanggal']; ?>
					</span>
					<!-- ISI COMMENT -->
					<p class="be-comment-text">
						<?php echo $row_comment['isi']; ?>
					</p>
				</div>
			</div>
			<?php
					endwhile;
				}
				else{
			?>
			<p style = "text-align: center">
				Komentarnya kosong mlompong :(
			</p>
		<?php } ?>
		</div>
	</div>
</body>
</html>