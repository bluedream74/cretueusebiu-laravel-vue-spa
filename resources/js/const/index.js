export const PREFECTURES = [
  '北海道', '青森県', '岩手県', '宮城県', '秋田県', '山形県', '福島県', '山梨県', '長野県', '新潟県', '富山県', '石川県', ' 福井県', '東京都', '神奈川県', '千葉県', '埼玉県', '群馬県', '茨城県', '栃木県', '山梨県', '愛知県', '静岡県', '岐阜県', '三重県', '大阪府', '兵庫県', '京都府', '滋賀県', '奈良県', '和歌山県', '鳥取県', '島根県', '岡山県', '広島県', '山口県', '徳島県', '香川県', '愛媛県', '高知県', '福岡県', '佐賀県', '長崎県', '熊本県', '大分県', '宮崎県', '鹿児島県', '沖縄県', '海外'
]

export const SEXALITY = [
  'ストレート',
  'ゲイ',
  'レズビアン',
  'バイセクシャル',
  'ノンセクシャル',
  'アセクシャル',
  'トランスジェンダ',
  'パンセクシャル',
  'アロマンティック',
  'どれでもない',
]

export const BODY_TYPE = [
  'やせ型',
  '標準',
  '筋肉質',
  'ぽっちゃり',
  '太っている',
  'その他',
]

export const JOB = [
  '会社員',
  '公務員',
  '自営業',
  '専門職',
  'アルバイト',
  'その他',
]

export const HOLIDAY = [
  '土日祝日休み',
  'シフト制（固定）',
  'シフト（不定）',
  '好きな時に休める',
  'その他',
]

export const SALARY = [
  '300万円以下',
  '300〜500万',
  '500〜700万',
  '700〜900万',
  '900万以上',
]

export const STUDY = [
  '中学',
  '高校',
  '高専',
  '専門学校',
  '短大',
  '大学',
  '大学院',
  'その他',
]

export const LIQUOR = [
  '飲む',
  'あまり飲まない',
  '全く飲まない',
]

export const TOBACCO = [
  '吸う',
  'たまに吸う',
  '全く吸わない',
]

export const PARTNER = [
  'あり',
  'なし',
]

export const HISTORY = [
  '結婚歴あり子供なし',
  '結婚歴あり子供あり（同居中）',
  '結婚歴あり子供あり（別居中）',
  '結婚歴なし',
]

export const STYLE = [
  '同居',
  '別居',
  'その他',
]

export const CHILD = [
  '望む（性交渉あり）',
  '望む（性交渉なし）',
  '望まない・相談',
]

export const getAge = () => {
  let ages = []
  for (let age = 18; age <= 70; age++) {
    ages.push(age)
  }
  return ages
}

export const getHeight = () => {
  let heights = []
  for (let height = 140; height <= 200; height++) {
    heights.push(height)
  }
  return heights
}

export const JOB_KINDS = [
  '行政書士',
  '行政書士法人',
  '公認会計士',
  'コンサルタント',
  '司法書士',
  '司法書士法人',
  '社会保険労務士',
  '社会保険労務士法人',
  '税理士',
  '税理士法人',
  'その他（個人）',
  '中小企業診断士',
  '弁護士',
  '弁護士法人',
  '民間コンサルティング会社'
]

export const CONTENTS = [
  '事業再構築補助金',
  'ものづくり補助金',
  '小規模事業者補助金',
  '創業支援',
  '事業承継支援',
  '経営改善計画策定',
  'IT導入補助金',
  '経営力向上計画',
  '先端設備等導入計画',
  '経営革新計画',
  '事業継続力強化計画',
  'その他'
]

export const JOBS = [
  '農業、林業',
  '漁業',
  '鉱業、採石業、砂利採取業',
  '建設業',
  '製造業',
  '電気',
  'ガス',
  '熱供給',
  '水道業',
  '情報通信業',
  '運輸業',
  '郵便業',
  '卸売業、小売業',
  '金融業、保険業',
  '不動産業、物品賃貸業',
  '学術研究、専門',
  '技術サービス業',
  '宿泊業、飲食サービス業',
  '生活関連サービス業、娯楽業',
  '教育、学習支援業',
  '医療、福祉',
  '複合サービス事業',
  'サービス業（他に分類されないもの）',
  '公務（他に分類されるものを除く）',
  '分類不能の産業'
]

export const PRICES = [
  '5,000万円未満',
  '5,000万円以上3億円未満',
  '3億円以上10億円未満',
  '10億円以上'
]

export const AMOUNTS = [
  '5人未満',
  '5～9人',
  '10～29人',
  '30～99人',
  '100～499人',
  '500～999人',
  '1,000人以上'
]

export const SYSTEM_CONFIRM = [
  '事業再構築補助金',
  'ものづくり補助金',
  '小規模事業者補助金',
  '創業支援',
  '事業承継支援',
  '経営改善計画策定',
  'IT導入補助金',
  '経営力向上計画',
  '先端設備等導入計画',
  '経営革新計画',
  '事業継続力強化計画',
]

export const SYSTEM_MISS = [
  '設備を導入したい・設備投資をしたい',
  'Webサイトを作りたい・改善したい',
  'ショッピングサイトを作りたい・改善したい',
  '試作品を作りたい',
  '開発したいことがある',
  '生産性を改善したい・作業を効率化したい',
  '人材育成したい・人材確保したい',
  '品質を改善したい',
  '経営を改善したい・経営を革新したい',
  '起業スタートアップを支援してほしい',
  '設備や作業をIT化したい',
  'キャッシュレス化したい・会計ソフトを導入したい',
  '違う事業を始めたい',
  '違う事業に変更したい',
  '会社を譲りたい・事業を譲りたい',
  '会社を買いたい・事業を買いたい',
  '災害や突然の社会情勢変化に強い会社にしたい',
  '他の事業者と連携し新たな取組をしたい',
  '海外展開したい',
  '販路開拓したい'
]

export const SYSTEM_OTHER = [
  'その他',
  '連携相談'
]

export const SUPPORT_PRICES = [
  '1,000万円未満',
  '1,000万円以上3,000万円未満',
  '3,000万円以上5,000万円未満',
  '5,000万円以上8,000万円未満',
  '8,000万円以上'
]