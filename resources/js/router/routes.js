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

  { path: '/password_reset', name: 'forget', component: page('auth/password_reset.vue') },
  { path: '/password_reset_form', name: 'password_reset_form', component: page('auth/password_reset_form.vue') },
  { path: '/login', name: 'login', component: page('auth/login.vue') },
  { path: '/complete', name: 'complete', component: page('auth/complete.vue') },
  { path: '/search', name: 'search', component: page('search.vue') },
  { path: '/home', name: 'home1', component: page('home.vue') },
  { path: '/account/activate', name: 'account.activate', component: page('auth/activate.vue') },
  { path: '/user/detail', name: 'user.detail', component: page('user/detail.vue') },

  { path: '*', component: page('errors/404.vue') }
]
