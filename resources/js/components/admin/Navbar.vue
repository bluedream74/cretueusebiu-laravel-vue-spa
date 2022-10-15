<template>
    <header>
		<div class="menu_top block_link fix">
			<h1 id="site_ttl"><router-link :to="{ name: 'admin.dashboard' }"><img src="/admin/img/logo.png" alt="補助金支援.COMのロゴ"></router-link></h1>
			<ul class="right_menu">
				<li class="menu"><router-link :to="{ name: 'admin.dashboard' }"><span>メニュー画面へ</span></router-link></li>
				<li class="menu"><router-link :to="{ name: 'admin.password' }"><span>パスワード変更</span></router-link></li>
				<li class="menu"><router-link :to="{ name: 'home' }"><span>サイトを表示</span></router-link></li>
				<li class="logout"><a><span>ログアウト</span></a></li>
			</ul>
		</div>
	</header>
</template>
<script>
export default {
    
}
</script>
<style lang="scss" scoped>

</style>