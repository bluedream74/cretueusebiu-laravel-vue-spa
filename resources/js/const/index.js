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