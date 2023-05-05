<?php
/*
Template Name: 事業者登録確認
*/
?>
<?php get_header(); ?>
<section class="section mv_area">
				<h1>事業者登録</h1>
				<div class="topicpath">
					<div class="sitewrap">
						<ol id="pan">
							<li><a href="../">TOP</a></li>
							<li><span>事業者登録</span></li>
						</ol>
					</div>
				</div>
			</section>
			<div class="content_area form_wrap">
				<section class="section lead">
					<div class="sitewrap">
						<h2 class="h_style01">事業者登録入力欄内容確認</h2>
						<p class="lead_style">送信内容をご確認の上、送信ボタンを押してください。</p>
					</div>
				</section>
				<section class="section area01">
					<div class="sitewrap">
						<h2 class="h_style01">事業者登録入力欄</h2>
						<?php the_content(); ?>
					</div>
				</section>
			</div>
<?php get_footer(); ?>