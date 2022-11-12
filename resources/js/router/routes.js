function page (path) {
  return () => import(/* webpackChunkName: '' */ `~/pages/${path}`).then(m => m.default || m)
}

export default [
  { path: '/', name: 'home', component: page('home.vue') },

  { path: '/register', name: 'register', component: page('auth/register.vue') },
  { path: '/register_confirm', name: 'register_confirm', component: page('auth/register_confirm.vue') },
  { path: '/register_complete', name: 'register_complete', component: page('auth/register_complete.vue') },
  { path: '/thanks', name: 'thanks', component: page('auth/thanks.vue') },

  // マイページ
  { path: '/mypage', name: 'mypage', component: page('mypage/index.vue') },
  { path: '/mypage/password', name: 'mypage_password', component: page('mypage/password/index.vue') },
  { path: '/profile', name: 'profile', component: page('mypage/profile/index.vue') },
  { path: '/profile/check', name: 'profile.check', component: page('mypage/profile/check.vue') },
  { path: '/profile/thanks', name: 'profile.thanks', component: page('mypage/profile/thanks.vue') },

  // 事業者相談フォーム
  { path: '/consultant_form', name: 'consultant_form', component: page('consultant_form/index.vue') },
  { path: '/consultant_form/confirm', name: 'consultant_form.confirm', component: page('consultant_form/confirm.vue') },
  { path: '/consultant_form/complete', name: 'consultant_form.complete', component: page('consultant_form/complete.vue') },

  { path: '/consultant', name: 'consultant', component: page('consultant.vue') },
  { path: '/consultant_detail', name: 'consultant_detail', component: page('consultant/detail.vue') },
  { path: '/consultant_confirm', name: 'consultant_answer_confirm', component: page('consultant/confirm.vue') },
  { path: '/consultant_complete', name: 'consultant_answer_complete', component: page('consultant/complete.vue') },

  { path: '/history', name: 'history', component: page('mypage/history/index.vue') },
  { path: '/history/detail', name: 'history_detail', component: page('mypage/history/detail.vue') },

  // お知らせ
  { path: '/news', name: 'news', component: page('news/index.vue') },
  { path: '/news/detail', name: 'news.detail', component: page('news/detail.vue') },

  { path: '/password_reset', name: 'forget', component: page('auth/password_reset.vue') },
  { path: '/password_reset_form', name: 'password_reset_form', component: page('auth/password_reset_form.vue') },
  { path: '/login', name: 'login', component: page('auth/login.vue') },
  { path: '/complete', name: 'complete', component: page('auth/complete.vue') },
  { path: '/search', name: 'search', component: page('search.vue') },
  { path: '/home', name: 'home1', component: page('home.vue') },
  { path: '/account/activate', name: 'account.activate', component: page('auth/activate.vue') },
  { path: '/user/detail', name: 'user.detail', component: page('user/detail.vue') },

  // admin
  { path: '/admin/login', name: 'admin.login', component: page('admin/auth/login.vue') },
  { path: '/admin/password', name: 'admin.password', component: page('admin/auth/password.vue') },

  { path: '/admin/dashboard', name: 'admin.dashboard', component: page('admin/index.vue') },
  { path: '/admin/register', name: 'admin.register', component: page('admin/register/index.vue') },
  { path: '/admin/register/edit', name: 'admin.register.edit', component: page('admin/register/edit.vue') },
  { path: '/admin/register/history', name: 'admin.register.history', component: page('admin/register/history.vue') },
  { path: '/admin/register/invoice', name: 'admin.register.invoice', component: page('admin/register/invoice.vue') },
  { path: '/admin/register/koukoku_add', name: 'admin.register.koukoku_add', component: page('admin/register/koukoku_add.vue') },
  { path: '/admin/register/invoice_pdf', name: 'admin.register.invoice_pdf', component: page('admin/register/invoice_pdf.vue') },

  { path: '/admin/consultant', name: 'admin.consultant', component: page('admin/consultation/index.vue') },
  { path: '/admin/consultant/edit', name: 'admin.consultant.edit', component: page('admin/consultation/edit.vue') },
  { path: '/admin/consultant/check', name: 'admin.consultant.check', component: page('admin/consultation/check.vue') },
  { path: '/admin/consultant/finish', name: 'admin.consultant.finish', component: page('admin/consultation/finish.vue') },
  { path: '/admin/news', name: 'admin.news', component: page('admin/news/index.vue') },
  { path: '/admin/news/create', name: 'admin.news.create', component: page('admin/news/create.vue') },
  { path: '/admin/news/edit', name: 'admin.news.edit', component: page('admin/news/edit.vue') },
  { path: '/admin/news/check', name: 'admin.news.check', component: page('admin/news/check.vue') },
  { path: '/admin/contact', name: 'admin.contact', component: page('admin/contact/index.vue') },
  { path: '/admin/add_bnr', name: 'admin.add_bnr', component: page('admin/add_bnr/index.vue') },
  { path: '/admin/add_bnr/create', name: 'admin.add_bnr.create', component: page('admin/add_bnr/create.vue') },
  { path: '/admin/add_bnr/edit', name: 'admin.add_bnr.edit', component: page('admin/add_bnr/edit.vue') },
  { path: '/admin/add_bnr/check', name: 'admin.add_bnr.check', component: page('admin/add_bnr/check.vue') },
  { path: '/admin/add_bnr/finish', name: 'admin.add_bnr.finish', component: page('admin/add_bnr/finish.vue') },

  { path: '/admin/billing', name: 'admin.billing', component: page('admin/billing/index.vue') },
  { path: '/admin/billing/finish', name: 'admin.billing.finish', component: page('admin/billing/finish.vue') },

  { path: '/admin/freee', name: 'admin.freee', component: page('admin/freee/index.vue') },

  { path: '*', component: page('errors/404.vue') }
]
