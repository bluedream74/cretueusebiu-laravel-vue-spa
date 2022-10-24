<template>
  <div>
    <main>
		<div class="sitewrap">
			<div id="pan">
				<ul>
					<li><router-link :to="{ name: 'admin.dashboard' }">HOME</router-link></li>
					<li><span>お知らせ管理一覧</span></li>
				</ul>
			</div>
			<h2 class="h_style03"><span>お知らせ管理一覧</span></h2>
			<div class="finish_txt">
				<p class="error">エラーしました。</p>
				<p class="complete">更新しました。</p>
			</div>
			<div class="flex_btw_wrap">
				<div class="load_btn"><a href="javascript:void(0)"><span>表示の更新</span></a></div>
				<div class="new_btn"><a href="edit.html"><span>新規登録</span></a></div>
			</div>
			<div class="table_wrap">
				<div class="pager_style">
					<ul>
						<li class="prev"><a href="#">＜＜前の50件</a></li>
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li class="on"><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li class="next"><a href="#">次の50件＞＞</a></li>
					</ul>
				</div>
				<table>
					<tbody>
						<tr>
							<th width="60">ID</th>
							<th width="40">表示</th>
							<th width="380">タイトル</th>
							<th width="380">公開期間</th>
							<th width="140"></th>
						</tr>
						<tr>
							<td>0050</td>
							<td><input type="checkbox" id="display50" class="display_btn"><label for="display50"></label></td>
							<td>営業時間に関するお知らせ</td>
							<td>2022/04/01～無期限</td>
							<td>
								<router-link :to="{ name: 'admin.news.edit' }" class="eidt_btn table_btns">編集</router-link>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0049</td>
							<td><input type="checkbox" id="display49" class="display_btn"><label for="display49"></label></td>
							<td>新商品に関するお知らせ</td>
							<td>2022/03/25～無期限</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0048</td>
							<td><input type="checkbox" id="display48" class="display_btn"><label for="display48"></label></td>
							<td>営業時間に関するお知らせ</td>
							<td>2022/04/01～無期限</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0047</td>
							<td><input type="checkbox" id="display47" class="display_btn"><label for="display47"></label></td>
							<td>新商品に関するお知らせ</td>
							<td>2022/03/25～無期限</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0046</td>
							<td><input type="checkbox" id="display46" class="display_btn"><label for="display46"></label></td>
							<td>新商品に関するお知らせ</td>
							<td>2022/02/03～2022/02/28</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0045</td>
							<td><input type="checkbox" id="display45" class="display_btn"><label for="display45"></label></td>
							<td>新商品に関するお知らせ</td>
							<td>2022/02/01～2022/02/20</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0044</td>
							<td><input type="checkbox" id="display44" class="display_btn"><label for="display44"></label></td>
							<td>営業時間に関するお知らせ</td>
							<td>2022/04/01～無期限</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0043</td>
							<td><input type="checkbox" id="display43" class="display_btn"><label for="display43"></label></td>
							<td>新商品に関するお知らせ</td>
							<td>2022/03/25～無期限</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0042</td>
							<td><input type="checkbox" id="display42" class="display_btn"><label for="display42"></label></td>
							<td>新商品に関するお知らせ</td>
							<td>2022/02/03～2022/02/28</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0041</td>
							<td><input type="checkbox" id="display41" class="display_btn"><label for="display41"></label></td>
							<td>新商品に関するお知らせ</td>
							<td>2022/02/01～2022/02/20</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0040</td>
							<td><input type="checkbox" id="display40" class="display_btn"><label for="display40"></label></td>
							<td>営業時間に関するお知らせ</td>
							<td>2022/04/01～無期限</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0039</td>
							<td><input type="checkbox" id="display39" class="display_btn"><label for="display39"></label></td>
							<td>新商品に関するお知らせ</td>
							<td>2022/03/25～無期限</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0038</td>
							<td><input type="checkbox" id="display38" class="display_btn"><label for="display38"></label></td>
							<td>営業時間に関するお知らせ</td>
							<td>2022/04/01～無期限</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0037</td>
							<td><input type="checkbox" id="display37" class="display_btn"><label for="display37"></label></td>
							<td>新商品に関するお知らせ</td>
							<td>2022/03/25～無期限</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0036</td>
							<td><input type="checkbox" id="display36" class="display_btn"><label for="display36"></label></td>
							<td>新商品に関するお知らせ</td>
							<td>2022/02/03～2022/02/28</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0035</td>
							<td><input type="checkbox" id="display35" class="display_btn"><label for="display35"></label></td>
							<td>新商品に関するお知らせ</td>
							<td>2022/02/01～2022/02/20</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0034</td>
							<td><input type="checkbox" id="display34" class="display_btn"><label for="display34"></label></td>
							<td>営業時間に関するお知らせ</td>
							<td>2022/04/01～無期限</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0033</td>
							<td><input type="checkbox" id="display33" class="display_btn"><label for="display33"></label></td>
							<td>新商品に関するお知らせ</td>
							<td>2022/03/25～無期限</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0032</td>
							<td><input type="checkbox" id="display32" class="display_btn"><label for="display32"></label></td>
							<td>新商品に関するお知らせ</td>
							<td>2022/02/03～2022/02/28</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0031</td>
							<td><input type="checkbox" id="display31" class="display_btn"><label for="display31"></label></td>
							<td>新商品に関するお知らせ</td>
							<td>2022/02/01～2022/02/20</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0030</td>
							<td><input type="checkbox" id="display30" class="display_btn"><label for="display30"></label></td>
							<td>営業時間に関するお知らせ</td>
							<td>2022/04/01～無期限</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0029</td>
							<td><input type="checkbox" id="display29" class="display_btn"><label for="display29"></label></td>
							<td>新商品に関するお知らせ</td>
							<td>2022/03/25～無期限</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0028</td>
							<td><input type="checkbox" id="display28" class="display_btn"><label for="display28"></label></td>
							<td>営業時間に関するお知らせ</td>
							<td>2022/04/01～無期限</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0027</td>
							<td><input type="checkbox" id="display27" class="display_btn"><label for="display27"></label></td>
							<td>新商品に関するお知らせ</td>
							<td>2022/03/25～無期限</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0026</td>
							<td><input type="checkbox" id="display26" class="display_btn"><label for="display26"></label></td>
							<td>新商品に関するお知らせ</td>
							<td>2022/02/03～2022/02/28</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0025</td>
							<td><input type="checkbox" id="display25" class="display_btn"><label for="display25"></label></td>
							<td>新商品に関するお知らせ</td>
							<td>2022/02/01～2022/02/20</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0024</td>
							<td><input type="checkbox" id="display24" class="display_btn"><label for="display24"></label></td>
							<td>営業時間に関するお知らせ</td>
							<td>2022/04/01～無期限</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0023</td>
							<td><input type="checkbox" id="display23" class="display_btn"><label for="display23"></label></td>
							<td>新商品に関するお知らせ</td>
							<td>2022/03/25～無期限</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0022</td>
							<td><input type="checkbox" id="display22" class="display_btn"><label for="display22"></label></td>
							<td>新商品に関するお知らせ</td>
							<td>2022/02/03～2022/02/28</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0021</td>
							<td><input type="checkbox" id="display21" class="display_btn"><label for="display21"></label></td>
							<td>新商品に関するお知らせ</td>
							<td>2022/02/01～2022/02/20</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0020</td>
							<td><input type="checkbox" id="display20" class="display_btn"><label for="display20"></label></td>
							<td>営業時間に関するお知らせ</td>
							<td>2022/04/01～無期限</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0019</td>
							<td><input type="checkbox" id="display19" class="display_btn"><label for="display19"></label></td>
							<td>新商品に関するお知らせ</td>
							<td>2022/03/25～無期限</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0018</td>
							<td><input type="checkbox" id="display18" class="display_btn"><label for="display18"></label></td>
							<td>営業時間に関するお知らせ</td>
							<td>2022/04/01～無期限</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0017</td>
							<td><input type="checkbox" id="display17" class="display_btn"><label for="display17"></label></td>
							<td>新商品に関するお知らせ</td>
							<td>2022/03/25～無期限</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0016</td>
							<td><input type="checkbox" id="display16" class="display_btn"><label for="display16"></label></td>
							<td>新商品に関するお知らせ</td>
							<td>2022/02/03～2022/02/28</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0015</td>
							<td><input type="checkbox" id="display15" class="display_btn"><label for="display15"></label></td>
							<td>新商品に関するお知らせ</td>
							<td>2022/02/01～2022/02/20</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0014</td>
							<td><input type="checkbox" id="display14" class="display_btn"><label for="display14"></label></td>
							<td>営業時間に関するお知らせ</td>
							<td>2022/04/01～無期限</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0013</td>
							<td><input type="checkbox" id="display13" class="display_btn"><label for="display13"></label></td>
							<td>新商品に関するお知らせ</td>
							<td>2022/03/25～無期限</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0012</td>
							<td><input type="checkbox" id="display12" class="display_btn"><label for="display12"></label></td>
							<td>新商品に関するお知らせ</td>
							<td>2022/02/03～2022/02/28</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0011</td>
							<td><input type="checkbox" id="display11" class="display_btn"><label for="display11"></label></td>
							<td>新商品に関するお知らせ</td>
							<td>2022/02/01～2022/02/20</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0010</td>
							<td><input type="checkbox" id="display10" class="display_btn"><label for="display10"></label></td>
							<td>営業時間に関するお知らせ</td>
							<td>2022/04/01～無期限</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0009</td>
							<td><input type="checkbox" id="display09" class="display_btn"><label for="display09"></label></td>
							<td>新商品に関するお知らせ</td>
							<td>2022/03/25～無期限</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0008</td>
							<td><input type="checkbox" id="display08" class="display_btn"><label for="display08"></label></td>
							<td>営業時間に関するお知らせ</td>
							<td>2022/04/01～無期限</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0007</td>
							<td><input type="checkbox" id="display07" class="display_btn"><label for="display07"></label></td>
							<td>新商品に関するお知らせ</td>
							<td>2022/03/25～無期限</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0006</td>
							<td><input type="checkbox" id="display06" class="display_btn"><label for="display06"></label></td>
							<td>新商品に関するお知らせ</td>
							<td>2022/02/03～2022/02/28</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0005</td>
							<td><input type="checkbox" id="display05" class="display_btn"><label for="display05"></label></td>
							<td>新商品に関するお知らせ</td>
							<td>2022/02/01～2022/02/20</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0004</td>
							<td><input type="checkbox" id="display04" class="display_btn"><label for="display04"></label></td>
							<td>営業時間に関するお知らせ</td>
							<td>2022/04/01～無期限</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0003</td>
							<td><input type="checkbox" id="display03" class="display_btn"><label for="display03"></label></td>
							<td>新商品に関するお知らせ</td>
							<td>2022/03/25～無期限</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0002</td>
							<td><input type="checkbox" id="display02" class="display_btn"><label for="display02"></label></td>
							<td>新商品に関するお知らせ</td>
							<td>2022/02/03～2022/02/28</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
						<tr>
							<td>0001</td>
							<td><input type="checkbox" id="display01" class="display_btn"><label for="display01"></label></td>
							<td>新商品に関するお知らせ</td>
							<td>2022/02/01～2022/02/20</td>
							<td>
								<a href="edit.html" class="eidt_btn table_btns">編集</a>
								<span class="delete_btn table_btns">削除 </span>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</main>
  </div>
</template>
<script>
export default {
  
}
</script>