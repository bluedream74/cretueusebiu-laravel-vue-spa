<template>
  <div>
    <aside id="top_link">
			<a id="pageTop" href="javascript:void(0)"><img src="/assets/img/common/btn_pagetop.png" alt="TOPへ" class="scale"></a>
		</aside>
		<footer>
			<div class="sitewrap">
				<ul>
					<li><router-link :to="{ name: 'about' }"><span>会社概要</span></router-link></li>
					<li><router-link :to="{ name: 'privacy' }"><span>プライバシーポリシー</span></router-link></li>
					<li><router-link :to="{ name: 'contact' }"><span>お問い合わせ</span></router-link></li>
					<li><router-link :to="{ name: 'terms' }"><span>利用規約</span></router-link></li>
				</ul>
				<small>Copyright&copy; hojyokinn.COM Co.,Ltd. All right reserved.</small>
			</div>
		</footer>
  </div>
</template>
<script>
export default {
  
}
</script>
<style lang="scss" scoped>

</style>