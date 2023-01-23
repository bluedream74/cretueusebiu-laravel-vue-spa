<template>
  <div class="register__container common_page form_page register_form">
    <main>
			<section class="section mv_area">
				<h1>支援機関新規登録</h1>
				<div class="topicpath">
					<div class="sitewrap">
						<ol id="pan">
							<li><router-link :to="{ name: 'home' }">TOP</router-link></li>
							<li><span>支援機関新規登録</span></li>
						</ol>
					</div>
				</div>
			</section>
			<div class="content_area form_wrap">
				<div class="h-adr">
					<span class="p-country-name" style="display:none;">Japan</span>
					<section class="section lead">
						<div class="sitewrap">
							<h2 class="h_style01">支援機関を新規登録する</h2>
							<p class="lead_style">以下のフォームより登録内容をご入力ください。</p>
							<ul class="txt_indent texts text_link">
								<li>・事業者相談、その他のお問い合わせは専用のフォームをご利用ください。</li>
								<li>・赤色の<b class="red">（必須）</b>がついた項目は必須入力項目です。 お忘れのないようご入力ください。</li>
								<li>・ご入力いただいた情報は、<a href="../privacy/" target="_blank">プライバシーポリシー</a>に基き厳重に管理いたします。</li>
								<li>・尚、反映までにお時間がかかる場合がございますのでご了承ください。</li>
								<li>※営業時間： 月曜～土曜／9:00～18:00　定休日： 日曜・祝日</li>
							</ul>
						</div>
					</section>
					<section class="section area01">
						<div class="sitewrap">
							<h2 class="h_style01">認定支援機関情報入力欄</h2>
							<div class="table_style">
								<dl class="required">
									<dt>認定支援機関ID番号<i>必須</i></dt>
									<dd><div class="form_el"><input type="tel" name="certificationId" v-model="kikan_id" required placeholder="※桁数は12桁となります。"></div></dd>
								</dl>
								<dl class="required">
									<dt>会社名<i>必須</i></dt>
									<dd><div class="form_el"><input type="text" name="companyName" v-model="com_name" required placeholder="株式会社AA"></div></dd>
								</dl>
								<dl class="required">
									<dt>フリガナ<i>必須</i></dt>
									<dd><div class="form_el"><input type="text" name="companyKana" v-model="com_huri_name" required placeholder="カブシキガイシャエーエー"></div></dd>
								</dl>
								<dl class="required">
									<dt>担当者氏名<i>必須</i></dt>
									<dd><div class="form_el inline"><input type="text" name="cip" v-model="tanto_name" required placeholder="山田 太郎"></div></dd>
								</dl>
								<dl class="">
									<dt>部署名</dt>
									<dd><div class="form_el inline"><input type="text" name="department" v-model="department_name" placeholder="営業部"></div></dd>
								</dl>
								<dl class="">
									<dt>役職名</dt>
									<dd><div class="form_el inline"><input type="text" name="job" v-model="role_name" placeholder="部長"></div></dd>
								</dl>
								<dl class="required">
									<dt>法人／個人事業主<i>必須</i></dt>
									<dd><div class="form_el"><div class="labels">
										<label for="companyType01"><input type="radio" name="companyType" id="companyType01" value="法人" @click="() => {
											is_personal = 0
										}" :checked="is_personal == 0"><span>法人</span></label>
										<label for="companyType02"><input type="radio" name="companyType" id="companyType02" value="個人事業主" @click="() => {
											is_personal = 1
										}" :checked="is_personal == 1"><span>個人事業主</span></label>
									</div></div></dd>
								</dl>
								<dl class="required">
									<dt>種別<i>必須</i></dt>
									<dd><div class="form_el">
										<div class="select_wrap">
											<select v-model="kind">
												<option :value="index" v-for="(item, index) in JOB_KINDS" :key="index">{{item}}</option>
											</select>
										</div>
									</div></dd>
								</dl>
								<dl class="required">
									<dt>会社所在地<i>必須</i></dt>
									<dd><div class="form_el inline">
										<span>〒</span><input type="tel" name="zip" @change="changeZip" v-model="zipcode" class="p-postal-code" size="8" maxlength="8" placeholder="0000000">
										<div class="select_wrap">
											<select name="pref" class="p-region-id" v-model="prefecture">
												<option :value="null">--</option>
												<option v-for="(item, index) in PREFECTURES" :key="index" :value="item">{{ item }}</option>
											</select>
										</div>
									</div></dd>
								</dl>
								<dl class="required">
									<dt>市区町村番地<i>必須</i></dt> 
									<dd><div class="form_el"><input type="text" name="address" required placeholder="〇〇区〇〇〇〇〇〇〇" class="p-locality p-street-address p-extended-address" v-model="city" /></div></dd>
								</dl>
								<dl class="">
									<dt>建物名・部屋番号など</dt>
									<dd><div class="form_el"><input type="text" name="address2" placeholder="〇〇ビル5F" v-model="building" /></div></dd>
								</dl>
								<dl class="">
									<dt>電話番号</dt>
									<dd><div class="form_el"><input type="tel" name="tel" placeholder="※桁数は11桁となります。" v-model="telephone" /></div></dd>
								</dl>
								<dl class="">
									<dt>FAX</dt>
									<dd><div class="form_el"><input type="tel" name="fax" placeholder="0300000001" v-model="fax" /></div></dd>
								</dl>
								<dl class="required">
									<dt>メールアドレス<i>必須</i></dt> 
									<dd><div class="form_el"><input type="email" name="email" required placeholder="aaa@gmail.com" v-model="email" /></div></dd>
								</dl>
								<dl class="required">
									<dt>マイページパスワード<i>必須</i></dt> 
									<dd><div class="form_el"><input type="password" name="password" required v-model="password" placeholder="8桁から12桁の半角英数字にて入力ください" maxlength="12" minlength="8" /></div></dd>
								</dl>
								<dl class="">
									<dt>PRポイント</dt> 
									<dd><div class="form_el"><textarea placeholder="過去に○○件の補助金の申請を受給までサポート。 補助金支援のプロフェッショナルです。 ぜひ私共におまかせください。 Webサイト⇒https://aaaaaaaaaa.co.jp" v-model="introduction"></textarea></div></dd>
								</dl>
							</div>
						</div>
					</section>
					<section class="section area01">
						<div class="sitewrap">
							<h2 class="h_style01">支援可能条件入力欄</h2>
							<p class="lead_style">「支援可能内容」「支援可能業種」「支援可能年商」「支援可能従業員規模」の4項目すべての条件を満たす場合マイページに相談が表示されます。</p>
							<div class="table_style">
								<dl class="required">
									<dt>支援可能内容<i>必須</i></dt>
									<dd><div class="form_el"><div class="labels">
										<label :for="'conditions_1_'+(index+1)" v-for="(item, index) in CONTENTS" :key="index"><input type="checkbox" :id="'conditions_1_' + (index + 1)" :value="index" name="conditions_1" :checked="available_contents.includes(index)" @change="changeContent($event, item, index)"><span>{{item}}</span></label>
									</div></div></dd>
								</dl>
								<dl class="required">
									<dt>支援可能業種<i>必須</i></dt>
									<dd><div class="form_el"><div class="labels">
										<label :for="'conditions_2_'+(index + 1)" v-for="(item, index) in JOBS" :key="index"><input type="checkbox" :id="'conditions_2_' + (index + 1)" :value="index" name="conditions_2" :checked="available_jobs.includes(index)" @change="changeJob($event, item, index)"><span>{{ item }}</span></label>
									</div></div></dd>
								</dl>
								<dl class="required">
									<dt>支援可能年商<i>必須</i></dt>
									<dd><div class="form_el"><div class="labels">
										<label :for="'conditions_3_'+(index+1)" v-for="(item, index) in PRICES" :key="index"><input type="checkbox" :id="'conditions_3_'+(index+1)" :value="index" name="conditions_3" :checked="available_prices.includes(index)" @change="changePrice($event, item, index)"><span>{{ item }}</span></label>
									</div></div></dd>
								</dl>
								<dl class="required">
									<dt>支援可能従業員規模<i>必須</i></dt>
									<dd><div class="form_el"><div class="labels">
										<label :for="'conditions_4_'+(index+1)" v-for="(item, index) in AMOUNTS" :key="index"><input type="checkbox" :id="'conditions_4_'+(index+1)" :value="index" name="conditions_4" :checked="available_amounts.includes(index)" @change="changeAmount($event, item, index)"><span>{{ item }}</span></label>
									</div></div></dd>
								</dl>
							</div>
							<div class="terms_box">
								<h2 class="h_style01">認定経営革新等支援機関用利用規約</h2>
								<div class="scroll_wrap">
									<div class="article_body edit_wrap">
										<h2>認定経営革新等支援機関用利用規約</h2>
		<h3>第１条（本規約の目的及び本規約の承諾）</h3>
		<ol>
			<li>「補助金活用.com」（以下「本サイト」といいます。）をご利用の認定経営革新等支援機関の皆さまは、本サービスをご利用頂くにあたり、本規約の全文をお読み頂いたうえで、本規約の全ての条項について承諾頂く必要があります。</li>
			<li>本サービスをご利用頂いた場合、本規約の内容を理解しており、かつ、本規約の全ての条項について承諾したものとみなします。</li>
			<li>本規約の内容は、必要に応じて変更しますので、本サービスをご利用する際には、最新の利用規約を確認して下さい。</li>
			<li>本サービス（第２条で定義します）は、相談者（第２条で定義します）と会員（第２条で定義します）との間の相談の機会を提供するために、会員に対して相談者の情報を開示するものにすぎず、株式会社八咲（以下「当社」といいます。）は相談者と会員の間で生じる問題に関して一切の責任を負いません。また、当社は、会員が相談者から相談及び依頼を受けることに関して、会員及び相談者のいずれからも報酬、紹介料その他の対価を受領致しません。ただし、当社は法令に違反しない範囲内で行われる相談者情報の開示に対する料金を会員から受領します。</li>
		</ol>

		<h3>第２条（用語の定義）</h3>
		<p>本規約において使用する用語の意味は、各々次の各号に定めるとおりとします。</p>
		<ol>
			<li>「本サービス」とは、当社が運営する本サイト上で提供する相談者情報開示サービスその他の本サイト上で提供するサービスをいいます。</li>
			<li>「登録希望者」とは、本サービスへの会員登録を希望する認定経営革新等支援機関をいいます。</li>
			<li>「会員」とは、本規約に従い本サービスに会員登録している認定経営革新等支援機関をいいます。</li>
			<li>「相談者」とは、本サービスを利用して、認定経営革新等支援機関に相談を希望する事業者をいいます。</li>
			<li>「本相談」とは、相談者が本サービス上で投稿する相談のことをいいます。</li>
			<li>「本サービス利用者」とは、登録希望者及び会員をいいます。</li>
			<li>「マイページ」とは、会員のプロフィール・過去の回答一覧・課金状況確認を行うことのできる各会員に与えられる本サイト上のページをいいます。</li>
			<li>「ログイン情報」とは、会員が本サービスにログインするために必要なメールアドレス及びパスワードをいいます。</li>
		</ol>

		<h3>第３条（本規約の適用及び範囲）</h3>
		<ol>
			<li>本規約は、本サービスの提供条件及び本サービスの利用に関する当社と本サービス利用者との間の権利義務関係を定めることを⽬的とし、本サービス利用者と当社との間の本サービスの利用に関わる⼀切の関係に適用されます。</li>
			<li>当社が本サイト上で掲載する本サービスの利用に関するルールは、そのルールの名称を問わず、本規約の⼀部を構成するものとします。</li>
			<li>本規約の内容と、前項のルールその他の本規約外における本サービスの説明等とが⽭盾・抵触する場合は、当該説明等の規定を優先させる旨の特段の定めがない限り、本規約の規定が優先して適用されるものとします。</li>
		</ol>
		<h3>第４条（本規約の変更）</h3>
		<ol>
			<li>当社は、本サービス利用者の承諾を得ることなく、本規約をいつでも変更できるものとします。本規約が変更された場合、本サービス利用者は、変更後の本サービスについて、変更後の本規約に従うものとします。</li>
			<li>前項の変更を行う場合、当社は会員に対し、予告期間及び変更後の本規約の内容を当社が定める方法で通知、又は本サービス利用者に本サイト上に公表して予告するものとします。ただし、変更が軽微かつ本サービス利用者に特に不利益にならないと当社が判断した場合は、通知及び本サイト上で予告を行わないものとします。当該予告期間経過後に、本サービス利用者が本サービスを利用した場合、本サービス利用者は変更後の本規約の内容に同意したものとみなします。</li>
			<li>会員が変更後の本規約に同意できないときは、会員は、前項に定める予告期間中に当社に対してその旨書面又はメールで通知することにより、本サービスの利用を中止することができます。なお、会員が、前項に定める予告期間中に通知を行わず、かつ変更後の本規約に同意しない場合は、変更後の本規約の適用開始日より自動的に本サービスの提供を停止されるものとします。</li>
			<li><p>前項に定める本サービスの提供が停止している期間中の会員に関する取扱いについては、次の通りとします。</p>
				<ol>
					<li>退会を希望する場合には退会することができること。</li>
					<li>変更後の本規約に改めて同意する場合は、本サービスの利用を再開することができること。</li>
				</ol>
			</li>
		</ol>
		<h3>第５条（会員登録の申込み）</h3>
		<ol>
			<li>相談者の詳細情報を閲覧する等当社が定めるサービスを利用するためには、登録申込を行い、会員になる必要があります。</li>
			<li>主務大臣による認定を受けた認定経営革新等支援機関のみ会員として登録することができます。</li>
			<li>会員登録は無料です。</li>
			<li>登録希望者は、当社の用意する申込手段で会員登録の申し込みを行い、当社が承諾する旨の通知を発した時点で、会員登録が完了し会員になります。</li>
			<li><p>登録希望者が次の各号のいずれかに該当し、又は該当するおそれがあると当社が判断した場合、当社は当該登録希望者からの申込みを承諾しないことがあります。この場合、当社は拒絶の理由に関し⼀切の説明義務及び損害賠償義務を負いません。</p>
				<ol>
					<li>前項に定める申込みに不備（虚偽、誤記、記⼊漏れを含みますが、これらに限りません。）がある場合</li>
					<li>登録希望者が重複して会員登録の申し込みを行った場合</li>
					<li>登録希望者が過去に本規約違反等をしたことにより、会員登録の取消し、利用停止などの措置が行われたことがある場合</li>
					<li>登録希望者が暴力団等反社会的勢力（第２２条にて定義します。）と関係を有し、又は公序良俗に反する事業を自ら行っている場合</li>
					<li>登録希望者が未成年者、成年被後見人、被保佐人又は被補助人のいずれかであり、法定代理人、後見人、保佐人又は補助人の同意等を得ていなかった場合</li>
					<li>その他、登録希望者を会員登録することが不適切であると当社が判断した場合</li>
				</ol>
			</li>
		</ol>

		<h3>第６条（登録情報の変更、当社からの通知）</h3>
		<ol>
			<li>会員は、当社に届け出ているメールアドレスに変更が生じた場合には、速やかにマイページ上で所定の変更⼿続を行う方法により、登録内容の変更届出を行うものとします。登録内容の変更がなされなかったことにより生じた損害については、全て当該会員が負うものとし、当社は⼀切の責任を負いません。</li>
			<li>会員に対する当社からの通知は、通知時において、マイページに登録されている会員のメールアドレスにメールを送信する、又は本サイト上で公表することをもって通知したものとみなします。</li>
			<li>会員は、当社から会員宛に送信されるメールの受信を拒否する設定等を行ってはならないものとし、受信拒否設定や会員のメールアドレスが変更された等の事情により、当該会員に配信されたメールがエラー等により不着であった場合でも、当社からの通知の発信時をもって会員へ通知がなされたものとみなします。</li>
			<li>当社は、当該会員に配信されたメールがエラー等により不着となった場合、当該メールアドレスへのメールの配信を止めることができるものとします。</li>
			<li>前2項の場合に、会員が当社からの通知を受領できなかったことで、会員に損害が生じたとしても、当社は⼀切の責任を負いません。</li>
		</ol>

		<h3>第７条（パスワード等の管理）</h3>
		<ol>
			<li>会員には、登録時にパスワードを設定していただきます。会員は、自身で設定したパスワードの管理責任を負うものとし、当該パスワードを第三者に知られるような態様で管理してはならないものとします。この義務を怠ったことにより損害が生じても、当社は⼀切の責任を負いません。</li>
			<li>ログイン情報を用いてなされた本サービスの利用は、全て当該ログイン情報を管理する会員本人によりなされたものとみなし、当該ログイン情報の不正利用により当社又は第三者が損害を被った場合には、当該ログイン情報を使用した者が会員本人であるか否かを問わず、当該会員は当該損害を賠償するものとします。</li>
			<li>会員は、第1項で設定したパスワードを定期的に変更する義務があるものとします。この義務を怠ったことにより損害が生じても、当社は⼀切の責任を負いません。</li>
			<li><p>会員は、次の各号に従い、第三者から推測されにくいパスワードを使用する義務があるものとします。この義務を怠ったことにより損害が生じても当社は、⼀切の責任を負いません。</p>
				<ol>
					<li>半角英数8文字以上16文字以下の、英字（大文字、小文字問いません）及び数字のいずれも混ぜたパスワード</li>
					<li>他のウェブサイトやサービスなどで利用していない独自のパスワード</li>
					<li>住所、電話番号、⽣年⽉日など容易に推測できる情報に基づかないパスワード</li>
					<li>その他、第三者から推測されやすい要素・情報に基づかないパスワード</li>
				</ol>
			</li>
			<li>会員は、ログイン情報の使用及び管理に責任を持つものとします。会員の管理不⼗分、使用上の過誤、第三者の使用等により会員に損害が生じたとしても、当社は⼀切の責任を負いません。</li>
			<li>会員は、ログイン情報を第三者に利用させたり、貸与、譲渡、売買、質⼊等を行うことはできないものとします。</li>
			<li>当社は、⼀定回数以上にわたりログインに失敗したなど、会員のログイン情報に不正利用の可能性があると判断した場合は、当該ログイン情報による会員の利用を停止とすることができるものとします。その場合、会員は当社が定める⼿続に従い、利用停止の解除を行うこととします。なお、当社がこのような措置をとったことにより、当該会員が当該ログイン情報による使用ができず損害が生じても、当社は⼀切の責任を負いません。</li>
		</ol>


		<h3>第８条（相談者情報の開示）</h3>
		<ol>
			<li>会員は、相談者に対して支援可能と判断する分野につき、当社が定めるカテゴリーに応じて登録することで、当社より相談概要自動配信サービスを受けることができるものとします。
			</li><li>会員は、当社に相談者情報開示料を支払うことにより、相談者情報の詳細を確認することができるものとします。
			</li><li>会員は、前項の相談者情報開示料について、毎月末日を締切として、翌月の末日までに当社が定める銀行口座に振り込む方法で支払うものとします。なお、振込手数料は会員が負担するものとします。
			</li><li>会員は、開示された相談者情報記載の連絡先を確認した上で、自己の責任と費用で連絡を行うものとします。なお、連絡先に連絡を行ったにもかかわらず、連絡がとれない場合であっても、当社は、連絡がとれない理由の如何を問わず何らの補償及び対応は行わないものとし、一切の責任を負いません。
			</li><li>会員は、当社から開示を受けた相談者情報を相談者の相談概要に記載された相談における支援のために利用するものとします。
			</li><li>本サービスで掲載されている相談者情報は、既に他の会員に開示され、他の会員との間で相談に関する契約が締結されている場合があります。この場合、当社は、相談者情報開示料を一切返金しません。
		</li></ol>

		<h3>第９条（禁止行為）</h3>
		<ol>
			<li><p>本サービス利用者は、本サービスの利用に関し、次の行為を行ってはならないものとします。</p>
				<ol>
					<li>本サービスの提供する情報（全部、⼀部を問いません）を、当社の事前の同意なしに、複写もしくはその他の方法により再⽣、複製、送付、譲渡、頒布、配布、転売又はこれらの⽬的で使用するために保管する行為</li>
					<li>本規約に違反する行為</li>
					<li>当社の知的財産権を侵害する行為</li>
					<li>当社の名誉・信用等を侵害する行為</li>
					<li><p>相談者情報の利用目的に反する次に定める行為</p>
						<ul>
							<li>公序良俗に反する行為</li>
							<li>犯罪的行為又は犯罪的行為に結びつく行為</li>
							<li>わいせつな情報又は青少年に有害な情報の送信、その他わいせつ又は青少年に有害な言動を発する行為</li>
							<li>異性交際に関する情報の送信、その他異性交際を目的として本サービスを利用する行為</li>
						</ul>
					</li>
					<li>事実に反した情報及び架空の情報を提供する行為</li>
					<li>複数のアカウントを利用する行為</li>
					<li>当社及び本サービスの運営を妨げる行為</li>
					<li>当社の管理するサーバーに対して、コンピュータウィルスなどの有害なプログラムを配信する行為</li>
					<li>本サービス及び本サービスに関連して使用されている全てのソフトウェア又はプログラム等についてリバースエンジニアリング、逆コンパイル、逆アセンブルその他改変等を行う行為　</li>
					<li>ログイン情報を不正に使用する行為</li>
					<li>他人のメールアドレス・ログイン情報を使用する行為（当該他人から承諾を得ている場合も含みます）</li>
					<li>法令に違反する行為又は法令に違反するおそれのある行為</li>
					<li>会員の所属する団体等の規制に違反する行為</li>
					<li>その他、当社が不適切であると判断する行為</li>
				</ol>
			</li>
			<li>当社は、会員の本サービスの利用時の行為が前項各号のいずれかに該当し、又は該当するおそれがあると当社が判断した場合には、会員に事前に通知することなく、当該行為の全部又は一部を停止させる等かかる違反行為を排除するあらゆる措置を講じることができるものとします。当社は、当該停止等の措置を講じたことにより会員に生じた損害について、一切責任を負いません。</li>
		</ol>

		<h3>第１０条（当社による個人情報等の取扱い）</h3>
		<p>当社は、本サービス利用者が登録した個人情報、本サービス利用者が当社のサービスを通じて当社に提供した個人情報、その他の本サービス利用者が当社に提供したすべての情報（以下総称して「提供個人情報」といいます。）を当社の「プライバシーポリシー」に基づき、適切に取り扱うものとします。</p>

		<h3>第１１条（会員による個人情報等の取扱い）</h3>
		<ol>
			<li>会員は、本サービスを通じて知り得た相談者の個人情報を厳重に管理し、第三者に開示又は漏洩してはならないものとします。</li>
			<li>会員は、本サービスを通じて知り得た相談者の個人情報を、相談者から明示的に依頼された業務を履行する以外の目的及び当社が別途定める目的以外の目的で利用してはならないものとします。但し、当該相談者による事前の同意がある場合は除きます。</li>
			<li>会員は、当社が提供する情報の範囲を超えて、本サービスを通じて相談者の個人情報を取得しようとする場合、事前かつ個別に利用目的を明示しなければならないものとします。</li>
			<li>会員は、万一会員の管理する相談者の個人情報が他に漏洩したことが発覚した場合には、弁護士費用等を含めて会員の費用と責任においてこれを処理するものとし、当社は一切責任を負いません。</li>
		</ol>

		<h3>第１２条（知的財産権）</h3>
		<ol>
			<li>本サービスに含まれているコンテンツ、個々の情報に関する権利は当社及び本サービスにコンテンツ等を提供している提携先事業者に帰属しています。</li>
			<li>本サービス又は広告の中に提供、掲載されているコンテンツは、著作権法、商標法、意匠法等の各種法令によって保護されています。</li>
			<li>本サービス利用者は、当社及び提携先事業者の事前の承諾を得た場合を除いて、本サービスに含まれる内容及びコンテンツを複製、公開、譲渡、貸与、翻訳、転売、転送、使用許諾、再利用等してはならないものとします。また、本サービス利用者がこれらの行為によって受けた損害に関し、当社は、⼀切の保証をしないと同時に、本サービス利用者がこれらの行為を行った場合、損害賠償請求をすることがあります。</li>
		</ol>

		<h3>第１３条（会員の本相談についての対応及び責任）</h3>
		<ol>
			<li>本相談への対応は全て会員が行うものとし、当社が本相談に応答すること、会員と相談者との仲介を行うこと、会員へ本相談対応を目的とした指導援助を行うことはありません。</li>
			<li>当社は、相談者に対する会員の紹介又は会員の選定には⼀切関与いたしません。会員は、自己が対応可能な相談内容の相談者に対して自己の責任をもって、連絡及び対応を行ってください。</li>
			<li>本相談については、対応を行う会員が一切の責任を負います。</li>
			<li>会員は、個々の責任において、相談者に対して、職務上の義務を遵守します。</li>
		</ol>

		<h3>第１４条（サービス提供の一時停止）</h3>
		<ol>
			<li><p>当社は、次の各号のいずれかに該当する場合には、本サービス利用者に事前に通知することなく、本サービスの全部又は⼀部の提供を停止又は中断することができるものとします。</p>
				<ol>
					<li>システムの点検又は保守を緊急に行う場合</li>
					<li>コンピューター、通信回線が事故や第三者からの攻撃によって停止した場合</li>
					<li>地震、落雷、火災などの不可抗力によって本サービスの運営ができなくなった場合</li>
					<li>その他、当社が停止又は中断を行う必要があると判断した場合</li>
				</ol>
			</li>
			<li>当社は、本条に基づき当社が行った措置によって本サービス利用者に生じた損害について⼀切の責任を負いません。</li>
		</ol>

		<h3>第１５条（サービスの変更・追加・廃止）</h3>
		<ol>
			<li>当社は、理由の如何を問わず、本サービス利用者に事前に通知することなく、本サービスの内容の全部又は⼀部を変更又は追加することができるものとします。</li>
			<li>当社は、本サービス利用者に通知の上、本サービスの全部又は⼀部を中止又は廃止することができるものとします。ただし、本サービスの全部又は⼀部を中止又は廃止する緊急の必要性がある場合は、事前の通知を行うことなく、中止又は廃止をすることができるものとします。</li>
			<li>当社は、本サービスを変更、追加、中止又は廃止したことにより本サービス利用者又は第三者に生じた損害について、⼀切責任を負わないものとします。</li>
		</ol>
		<h3>第１６条（利用停止及び登録取消等）</h3>
		<ol>
			<li><p>本サービス利用者が、次の各号の一つに該当する場合、当社は、当該本サービス利用者に対して事前に通知することなく、当該本サービス利用者によるマイページへのアクセス禁止を含む利用停止、又は登録取り消し等の適切な措置をとることができるものとします。なお、当社は当該措置を行った理由について、当該本サービス利用者に開⽰する義務を負いません。</p>
				</li><li>本規約に違反したとき</li>
				<li>当社に提供された登録情報の全部又は一部につき虚偽、誤記又は記載漏れが判明した場合</li>
				<li>過去に登録取消処分を受けたことがあることが判明した場合</li>
				<li>会員が所属する団体から懲戒処分を受けた場合</li>
				<li>認定経営革新等支援機関の認定の更新を行わなかった、又は認定の取消しがあった場合</li>
				<li>最後にログインした日から3年が経過した場合</li>
				<li>死亡した場合、又は後見開始、保佐開始若しくは補助開始の審判を受けた場合</li>
				<li>当社のコンピューターに保存されているデータを当社に無断で閲覧、変更若しくは破壊したとき、又はそのおそれがあると当社が判断したとき</li>
				<li>本サービス利用態様が公序良俗に反し又は会員にふさわしくないと当社が判断したとき</li>
				<li><p>自ら又は第三者を利用して、次のaからeのいずれかに該当する行為を行ったとき</p>
					<ol>
						<li>暴力的な要求行為</li>
						<li>法的な責任を超えた不当な要求行為</li>
						<li>取引に関して、脅迫的な言動をし、又は暴力を用いる行為</li>
						<li>風説を流布し、偽計を用い又は威力を用いて当社の信用を毀損し、又は当社の業務を妨害する行為</li>
						<li>その他、上記aからdに準ずる行為</li>
					</ol>
				</li>
				<li>その他、当社が当該本サービス利用者に対し本サービスの提供を継続することが不適当であると判断したとき</li>
			
			<li>前項に定める措置は、当社から当該本サービス利用者に対する損害賠償請求を行うことを妨げるものではありません。また、前項に定める措置を行ったことについて、当社は⼀切の損害賠償義務を負いません。</li>
		</ol>

		<h3>第１７条（退会）</h3>
		<ol>
			<li>会員は、当社所定の退会⼿続を行うことにより、いつでも会員登録の抹消をすることができます。 </li>
			<li>会員は、退会⼿続を行った場合、マイページ上の情報を利用ができないこと、その他会員登録に基づき利用可能な一切の本サービスの提供を受けることができないものとします。</li>
		</ol>

		<h3>第１８条（非保証及び免責事項）</h3>
		<ol>
			<li>当社は、相談者が提供したすべての情報の完全性、正確性、確実性、有効性、安全性、合⽬的性等について、いかなる保証もせず、その内容から発⽣するあらゆる問題について⼀切の責任を負いません。</li>
			<li>当社は、本サービス利用者に対し、顧客の獲得及びそれらを通じた利益や効果を保証するものではありません。また、当社は本サービス利用者が求める相談者の存在、相談者による依頼の意思及び権限について、一切保証しません。</li>
			<li>本サービス利用者は、自らの本サービス利用及び本相談への対応に必要な資格、免許、許可等の有無及び法令その他の規制の有無を自らの責任において調査するものとします。本サービス利用者がかかる資格、免許、許可等を取得しなかったことにより本サービス利用者に発生した損害及び本サービス利用者が法令その他の規制に違反したことにより本サービス利用者が被った不利益につき、当社は何らの補償を行いません。</li>
			<li>当社は、本サービスの内外を問わず、相談者と会員の間で行われる連絡、コミュニケーション等には一切関与せず、本サービスの利用に関連して相談者及び会員が費やした費用並びに相談者及び会員が被った損害（本サービスを通じたサービス提供に伴う事故、違法行為、紛争、債務不履行、契約の解除等による損害を含みますが、これらに限りません。）について一切補償しません。また、本サービスの提供の中止、一時停止、利用不能、変更及び当社による本規約に基づく会員のプロフィール情報の削除、会員登録の取消等に関連して会員が被った損害、損失、費用につき、当社は賠償又は保証する責任を一切負わないものとします。なお、本項における「損害、損失、費用」には、直接的損害及び通常損害のみならず、データの喪失、事業の中断、事業機会の喪失、逸失利益、その他の間接的・特別的・派生的若しくは付随的損害の全てを含むものとします。</li>
			<li>当社は、会員登録の抹消等により、本サービスの提供が終了した場合、当該会員が掲載していた情報の全部又は一部について削除又は改変する場合があります。</li>
			<li>当社は、本サービスにより損害が生じたとしても、これについて⼀切の責任を負わないものとします。</li>
			<li><p>当社はいかなる状況においても、またいかなる第三者に対しても、次の各号に定める事項について⼀切責任を負いません。</p>
				<ol>
					<li>本サービスを通じて提供される情報の入手、収集、編纂、解釈、分析、編集、翻訳、送付、伝達、配布に関わる誤り（当社の不注意によるか、その他によるかを問いません。）又はその他の状況により（全部・⼀部を問いません。）引き起こされ、発⽣し、若しくはこれらに起因する損失又は損害</li>
					<li>本サービスを通じて提供される情報の使用又は使用不可により発⽣する、あらゆる種類の直接的、間接的、特別、⼆次的、又は付随的な損害（このような損害の可能性について当社が事前に通告を受けたかどうかを問いません。）</li>
				</ol>
			</li>
			<li>本サービスを通じて、本サービス利用者が取得する情報については、その完全性、正確性、確実性、有効性、安全性、合⽬的性等につき、すべて本サービス利用者の自⼰の責任と判断のもとで利用するものとし、その内容から発⽣するあらゆる問題について当社は⼀切の責任を負いません。また、本サービスからリンクされているサイトの情報についての責任、あるいはその内容から発⽣するあらゆる問題について当社は⼀切の責任を負いません。</li>
			<li>本サービスにおいて、本サービス利用者間、又は会員と相談者の間に生じたトラブル、損害その他の⼀切の事項に対して、当社はいかなる責任も負わず、補償を行いません。</li>
			<li>本サービス利用者間、又は会員と相談者の間で生じたトラブルについては、全て当該当事者間での交渉等により解決して頂くものとし、当社は両者間の取り次ぎ、交渉、情報提供その他⼀切のやり取りについて関与する義務を負いません。</li>
			<li><p>当社は、本サービスにおいて、次の各号に該当する記載を発⾒した場合、予告なく、当該記載を削除し、又は記載の修正を行う場合があります。なお、削除や修正対象に該当するか否かの判断は、全て当社が行い、当社は、削除や修正を行った理由について、開⽰する義務を負いません。また、削除や修正に起因して損害が生じたとしても、当社は、⼀切の責任を負いません。</p>
				<ol>
					<li>本規約に反する記載</li>
					<li>公序良俗に反する記載</li>
					<li>有害なプログラム・スクリプトなどを含む記載</li>
					<li>当社の名誉・信用を害する記載</li>
					<li>本サービスの運営を妨げる記載</li>
					<li>その他、当社が不適切であると判断した記載</li>
				</ol>
			</li>
			<li>当社は、本サービスの、デザイン等の仕様を予告なく変更することができるものとし、当該変更によって本サービス利用者に生じた損害について⼀切責任を負わないものとします。</li>
		</ol>

		<h3>第１９条（損害賠償）</h3>
		<ol>
			<li>本サービス利用者は、本規約に違反することにより、又は本サービスの利用に関連して当社に損害を与えた場合、当社に対し、その損害を賠償するものとします。また、本サービス利用者が雇用している従業員等その他の関係者が本規約に違反して当社に損害を与えた場合も同様とします。</li>
			<li>本サービス利用者による本サービスの利用に起因して、当社が、第三者から権利侵害その他の理由により何らかの損害賠償請求を受けた場合は、当該本サービス利用者は当該請求に基づき当社が第三者に支払いを余儀なくされた金額及びかかる事由に起因し当社において生じた又は負担した一切の損害及び費用（弁護士費用等を含みますが、これに限られません。）を賠償するものとします。</li>
			<li>本規約に定める免責条項が適用されない等の理由により、当社が本サービス利用者又は第三者に対して責任を負うべき場合、当社に故意又は重過失がある場合を除き、それらの責任に基づく損害賠償額はいかなる場合でも、当社が損害を被った本サービス利用者から受領した当該損害に関係する課金額を上限額とします。なお、本サービス利用者は、本サービス利用者がこの上限額の定めに同意しない限り当社が本サービスを提供しないことを⼗分に理解の上で、予め同意し承諾するものとします。</li>
		</ol>

		<h3>第２０条（権利義務の譲渡等の禁止）</h3>
		<p>本サービス利用者は、当社の書面による事前の承諾無く、本規約上の地位又は本規約に基づく権利若しくは義務を、第三者に譲渡若しくは担保提供し、又は引き受けさせる等の処分を行ってはならないものとします。</p>

		<h3>第２１条（本サービスの譲渡等）</h3>
		<p>当社は、本サービスの事業を第三者に譲渡した場合には、当該事業譲渡に伴い、本サービスの運営者たる地位、本規約上の地位、本規約に基づく権利及び義務並びに本サービス利用者の登録情報その他情報を当該事業譲渡の譲受人に譲渡することができるものとし、本サービス利用者は、本サービス利用者たる地位、本規約上の地位、本規約に基づく権利及び義務並びに本サービス利用者の登録情報その他情報の譲渡につき本条によりあらかじめ同意するものとします。なお、本条に定める事業譲渡には、通常の事業譲渡のみならず、会社分割その他事業が移転するあらゆる場合を含むものとします。</p>

		<h3>第２２条（反社会的勢力への不関与）</h3>
		<ol>
			<li>本サービス利用者は、自身が暴力団、暴力団員、暴力団関係企業、総会屋、社会運動標ぼうゴロ、政治運動標ぼうゴロ、特殊知能暴力集団、その他反社会的勢力（以下｢暴力団等反社会的勢力｣といいます。）に所属又は該当せず、かつ、暴力団等反社会的勢力と関与していないことを表明し、将来にわたっても所属若しくは該当、又は関与しないことを確約するものとします。
			</li><li>当社は、本サービス利用者が暴力団等反社会的勢力に所属若しくは該当する、又は正当な理由なく関与していると判断した場合、当該本サービス利用者に事前に通知等を行うことなく、当該本サービス利用者の本サイトへのアクセスを禁止し（会員である場合には、会員の登録を抹消等も含みますがこれに限りません。）、当該本サービス利用者が行った書込みの削除等の適切な措置を講じることがあります。
			</li><li>当社は前項の措置による本サービス利用者の損害を賠償する責任を⼀切負わないものとします。</li>
		</ol>

		<h3>第２３条（分離可能性）</h3>
		<p>本規約のいずれかの条項又はその⼀部が、消費者契約法その他の法令等により無効又は執行不能と判断された場合であっても、本規約の残りのその他の条項、及び⼀部が無効又は執行不能と判断された条項の残りの部分は、継続して完全にその効力を有するものとします。</p>

		<h3>第２４条（存続条項）</h3>
		<p>会員が退会、又は登録取消により会員資格を失った場合でも、第５条第５項、第６条、第７条、第８条第2項、同条第４項、同条第6項、第９条、第１１条から第１６条、第１７条第２項、第１８条から第２５条の規定についてはその効力がなお存続するものとします。</p>

		<h3>第２５条（準拠法、合意管轄）</h3>
		<p>本サービス利用者と当社との間における紛争については、日本国法を適用し、大阪地方裁判所を第⼀審の専属的合意管轄裁判所とします。また、本規約は、日本国法に準拠し、解釈されるものとします。</p>
									</div>
								</div>
							</div>
						</div>
					</section>
					<div class="section send_area">
						<div class="sitewrap">
							<div class="send_btns">
								<label class="btn_warp next"><span><input @click="confirmContent" type="button" value="送信内容を確認"></span></label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
  </div>
</template>
<script>
import { JOB_KINDS, CONTENTS, JOBS, PRICES, AMOUNTS, PREFECTURES } from '../../const';
var postal_code = require('japan-postal-code')
export default {
  layout: 'default',
  middleware: 'guest',
  components: {
  },
  data() {
    return {
			JOB_KINDS: JOB_KINDS,
			CONTENTS: CONTENTS,
			JOBS: JOBS,
			PRICES: PRICES,
			AMOUNTS: AMOUNTS,
			PREFECTURES,

			kikan_id: null,
			com_name: null,
			com_huri_name: null,
			tanto_name: null,
			department_name: null,
			role_name: null,
			is_personal: 0,
			kind: null,
			zipcode: null,
			prefecture: null,
			city: null,
			building: null,
			telephone: null,
			fax: null,
			email: null,
			password: null,
			introduction: null,
			available_contents: [],
			available_jobs: [],
			available_prices: [],
			available_amounts: []
    }
  },
  mounted() {
		// this.clearContent()
		this.init()
  },
	created() {
		window.document.title = '支援機関新規登録 | 補助金活用.COM'
		$('meta[name=description]').attr('content','事業者×支援機関マッチングサイト補助金活用.COMの「支援機関新規登録」ページです。支援機関を新規登録する場合、本フォームより「認定支援機関情報入力欄」「支援可能条件入力欄」を入力してください。事業者相談、その他のお問い合わせは専用のフォームからお問い合わせください。')
		$('meta[name=og:description]').attr('content','事業者×支援機関マッチングサイト補助金活用.COMの「支援機関新規登録」ページです。支援機関を新規登録する場合、本フォームより「認定支援機関情報入力欄」「支援可能条件入力欄」を入力してください。事業者相談、その他のお問い合わせは専用のフォームからお問い合わせください。')
	},
  methods: {
		clearContent() {
			localStorage.removeItem('kikan_id')
			localStorage.removeItem('com_name')
			localStorage.removeItem('com_huri_name')
			localStorage.removeItem('tanto_name')
			localStorage.removeItem('department_name')
			localStorage.removeItem('role_name')
			localStorage.removeItem('is_personal')
			localStorage.removeItem('kind')
			localStorage.removeItem('zipcode')
			localStorage.removeItem('prefecture')
			localStorage.removeItem('city')
			localStorage.removeItem('building')
			localStorage.removeItem('telephone')
			localStorage.removeItem('fax')
			localStorage.removeItem('email')
			localStorage.removeItem('password')
			localStorage.removeItem('introduction')
			localStorage.removeItem('available_contents')
			localStorage.removeItem('available_jobs')
			localStorage.removeItem('available_prices')
			localStorage.removeItem('available_amounts')
		},
		init() {
			if (!!localStorage.getItem('kikan_id')) {
				this.kikan_id = localStorage.getItem('kikan_id')
				this.com_name = localStorage.getItem('com_name')
				this.com_huri_name = localStorage.getItem('com_huri_name')
				this.tanto_name = localStorage.getItem('tanto_name')
				this.department_name = localStorage.getItem('department_name')
				this.role_name = localStorage.getItem('role_name')
				this.is_personal = parseInt(localStorage.getItem('is_personal'))
				this.kind = parseInt(localStorage.getItem('kind'))
				this.zipcode = localStorage.getItem('zipcode')
				this.prefecture = localStorage.getItem('prefecture')
				this.city = localStorage.getItem('city')
				this.building = localStorage.getItem('building')
				this.telephone = localStorage.getItem('telephone')
				this.fax = localStorage.getItem('fax')
				this.email = localStorage.getItem('email')
				this.password = localStorage.getItem('password')
				this.introduction = localStorage.getItem('introduction')
				this.available_contents = localStorage.getItem('available_contents').split('、').map(item => {
					return parseInt(item)
				})
				this.available_jobs = localStorage.getItem('available_jobs').split('、').map(item => {
					return parseInt(item)
				})
				this.available_prices = localStorage.getItem('available_prices').split('、').map(item => {
					return parseInt(item)
				})
				this.available_amounts = localStorage.getItem('available_amounts').split('、').map(item => {
					return parseInt(item)
				})
			}
		},
		changeContent(event, content, index) {
			if (event.target.checked == true) {
				this.available_contents.push(index)
			} else {
				let temp = this.available_contents.slice()
				const idex = temp.indexOf(index)
				temp.splice(idex, 1)
				this.available_contents = temp
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
		changeJob(event, job, index) {
			if (event.target.checked == true) {
				this.available_jobs.push(index)
			} else {
				let temp = this.available_jobs.slice()
				const idex = temp.indexOf(index)
				temp.splice(idex, 1)
				this.available_jobs = temp
			}
		},
		changePrice(event, price, index) {
			if (event.target.checked == true) {
				this.available_prices.push(index)
			} else {
				let temp = this.available_prices.slice()
				const idex = temp.indexOf(index)
				temp.splice(idex, 1)
				this.available_prices = temp
			}
		},
		changeAmount(event, amount, index) {
			if (event.target.checked == true) {
				this.available_amounts.push(index)
			} else {
				let temp = this.available_amounts.slice()
				const idex = temp.indexOf(index)
				temp.splice(idex, 1)
				this.available_amounts = temp
			}
		},
		confirmContent() {
			// validation
			if (!this.kikan_id) {
				this.$swal('', '認定支援機関ID番号を入力してください')
				return
			}
			if (this.kikan_id.length != 12) {
				this.$swal('', '桁数は12桁となります')
				return
			}

			if (!this.com_name) {
				this.$swal('', '会社名を入力してください')
				return
			}

			if (!this.com_huri_name) {
				this.$swal('', '会社名(フリガナ)を入力してください')
				return
			}

			if (!this.tanto_name) {
				this.$swal('', '担当者氏名を入力してください')
				return
			}

			if (this.kind == null) {
				this.$swal('', '種別を選択してください')
				return
			}

			if (!this.zipcode) {
				this.$swal('', '会社所在地の郵便番号を入力してください')
				return
			}

			if (this.prefecture == null) {
				this.$swal('', '会社所在地の都道府県を選択してください')
				return
			}

			if (!this.city) {
				this.$swal('', '市区町村番地を入力してください')
				return
			}

			if (!this.email) {
				this.$swal('', 'メールアドレスを入力してください')
				return
			}

			if (this.password.match(/^[^\x01-\x7E\uFF61-\uFF9F]+$/)) {
				this.$swal('', 'マイページパスワードは半角大文字アルファベット、半角小文字アルファベット、半角数字で入力してください')
				return
			}

			if (this.available_contents.length == 0) {
				this.$swal('', '支援可能内容を設定してください')
				return
			}

			if (this.available_jobs.length == 0) {
				this.$swal('', '支援可能業種を設定してください')
				return
			}

			if (this.available_prices.length == 0) {
				this.$swal('', '支援可能年商を設定してください')
				return
			}

			if (this.available_amounts.length == 0) {
				this.$swal('', '支援可能従業員規模を設定してください')
				return
			}

			localStorage.setItem('kikan_id', this.kikan_id)
			localStorage.setItem('com_name', this.com_name)
			localStorage.setItem('com_huri_name', this.com_huri_name)
			localStorage.setItem('tanto_name', this.tanto_name)
			localStorage.setItem('department_name', this.department_name)
			localStorage.setItem('role_name', this.role_name)
			localStorage.setItem('is_personal', this.is_personal)
			localStorage.setItem('kind', this.kind)
			localStorage.setItem('zipcode', this.zipcode)
			localStorage.setItem('prefecture', this.prefecture)
			localStorage.setItem('city', this.city)
			localStorage.setItem('building', this.building)
			localStorage.setItem('telephone', this.telephone)
			localStorage.setItem('fax', this.fax)
			localStorage.setItem('email', this.email)
			localStorage.setItem('password', this.password)
			localStorage.setItem('introduction', this.introduction)
			localStorage.setItem('available_contents', this.available_contents.join('、'))
			localStorage.setItem('available_jobs', this.available_jobs.join('、'))
			localStorage.setItem('available_prices', this.available_prices.join('、'))
			localStorage.setItem('available_amounts', this.available_amounts.join('、'))

			this.$router.push({ name: 'register_confirm' })
		}
  }
}
</script>
<style lang="scss" scoped>
@mixin sp {
    @media screen and (max-width: 768px) {
        @content;
    }
}
</style>