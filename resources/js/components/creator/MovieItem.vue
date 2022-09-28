<template>
	<div class="movie__item" @click="toCreateMovieDetail">
		<div class="thumbnail">
			<img :src="'/storage/'+movie.thumbnail" />

			<span class="length">
				{{ movie.duration | movieDuration }}
			</span>

			<span class="newly" v-if="isNew()">
				<img src="/asset/icon_newly.png" alt="newly" />
			</span>
		</div>

		<div class="detail_cont">
			<h3>
				{{ movie.title | truncate(35) }}
			</h3>
			<p class="date">
				{{ movie.created_at | yearFormat }}<span>年</span>{{ movie.created_at | monthFormat }}<span>月</span>{{ movie.created_at | dayFormat }}<span>日</span>
			</p>
			<div class="detail__action">
				<div class="detail__status">
					<p>
						<img src="/asset/icon_comment.png" />
						<span>{{ comments.length }}</span>
					</p>
					<p>
						<img src="/asset/icon_payment.png" />
						<span>{{ donatePayments.length }}</span>
					</p>
				</div>
				<a @click="editMovie" class="edit">
					編集する
				</a>
			</div>
			<div class="creator__info">
				<p class="img">
					<img :src="movie.creator.avatar_url" />
				</p>
				<p>
					{{ movie.creator.name }}
				</p>
			</div>
		</div>
	</div>
</template>
<script>
import axios from 'axios'
export default {
	props: ['movie'],
	
	name: 'MovieItem',

	data() {
		return {
			comments: [],
			donatePayments: []
		}
	},

	watch: {
		movie: {
			immediate: true,
			handler(movie) {
				if (movie) {
					this.comments = movie.comments
					this.donatePayments = movie.donate_payments
				}
			}
		},
	},
  
	methods: {
		isNew() {
			var created_date = new Date(this.$props.movie.created_at)
			var today = new Date();
			created_date.setDate(created_date.getDate() + 7)
			
			return created_date > today
		},

		deleteMovie(event) {
			console.log(event, 'sdfsdf')
			event.preventDefault()
			event.stopPropagation()
			this.$emit('delete_movie', this.$props.movie.id)
		},
		
		editMovie(event) {
			console.log('testsetset')
			event.preventDefault()
			event.stopPropagation()
			this.$router.push({ name: 'creator.movie_edit', params: { id: this.$props.movie.id } })
		},

		toCreateMovieDetail() {
			this.$router.push({ name: 'creator.movie_detail', params: { id: this.$props.movie.id } })
		}
  	},
}
</script>
<style lang="scss" scoped>
.detail__action .edit {
	padding: 0 30px;
	height: 30px;
	display: flex;
	align-items: center;
	justify-content: center;
	background-color: #343a40;
	color: white !important;

	&:hover {
		text-decoration: none !important;
		border: 1px solid #343a40;
		background-color: white;
		color: #343a40 !important;
	}
}

.delete_button {
	margin-right: 20px;
	margin-left: auto;
	height: 32px;
	padding-left: 16px;
	padding-right: 16px;
	display: block;
	margin-top: 20px;
	border: 1px solid #333;
	width: fit-content;
	display: flex;
	justify-content: center;
	align-items: center;
	color: #333 !important;
}
</style>