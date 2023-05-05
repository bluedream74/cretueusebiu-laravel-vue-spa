<template>
  <div class="common_page form_page consultation_form">
    <main>
			<section class="section mv_area">
				<h1>事業者相談フォーム</h1>
				<div class="topicpath">
					<div class="sitewrap">
						<ol id="pan">
							<li><router-link :to="{ name: 'home' }">TOP</router-link></li>
							<li><span>事業者相談フォーム</span></li>
						</ol>
					</div>
				</div>
			</section>
			<div class="content_area form_wrap">
				<div action="check.html" class="h-adr">
					<span class="p-country-name" style="display:none;">Japan</span>
					<section class="section lead">
						<div class="sitewrap">
							<h2 class="h_style01">事業者として相談をする</h2>
							<p class="lead_style">以下のフォームより登録内容をご入力ください。</p>
							<ul class="txt_indent texts text_link">
								<li>・支援機関新規登録、その他のお問い合わせは専用のフォームをご利用ください。</li>
								<li>・赤色の<b class="red">（必須）</b>がついた項目は必須入力項目です。 お忘れのないようご入力ください。</li>
								<li>・ご入力いただいた情報は、<a href="../privacy" target="_blank">プライバシーポリシー</a>に基き厳重に管理いたします。</li>
								<li>・尚、反映までにお時間がかかる場合がございますのでご了承ください。</li>
								<li>※営業時間： 月曜～土曜／9:00～18:00　定休日： 日曜・祝日</li>
							</ul>
						</div>
					</section>
					<section class="section area01">
						<div class="sitewrap">
							<h2 class="h_style01">事業者相談入力欄</h2>
							<div class="table_style">
								<dl class="required">
									<dt>相談内容<i>必須</i></dt>
									<dd><div class="form_el">
										<h3 class="form_inttl">使いたい補助金や制度が決まっている方</h3>
										<div class="labels">
											<label :for="'consultation_1_'+(index+1)" v-for="(item, index) in SYSTEM_CONFIRM" :key="index"><input type="checkbox" :id="'consultation_1_'+(index+1)" :value="index" name="consultation_1" :checked="system_confirms.includes(index)" @change="changeSystemConfirms($event, item, index)"><span>{{ item }}</span></label>
										</div>
										<h3 class="form_inttl">該当の補助金や制度が不明な方</h3>
										<div class="labels">
											<label :for="'consultation_2_'+(index+1)" v-for="(item, index) in SYSTEM_MISS" :key="index"><input type="checkbox" :id="'consultation_2_'+(index+1)" :value="index" name="consultation_2" :checked="system_misss.includes(index)" @change="changeSystemMisss($event, item, index)"><span>{{ item }}</span></label>
										</div>
										<h3 class="form_inttl">その他</h3>
										<div class="labels">
											<label :for="'consultation_3_'+(index+1)" v-for="(item, index) in SYSTEM_OTHER" :key="index"><input type="checkbox" :id="'consultation_3_'+(index+1)" :value="index" name="consultation_3" :checked="system_others.includes(index)" @change="changeSystemOthers($event, item, index)"><span>{{ item }}</span></label>
										</div>
									</div></dd>
								</dl>
								<dl class="required">
									<dt>会社名（又は屋号）<i>必須</i></dt>
									<dd><div class="form_el"><input v-model="com_name" type="text" name="companyName" required placeholder="株式会社AA"></div></dd>
								</dl>
								<dl class="required">
									<dt>業種<i>必須</i></dt>
									<dd><div class="form_el">
										<div class="select_wrap">
											<select name="jobType" v-model="job">
												<option :value="index" v-for="(item, index) in JOBS" :key="index">{{ item }}</option>
											</select>
										</div>
									</div></dd>
								</dl>
								<dl class="required">
									<dt>会社所在地<i>必須</i></dt>
									<dd><div class="form_el inline">
										<span>〒</span><input type="text" v-model="zipcode" @change="changeZip" name="zip" class="p-postal-code" size="8" maxlength="8" placeholder="0000000">
										<div class="select_wrap">
											<select name="pref" class="p-region-id" v-model="prefecture">
												<option :value="null">--</option>
												<option :value="item" v-for="(item, index) in PREFECTURES" :key="index">{{ item }}</option>
											</select>
										</div>
									</div></dd>
								</dl>
								<dl class="required">
									<dt>市区町村番地<i>必須</i></dt> 
									<dd><div class="form_el"><input v-model="city" type="text" name="address" required placeholder="〇〇区〇〇〇〇〇〇〇" class="p-locality p-street-address p-extended-address" /></div></dd>
								</dl>
								<dl class="">
									<dt>建物名・部屋番号など</dt>
									<dd><div class="form_el"><input v-model="building" type="text" name="address2" placeholder="〇〇ビル5F" /></div></dd>
								</dl>
								<dl class="required">
									<dt>従業員規模<i>必須</i></dt>
									<dd><div class="form_el"><div class="select_wrap">
										<select name="employee" v-model="amount">
											<option :value="index" v-for="(item, index) in AMOUNTS" :key="index">{{ item }}</option>
										</select>
									</div></div></dd>
								</dl>
								<dl class="required">
									<dt>年商<i>必須</i></dt>
									<dd><div class="form_el"><div class="select_wrap">
										<select name="yearlySales" v-model="income">
											<option :value="index" v-for="(item, index) in PRICES" :key="index">{{item }}</option>
										</select>
									</div></div></dd>
								</dl>
								<dl class="required">
									<dt>電話番号<i>必須</i></dt>
									<dd><div class="form_el"><input v-model="telephone" type="tel" name="tel" required placeholder=" " /></div></dd>
								</dl>
								<dl class="">
									<dt>FAX</dt>
									<dd><div class="form_el"><input v-model="fax" type="tel" name="fax" placeholder="0300000001" /></div></dd>
								</dl>
								<dl class="required">
									<dt>メールアドレス<i>必須</i></dt> 
									<dd><div class="form_el"><input v-model="email" type="email" name="email" required placeholder="aaa@gmail.com" /></div></dd>
								</dl>
								<dl class="required">
									<dt>担当者氏名<i>必須</i></dt>
									<dd><div class="form_el inline"><input v-model="tanto_name" type="text" name="cip" required placeholder="山田 太郎"></div></dd>
								</dl>
								<dl class="">
									<dt>部署名</dt>
									<dd><div class="form_el inline"><input v-model="department_name" type="text" name="department " placeholder="営業部"></div></dd>
								</dl>
								<dl class="">
									<dt>役職名</dt>
									<dd><div class="form_el inline"><input v-model="role_name" type="text" name="job " placeholder="部長"></div></dd>
								</dl>
								<dl class="">
									<dt>投資予定額</dt>
									<dd><div class="form_el">
										<div class="select_wrap">
											<select name="investment" v-model="price">
												<option :value="null">未定</option>
												<option :value="index" v-for="(item, index) in SUPPORT_PRICES" :key="index">{{ item }}</option>
											</select>
										</div>
									</div></dd>
								</dl>
								<dl class="required">
									<dt>相談内容概略<i>必須</i></dt> 
									<dd><div class="form_el"><textarea maxlength="100" v-model="message_title" class="limit" required placeholder="設備投資を補助してほしい。金属加工用の大きな機械の導入を検討しているが、補助をうけることはできるのか。"></textarea></div></dd>
								</dl>
								<dl class="required">
									<dt>相談内容詳細<i>必須</i></dt> 
									<dd><div class="form_el"><textarea required v-model="message_content" placeholder="設備投資を補助してほしいが、まずなにからしていいのかがそもそもわからない。また、5000万程の機械の導入を検討しているが、どの程度の補助金が受けられるのか知りたい。"></textarea></div></dd>
								</dl>
								<dl class="required">
									<dt>掲載期限<i>必須</i></dt> 
									<dd><div class="form_el"><input v-model="expired_at" type="date" name="viewingPeriod" required placeholder="2023/03/02" id="viewingPeriod" /></div></dd>
								</dl>
							</div>
							<div class="terms_box">
								<h2 class="h_style01">相談者用利用規約</h2>
								<div class="scroll_wrap">
									<div class="article_body edit_wrap">
										<h3>第１条（本規約の目的及び適用）</h3>
										<ol>
		<li>相談者用利用規約（以下「本規約」といいます）は、株式会社八咲（以下「当社」といいます）が「補助金活用.com」の名称で運営するウェブサイト（以下「当社ウェブサイト」といいます）で提供する本サービス（第2条で定義します）に関して、本サービスを提供・運営する当社と相談希望者（第2条で定義します）及び相談者（第2条で定義します）との間の権利義務関係を定めることを目的とし、本サービスの利用にかかる一切に適用されます。</li>
		<li>当社が当社ウェブサイト上で随時掲載する本サービスの利用等に関するルール、諸規定、お知らせ等は本規約の一部を構成するものとし、以下本規約内において単に本規約という場合には、特段の表示のない限り、これらを含むものとします。</li>
		<li>当社が、本サービスにおいて、補助金に関する相談への対応その他補助金に関する事務の取り扱いを行うことはありません。本サービスは、相談者と認定経営革新等支援機関（第2条において定義します）との間の補助金に関する相談の機会を提供するものに過ぎず、当社は、相談者に対する認定経営革新等支援機関の紹介又は選定は一切行わず、かつ補助金に関する相談及び事務の取り扱いの周旋を行うものではありません。当社は、相談者と認定経営革新等支援機関の間の問題に関して一切の責任を負わないものとします。また、当社は、相談者が認定経営革新等支援機関に対して補助金に関する相談及び依頼を行うことに関して、相談者及び認定経営革新等支援機関のいずれからも報酬、紹介料その他の対価を受領いたしません。ただし、当社は、法令に違反しない範囲内で行われる相談者情報の開示に対する料金を認定経営革新等支援機関から受領します。
		</li>
										</ol>

										<h3>第２条（定義）</h3>
										<p>本規約において使用する主要な用語の定義は、次の各号の通りとします。</p>
										<ol>
											<li>「本サービス」とは、相談者の補助金に関する相談情報（相談者の情報や相談内容等）を、当社が認定経営革新等支援機関へ開示し、相談者と認定経営革新等支援機関との相談機会の作出を図るサービス（本サービスに追加・変更等が生じた場合は、当該変更等後のサービスも含みます。）をいいます。</li>
											<li>「相談希望者」とは、本サービスを利用して、認定経営革新等支援機関へ補助金に関する相談を希望する個人事業主、法人及びその他の団体である事業者をいいます。</li>
											<li>「相談者」とは、相談希望者の内、本規約に同意の上、当社ウェブサイト上に、補助金に関する相談内容を投稿した個人事業主、法人及びその他の団体である事業者をいいます。</li>
											<li>「相談者等」とは、相談希望者及び相談者をいいます。</li>
											<li>「認定経営革新等支援機関」とは、国からの認定を受け、かつ本サービスに会員登録されている認定経営革新等支援機関をいいます。</li>
											<li>「相談者著作物等」とは、相談者によって作成又は投稿された、文字、文章、画像、図形、若しくはこれらを組み合わせたものをいいます。</li>
										</ol>


										<h3>第３条（本規約の変更）</h3>
										<p>本規約において使用する主要な用語の定義は、次の各号の通りとします。</p>
										<ol>
											<li>当社は、相談者等の承諾を得ることなく、本規約をいつでも変更できるものとします。</li>
											<li>前項の変更を行う場合、当社は相談者等に本サイト上に公表して予告するものとします。ただし、変更が軽微かつ相談者等に特に不利益にならないと当社が判断した場合は、本サイト上で予告を行わないものとします。当該予告期間経過後に、相談者等が本サービスを利用した場合、相談者等は変更後の本規約の内容に同意したものとみなします。</li>
											<li>相談者が変更後の本規約に同意できないときは、相談者は、前項に定める予告期間中に当社に対してその旨書面又はメールで通知することにより、本サービスの利用を中止することができます。なお、相談者が、前項に定める予告期間中に通知を行わず、かつ変更後の本規約に同意しない場合は、変更後の本規約の適用開始日より自動的に本サービスの提供を停止されるものとします。</li>
											<li><p>前項に定める本サービスの提供が停止している期間中の相談者に関する取扱いについては、次の通りとします。</p>
												<ol>
													<li>補助金に関する相談の削除を希望する場合には即時に削除することができること。</li>
													<li>補助金に関する相談の掲載期間が進行すること。</li>
													<li>変更後の本規約に改めて同意する場合は、本サービスの利用を再開することができること。</li>
												</ol>
											</li>
										</ol>

										<h3>第４条（本サービスの内容）</h3>
										<ol>
											<li><p>本サービスにおいて、相談者が利用できるサービスは次の各号に定める通りとします。</p>
												<ol>
													<li>認定経営革新等支援機関が閲覧・回答できる補助金に関する相談の投稿</li>
													<li>その他当社が随時提供するサービス</li>
												</ol>
											</li>
											<li>相談者等は、本サービスで補助金に関する相談を投稿した場合、補助金に関する相談の概要及び相談者の業種が認定経営革新等支援機関以外の当社ウェブサイト閲覧者にも公開されることに同意するものとします</li>
											<li>本サービスで補助金に関する相談を投稿した場合、複数の認定経営革新等支援機関から相談者への連絡が行われることがあります。いずれの認定経営革新等支援機関に相談・依頼を行うかは、相談者の裁量によって選択するものであって、当社は一切関与せず、責任を負わないものとします。</li>
											<li>相談者は、本サービスで投稿した補助金に関する相談について、相談者が設定した掲載期間（なお、掲載期間の更新・事後的な変更は不可）が経過すると、認定経営革新等支援機関による情報購入及び連絡の有無にかかわらず、当社ウェブサイト上から削除されることに同意するものとします。</li>
											<li>相談者が投稿した補助金に関する相談は、当該投稿を行った相談者であっても修正することはできません。</li>
										</ol>

										<h3>第５条（本サービスの利用）</h3>
										<ol>
											<li>相談者は、本規約の定めに従い、本サービスを利用するものとします。</li>
											<li>本サービスの利用は、相談者等自身が行うものとし、代理・代行等による利用は認めません。</li>
											<li>相談者は本サービスを通じて相談者が発信する情報につき、一切の責任を負うものとし、当社及び認定経営革新等支援機関に何らの迷惑及び損害を与えないものとします。</li>
											<li>補助金に関する相談の当社ウェブサイト上への掲載は、相談希望者が当社ウェブサイト上での投稿処理を行った後に当社が相談希望者に送信するメールにおいて、相談希望者が投稿を確定する旨の処理を行わない限り、完了しません。</li>
										</ol>

										<h3>第６条（当社による利用等）</h3>
										<ol>
											<li>本サービスの利用にかかる統計的集計データ及び補助金に関する相談の集計データにかかる一切の権利は当社に帰属するものとし、当社は、これらのデータを当社の裁量により利用・公表等できるものとします。</li>
											<li>当社は、相談者が本サービスの利用に際して当社ウェブサイトに掲載・送信した表現物（以下「当社ウェブサイト掲載物」といいます。）につき、リターゲティング広告を含めた本サービスの広告・宣伝・紹介、本サービスの提供、統計データの作成のため、無償で複製、公衆送信、譲渡、翻案及び翻訳等の利用（掲載又は転載等の利用を行う媒体の仕様、デザイン又はコンセプト等に合わせるために、当社ウェブサイト掲載物を修正又は改変等を行うことを含みます。）を行うことができるものとします。</li>
											<li>当社は、本サービスの運営及び保守管理並びに当社の事業上で必要と判断した場合、相談者等の本サービスの利用履歴その他お問い合わせ内容、回答、認定経営革新等支援機関による相談者への回答内容、当社ウェブサイト掲載物、相談者著作物等などを知得及び利用する場合があります。</li>
										</ol>

										<h3>第７条（禁止行為）</h3>
										<ol>
											<li><p>相談者等は、本サービスの利用にあたり、次の各号のいずれかに該当する行為をしてはならないものとします。</p>
												<ol>
		<li>虚偽の情報を使用して本サービスを利用する行為</li>
		<li>当社、認定経営革新等支援機関、他の相談者及び第三者の知的財産権、肖像権、プライバシーの権利、名誉、その他の権利又は利益を侵害又は侵害を助長する行為</li>
		<li>本規約に違反する行為</li>
		<li>法令又は公序良俗に関する行為</li>
		<li>特定の法人、団体又は個人を非難若しくは誹謗中傷する行為</li>
		<li>当社が許可する当社ウェブサイト内の所定のスペースを除き、メールアドレス又は電話番号等の連絡先を掲載し又は宣伝する行為及びこれらに類する行為</li>
		<li>政治的又は宗教的思想を含む情報を提供する行為及び政治的又は宗教的な勧誘を行う行為</li>
		<li>本サービスと競合するサービス等を宣伝する行為及びこれに類する行為</li>
		<li>本サービスの目的と合致しない外部ウェブサイトへのハイパーリンクを設置する行為及び第三者のために有償で外部ウェブサイトへのハイパーリンクを設置する行為並びにこれらに類する行為</li>
		<li>検索エンジンスパム行為及び第三者の検索エンジンスパム行為を直接又は間接的に助長する行為並びにこれらに類する行為</li>
		<li>本サービスを通じて、第三者の運営するアフィリエイトプログラムに参加する行為及びこれに類する行為</li>
		<li>当社ウェブサイト内で不当に情報を操作する行為</li>
		<li>不正アクセス、改ざん及びコンピューター・ウィルスや有害なコンピューター・プログラム等により当社ウェブサイトを攻撃する行為</li>
		<li>本サービス及び本サービスに関連して使用されている全てのソフトウェア又はプログラム等についてリバースエンジニアリング、逆コンパイル、逆アセンブルその他改変等を行う行為</li>
		<li>認定経営革新等支援機関の判断に錯誤又は誤解を与えるおそれのある行為</li>
		<li>認定経営革新等支援機関より投稿された回答に対し、自動的に応答する等の機能を有する装置、ソフトウェア、アルゴリズム等を利用する行為</li>
		<li>不当に情報を操作することを目的として利用する行為</li>
		<li>不当な要求を執拗に繰り返すなどして、認定経営革新等支援機関による回答や対応を強要する行為</li>
		<li>短期間に同一内容の補助金に関する相談を2回以上投稿する行為</li>
		<li>猥褻な情報若しくは青少年に有害な情報の送信、その他猥褻又は青少年に有害な言動を発する行為</li>
		<li>異性交際に関する情報の送信、その他異性交際を目的として本サービスを利用する行為</li>
		<li>認定経営革新等支援機関の個人情報を含む内容を認定経営革新等支援機関より承諾を得た範囲を超えて、利用、提供又は開示等をする行為</li>
		<li>認定経営革新等支援機関の回答を批判、批評し、あるいはその内容を、承諾を得ずに公開する行為</li>
		<li>公正な取引慣行に反する行為</li>
		<li>その他当社が不適切と判断する行為</li>
												</ol>
											</li>
											<li>当社は、相談者等の本サービスの利用時の行為が前項各号のいずれかに該当し、又は該当するおそれがある場合には、相談者等に事前に通知することなく、当該行為の全部又は一部を停止させ、又は当該行為により当社ウェブサイトに掲載された情報（メッセージを含みますが、これに限られません。）の全部又は一部を削除する等かかる違反行為を排除するあらゆる措置を講じることができるものとします。当社は、かかる停止、削除等の措置を講じたことにより相談者等に生じた損害から、一切免責されるものとします。</li>
										</ol>

										<h3>第８条（保証の否認）</h3>
										<ol>
											<li>当社は、認定経営革新等支援機関が本サービスにおいて掲載及び提供する個々の回答内容の正確性、完全性、有効性及び品質、並びに認定経営革新等支援機関の能力、資格、権能を有することにつき、相談者等に対し保証しません。</li>
											<li>当社は、相談者と認定経営革新等支援機関との間で行われる補助金に関する相談、情報の送受信、コミュニケーション等に伴い相談者又は認定経営革新等支援機関が何らかの損害を被ったとしても、当社の責めに帰すべき事由がある場合を除き、一切責任を負いません。</li>
											<li>当社は、相談者及び認定経営革新等支援機関が有する個々の目的との適合性を保証するものではありません。</li>
											<li>当社は、本サービスの運用にその時点での技術水準を前提に最善を尽くしますが、障害が生じないことを保証するものではありません。</li>
										</ol>

										<h3>第9条（免責）</h3>
										<ol>
											<li>相談者等は、本サービスの利用が相談者等に適用される法令及び相談者等の所属する業界団体の規則等に違反するか否かを自己の費用と責任により調査するものとし、当社は、相談者等による本サービスの利用が相談者等に適用される法令及び相談者等の所属する業界団体の規則等に照らし、適法であること又は規則等に違反しないことを保証しません。</li>
											<li>当社は、本サービスの内外を問わず、相談者等と認定経営革新等支援機関の間で行われる連絡、コミュニケーション等には一切関与せず、本サービスの利用に関連して相談者等が負担した費用並びに相談者等及び認定経営革新等支援機関が被った損害（本サービスを通じた事故、違法行為、紛争、債務不履行、契約の解除等による損害を含みますが、これらに限りません。）について、一切補償しません。</li>
											<li>当社ウェブサイトから他のウェブサイトへのリンクや、第三者から当社ウェブサイトへのリンクが設定される場合、当社は当社ウェブサイト以外のウェブサイト及びそれにより得られる情報に関して、理由の如何を問わず、一切の責任を負わないものとします。</li>
											<li>当社は、通信回線やコンピューターなどの障害による本サービスの提供の中断、停止、利用不能、変更及び当社による本規約に基づく相談者の情報及び相談者著作物等の削除等に関連して相談者が被った損害について、賠償する責任を一切負わないものとします。</li>
											<li><p>当社はいかなる状況においても、またいかなる第三者に対しても、次の各号に定める事項について⼀切責任を負いません。</p>
												<ol>
													<li>本サービスを通じて提供される情報の入手、収集、編纂、解釈、分析、編集、翻訳、送付、伝達、配布に関わる誤り（当社の不注意によるか、その他によるかを問いません。）又はその他の状況により（全部・⼀部を問いません。）引き起こされ、発⽣し、若しくはこれらに起因する損失又は損害</li>
													<li>本サービスを通じて提供される情報の使用又は使用不可により発⽣する、あらゆる種類の直接的、間接的、特別、二次的、又は付随的な損害（このような損害の可能性について当社が事前に通告を受けたかどうかを問いません。）</li>
												</ol>
											</li>
										</ol>

										<h3>第１０条（サービス提供の一時停止）</h3>
										<ol>
											<li><p>当社は、次の各号のいずれかに該当する場合には、相談者等に事前に通知することなく、本サービスの全部又は⼀部の提供を停止又は中断することができるものとします。</p>
												<ol>
													<li>システムの点検又は保守を緊急に行う場合</li>
													<li>コンピューター、通信回線が事故や第三者からの攻撃によって停止した場合</li>
													<li>地震、落雷、火災などの不可抗力によって本サービスの運営ができなくなった場合</li>
													<li>その他、当社が停止又は中断を行う必要があると判断した場合</li>
												</ol>
											</li>
											<li>当社は、本条に基づき当社が行った措置によって相談者等に生じた損害について⼀切の責任を負いません。</li>
										</ol>

										<h3>第１１条（サービスの変更・追加・廃止）</h3>
										<ol>
											<li>当社は、理由の如何を問わず、相談者等に事前に通知することなく、本サービスの内容の全部又は⼀部を変更又は追加することができるものとします。</li>
											<li>当社は、相談者等に通知の上、本サービスの全部又は⼀部を中止又は廃止することができるものとします。ただし、本サービスの全部又は⼀部を中止又は廃止する緊急の必要性がある場合は、事前の通知を行うことなく、中止又は廃止をすることができるものとします。</li>
											<li>当社は、本サービスを変更、追加、中止又は廃止したことにより相談者等又は第三者に生じた損害について、⼀切責任を負わないものとします。</li>
										</ol>

										<h3>第１２条（投稿削除等）</h3>
										<ol>
											<li><p>相談者等が、次の各号の一つに該当する場合、当社は、当該相談者等に対して事前に通知することなく、当該相談者等による補助金に関する相談の掲載削除、補助金に関する相談の掲載事前停止、当社ウェブサイトへのアクセス禁止を含む利用停止等の適切な措置をとることができるものとします。なお、当社は当該措置を行った理由について、当該相談者等に開⽰する義務を負いません。</p>
												<ol>
													<li>本規約に違反したとき</li>
													<li>当社に提供された情報の全部又は一部につき虚偽、誤記又は記載漏れが判明した場合</li>
													<li>過去に利用停止等の措置を受けたことがあることが判明した場合</li>
													<li>死亡した場合、又は後見開始、保佐開始若しくは補助開始の審判を受けた場合</li>
													<li>当社のコンピューターに保存されているデータを当社に無断で閲覧、変更若しくは破壊したとき、又はそのおそれがあると当社が判断したとき</li>
													<li>本サービス利用態様が公序良俗に反し又は相談者等としてふさわしくないと当社が判断したとき</li>
													<li><p>自ら又は第三者を利用して、次のaからeのいずれかに該当する行為を行ったとき</p>
														<ol>
															<li>暴力的な要求行為</li>
															<li>法的な責任を超えた不当な要求行為</li>
															<li>取引に関して、脅迫的な言動をし、又は暴力を用いる行為</li>
															<li>風説を流布し、偽計を用い又は威力を用いて当社の信用を毀損し、又は当社の業務を妨害する行為</li>
															<li>その他、上記aからdに準ずる行為</li>
														</ol>
													</li>
													<li>その他当社が本サービスの提供を継続することが不適当であると判断したとき</li>
												</ol>
											</li>
											<li>前項に定める措置は、当社から当該相談者等に対する損害賠償請求を行うことを妨げるものではありません。また、前項に定める措置を行ったことについて、当社は⼀切の損害賠償義務を負いません。</li>
										</ol>

										<h3>第１３条（当社による個人情報等の取扱い）</h3>
										<p>
		当社は、相談者等が当社のサービスを通じて当社に提供した個人情報、その他の相談者等が当社に提供したすべての情報を当社の「プライバシーポリシー」に基づき、適切に取り扱うものとします。
										</p>

										<h3>第１４条（問い合わせ方法等）</h3>
										<ol>
											<li>相談者等の当社への問い合わせは、電子メール、本サイトを通じた方法、その他当社が定める方法によるものとします。</li>
											<li>相談者等からの問い合わせがあった場合、問い合わせへの回答の有無・内容・程度・期限その他回答に関する一切については当社の裁量により行われるものとします。</li>
										</ol>

										<h3>第１５条（権利義務の譲渡等の禁止）</h3>
										<p>
		相談者等は、当社の書面による事前の承諾無く、本規約上の地位又は本規約に基づく権利若しくは義務を、第三者に譲渡若しくは担保提供し、又は引き受けさせる等の処分を行ってはならないものとします。
										</p>

										<h3>第１６条（反社会的勢力への不関与）</h3>
										<ol>
											<li>相談者等は、自身が暴力団、暴力団員、暴力団関係企業、総会屋、社会運動標ぼうゴロ、政治運動標ぼうゴロ、特殊知能暴力集団、その他反社会的勢力（以下｢暴力団等反社会的勢力｣といいます。）に所属又は該当せず、かつ、暴力団等反社会的勢力と関与していないことを表明し、将来にわたっても所属若しくは該当、又は関与しないことを確約するものとします。</li>
											<li>当社は、相談者等が暴力団等反社会的勢力に所属若しくは該当する、又は正当な理由なく関与していると判断した場合、当該相談者等に事前に通知等を行うことなく、当該相談者等の本サイトへのアクセスを禁止し、当該相談者等が行った投稿の削除等の適切な措置を講じることがあります。</li>
											<li>当社は前項の措置による相談者等の損害を賠償する責任を⼀切負わないものとします。</li>
										</ol>

										<h3>第１７条 （損害賠償額の上限）</h3>
										<p>
		当社が相談者等に対し何らかの損害賠償義務を負う場合においても、当社の相談者等に対する損害賠償の金額は、当社の故意又は重大な過失による場合を除き、1万円を上限とします。
										</p>

										<h3>第１８条 （存続規定）</h3>
										<p>
		当社ウェブサイト上における補助金に関する相談の掲載が終了した場合でも、第4条第3項、第5条第3項、第６条から第9条、第10条第2項、第11条第3項、第12条から第20条の規定についてはその効力がなお存続するものとします。
										</p>

										<h3>第１９条（分離可能性）</h3>
										<p>
		本規約のいずれかの条項又はその⼀部が、消費者契約法その他の法令等により無効又は執行不能と判断された場合であっても、本規約の残りのその他の条項、及び⼀部が無効又は執行不能と判断された条項の残りの部分は、継続して完全にその効力を有するものとします。
										</p>

										<h3>第２０条（準拠法、専属的合意管轄）</h3>
										<p>
		相談者等と当社との間における紛争については、日本国法を適用し、大阪地方裁判所を第⼀審の専属的合意管轄裁判所とします。また、本規約は、日本国法に準拠し、解釈されるものとします。
										</p>
									</div>
								</div>
							</div>
						</div>
					</section>
					<div class="section send_area">
						<div class="sitewrap">
							<div class="send_btns">
								<label class="btn_warp next"><span><input @click="toConfirmPage" type="button" value="送信内容を確認"></span></label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
  </div>
</template>
<script>
import moment from 'moment'
var postal_code = require('japan-postal-code')
import { JOBS, SYSTEM_OTHER, SYSTEM_MISS, SYSTEM_CONFIRM, AMOUNTS, PRICES, PREFECTURES, SUPPORT_PRICES } from '../../const'
export default {
  data() {
    return {
			JOBS: JOBS,
			SYSTEM_OTHER: SYSTEM_OTHER,
			SYSTEM_MISS: SYSTEM_MISS,
			SYSTEM_CONFIRM: SYSTEM_CONFIRM,
			AMOUNTS: AMOUNTS,
			PRICES: PRICES,
			PREFECTURES: PREFECTURES,
			SUPPORT_PRICES: SUPPORT_PRICES,

			system_confirms: [],
			system_misss: [],
			system_others: [],
			com_name: null,
			job: null,
			zipcode: null,
			prefecture: null,
			city: null,
			building: null,
			amount: null,
			income: null,
			telephone: null,
			fax: null,
			email: null,
			tanto_name: null,
			department_name: null,
			role_name: null,
			price: null,
			message_title: null,
			message_content: null,
			expired_at: null
    }
  },
	created() {
		this.expired_at = moment().add(1, 'month').format('YYYY-MM-DD')
		window.document.title = '事業者相談フォーム | 補助金活用.COM'
		$('meta[name=description]').attr('content','事業者×支援機関マッチングサイト補助金活用.COMの「事業者相談フォーム」ページです。事業者として相談をするする場合、本フォームより「事業者相談入力欄」を入力してください。支援機関新規登録、その他のお問い合わせは専用のフォームからお問い合わせください。')
		$('meta[name=og:description]').attr('content','事業者×支援機関マッチングサイト補助金活用.COMの「事業者相談フォーム」ページです。事業者として相談をするする場合、本フォームより「事業者相談入力欄」を入力してください。支援機関新規登録、その他のお問い合わせは専用のフォームからお問い合わせください。')
	},
	mounted() {
		if (localStorage.getItem('com_name')) {
			this.com_name = localStorage.getItem('com_name')
      this.job = parseInt(localStorage.getItem('job'))
      this.zipcode = localStorage.getItem('zipcode')
      this.prefecture = localStorage.getItem('prefecture')
      this.city = localStorage.getItem('city')
      this.building = localStorage.getItem('building') == 'null' ? null : localStorage.getItem('building')
      this.amount = parseInt(localStorage.getItem('amount'))
      this.income = parseInt(localStorage.getItem('income'))
      this.telephone = localStorage.getItem('telephone')
      this.fax = localStorage.getItem('fax') == 'null' ? null : localStorage.getItem('fax')
      this.email = localStorage.getItem('email')
      this.tanto_name = localStorage.getItem('tanto_name')
      this.department_name = localStorage.getItem('department_name') == 'null' ? null : localStorage.getItem('department_name')
      this.role_name = localStorage.getItem('role_name') == 'null' ? null : localStorage.getItem('role_name')
      this.price = parseInt(localStorage.getItem('price'))
      this.message_title = localStorage.getItem('message_title')
      this.message_content = localStorage.getItem('message_content')
      this.expired_at = localStorage.getItem('expired_at')
			this.system_confirms = localStorage.getItem('system_confirms').split('、').map(item => {
        return parseInt(item)
      })
      this.system_misss = localStorage.getItem('system_confirms').split('、').map(item => {
        return parseInt(item)
      })
      this.system_others = localStorage.getItem('system_confirms').split('、').map(item => {
        return parseInt(item)
      })
		}
	},
	methods: {
		changeSystemConfirms(event, item, index) {
			if (event.target.checked == true) {
				this.system_confirms.push(index)
			} else {
				let temp = this.system_confirms.slice()
				const idex = temp.indexOf(index)
				temp.splice(idex, 1)
				this.system_confirms = temp
			}
		},
		changeSystemMisss(event, item, index) {
			if (event.target.checked == true) {
				this.system_misss.push(index)
			} else {
				let temp = this.system_misss.slice()
				const idex = temp.indexOf(index)
				temp.splice(idex, 1)
				this.system_misss = temp
			}
		},
		changeSystemOthers(event, item, index) {
			if (event.target.checked == true) {
				this.system_others.push(index)
			} else {
				let temp = this.system_others.slice()
				const idex = temp.indexOf(index)
				temp.splice(idex, 1)
				this.system_others = temp
			}
		},
		async changeZip() {
			if (!this.zipcode || this.zipcode.length != 7) {
        this.$swal('', '郵便番号の形式が違います')
        return
      }

      let self = this
      postal_code.get(this.zipcode, function(address) {
        self.prefecture = address.prefecture
        self.city = address.city + address.area
      })
		},
		toConfirmPage() {
			// validation
			if (this.system_confirms.length + this.system_misss.length + this.system_others.length == 0) {
				this.$swal('', '相談内容を選択してください')
				return
			}

			if (!this.com_name) {
				this.$swal('', '会社名を入力してください')
				return
			}

			if (this.job == null) {
				this.$swal('', '業種を選択してください')
				return
			}

			if (!this.zipcode) {
				this.$swal('', '郵便番号を入力してください')
				return
			}

			if (this.prefecture == null) {
				this.$swal('', '都道府県を選択してください')
				return
			}

			if (!this.city) {
				this.$swal('', '市区町村番地を入力してください')
				return
			}

			if (this.amount == null) {
				this.$swal('', '従業員規模を選択してください')
				return
			}

			if (this.income == null) {
				this.$swal('', '年商を選択してください')
				return
			}

			if (!this.telephone) {
				this.$swal('', '電話番号を入力してください')
				return
			}

			if (!this.email) {
				this.$swal('', 'メールアドレスを入力してください')
				return
			}

			if (!this.tanto_name) {
				this.$swal('', '担当者氏名を入力してください')
				return
			}

			if (!this.message_title) {
				this.$swal('', '相談内容概略を入力してください')
				return
			}

			if (!this.message_content) {
				this.$swal('', '相談内容詳細を入力してください')
				return
			}

			if (!this.expired_at) {
				this.$swal('', '掲載期限を設定してください')
				return
			}

			localStorage.setItem('system_confirms', this.system_confirms.join('、'))
			localStorage.setItem('system_misss', this.system_misss.join('、'))
			localStorage.setItem('system_others', this.system_others.join('、'))
			localStorage.setItem('com_name', this.com_name)
			localStorage.setItem('job', this.job)
			localStorage.setItem('zipcode', this.zipcode)
			localStorage.setItem('prefecture', this.prefecture)
			localStorage.setItem('city', this.city)
			localStorage.setItem('building', this.building)
			localStorage.setItem('amount', this.amount)
			localStorage.setItem('income', this.income)
			localStorage.setItem('telephone', this.telephone)
			localStorage.setItem('fax', this.fax)
			localStorage.setItem('email', this.email)
			localStorage.setItem('tanto_name', this.tanto_name)
			localStorage.setItem('department_name', this.department_name)
			localStorage.setItem('role_name', this.role_name)
			localStorage.setItem('price', this.price)
			localStorage.setItem('message_title', this.message_title)
			localStorage.setItem('message_content', this.message_content)
			localStorage.setItem('expired_at', moment(this.expired_at).format('YYYY-MM-DD'))

			this.$router.push({ name: 'consultant_form.confirm' })
		}
	}
}
</script>
<style lang="scss" scoped>
</style>