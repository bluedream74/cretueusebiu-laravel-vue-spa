<template>
	<div>
		<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm admin__navbar">
			<a @click="showSpButton" class="navbar-brand">クリエイター管理ページ</a>
			<a class="logout ml-auto mr-4" @click="logout">ログアウト</a>
		</nav>

		<div class="sp__menu" v-if="is_show_menu">
			<ul>
				<li>
					<a class="account" @click="toOther(0)">
						会員情報編集
					</a>
				</li>
				<li>
					<a class="movie_post" @click="toOther(1)">
						動画投稿画面
					</a>
				</li>
				<li>
					<a class="movies" @click="toOther(2)">
						動画一覧画面
					</a>
				</li>
				<li>
					<a class="history" @click="toOther(3)">
						売上確認ページ
					</a>
				</li>
			</ul>

			<a class="close__btn" @click="closeMenu"><i class="far fa-times-circle"></i></a>
		</div>
	</div>
</template>
<script>
export default {
	name: 'Navbar',

	data() {
		return {
			is_show_menu: false
		}
	},

	methods: {
		async logout() {
			// Log out the user
			await this.$store.dispatch('auth/logout')

			// Redirect to login.
			this.$router.push({ name: 'creator.login' })
		},

		toOther(flag) {
			if (flag == 0) {
				this.$router.push({ name: 'creator.account' })
				this.is_show_menu = false
			} else if (flag == 1) {
				this.$router.push({ name: 'creator.movie_post' })
				this.is_show_menu = false
			} else if (flag == 2) {
				this.$router.push({ name: 'creator.movie_list' })
				this.is_show_menu = false
			} else {
				this.$router.push({ name: 'creator.payment_list' })
				this.is_show_menu = false
			}
		},

		showSpButton() {
			this.is_show_menu = true
		},

		closeMenu() {
			this.is_show_menu = false
		}
	}
}
</script>
<style lang="scss" scoped>
.logout {
	padding-left: 20px;
	padding-right: 20px;
	height: 30px;
	border-radius: 4px;
	background-color: #343a40;
	color: #fff !important;
	font-size: 14px;
	display: flex;
	align-items: center;
	text-decoration: none;

	&:hover {
		text-decoration: none;
		background-color: #4e4e4e;
	}
}

.sp__menu {
	background-color: white;
	position: fixed;
	left: 0;
	top: 0;
	width: 100%;
	height: 100%;
	z-index: 1400;

	ul {
		list-style: none;
		padding-top: 40px;

		li {
			margin-bottom: 20px;

			a {
				font-size: 14px;
				color: #333;
				text-decoration: underline;
			}
		}
	}

	.close__btn {
		position: fixed;
		right: 20px;
		top: 20px;
		z-index: 1500;
		
		i {
			font-size: 24px;
			color: #333;
		}
	}
}
</style>