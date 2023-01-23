import store from '~/store'

export default async (to, from, next) => {
  if (!!store.getters['auth/check']) {
    if (store.getters['auth/user'].role_id !== 2) {
      next({ name: 'lp' })
    } else {
      // next({ name: 'creator.dashboard' })
      next()
    }
  } else {
    next({ name: 'lp' })
  }
  
}
