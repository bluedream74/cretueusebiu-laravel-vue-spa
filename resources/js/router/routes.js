function page (path) {
  return () => import(/* webpackChunkName: '' */ `~/pages/${path}`).then(m => m.default || m)
}

export default [
  { path: '/', name: 'home', component: page('home.vue') },

  { path: '/register', name: 'register', component: page('auth/register.vue') },
  { path: '/password_reset', name: 'password_reset', component: page('auth/password_reset.vue') },
  { path: '/password_reset_form', name: 'password_reset_form', component: page('auth/password_reset_form.vue') },
  { path: '/login', name: 'login', component: page('auth/login.vue') },
  { path: '/complete', name: 'complete', component: page('auth/complete.vue') },
  { path: '/search', name: 'search', component: page('search.vue') },
  { path: '/home', name: 'home1', component: page('home.vue') },
  { path: '/account/activate', name: 'account.activate', component: page('auth/activate.vue') },
  { path: '/user/detail', name: 'user.detail', component: page('user/detail.vue') },

  { path: '*', component: page('errors/404.vue') }
]
