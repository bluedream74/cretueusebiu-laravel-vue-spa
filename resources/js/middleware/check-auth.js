import store from '~/store'

export default async (to, from, next) => {
  if (to.name && to.name.includes('admin')) {
    if (!store.getters['admin_auth/check'] && store.getters['admin_auth/token']) {
      try {
        await store.dispatch('admin_auth/fetchUser')
      } catch (e) { }
    }
  } else if (!store.getters['auth/check'] && store.getters['auth/token']) {
    try {
      await store.dispatch('auth/fetchUser')
    } catch (e) { }
  }
  next()
}
