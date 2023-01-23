<template>
	<div class="admin__sidebar">
		<a class="logo">
			<h1>
				<img src="/asset/logo.png" />
			</h1>
		</a>

		<div class="sidebar__menu_list">
			<router-link class="account" :to="{ name: 'creator.account' }">
				会員情報編集
			</router-link>
			<router-link class="movie_post" :to="{ name: 'creator.movie_post' }">
				動画投稿画面
			</router-link>
			<router-link class="movies" :to="{ name: 'creator.movie_list' }">
				動画一覧画面
			</router-link>
			<router-link class="history" :to="{ name: 'creator.payment_list' }">
				売上確認ページ
			</router-link>
			<!-- <router-link class="history" :to="{ name: 'creator.payment_list' }">
				売上確認ページ
			</router-link> -->
		</div>
	</div>
</template>
<script>
export default {
	name: 'Sidebar'
}
</script>