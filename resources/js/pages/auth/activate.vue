<template>
<div></div>
</template>
<script>
export default {
    layout: 'main',
    middleware: 'guest',
    mounted() {
        this.init()
    },
    methods: {
        async init() {
            var email = this.$route.query.email
            var token = this.$route.query.token
            try {
                const { data } = await axios.post('/api/activate_email', {
                    email: email,
                    token: token
                })
                if (data.status == 0) {
                    this.$swal('', 'メールアドレスが有効ではありません。')
                    this.$router.push({ name: 'home' })
                } else if (data.status == 1) {
                    this.$swal('', 'すでに認証済みのアカウントです。')
                    this.$router.push({ name: 'home' })
                } else if (data.status == 2) {
                    this.$swal('', 'トークンが違います。')
                    this.$router.push({ name: 'home' })
                } else if (data.status == 3) {
                    this.$swal('', 'URLの有効期限が過ぎました。')
                    this.$router.push({ name: 'home' })
                } else if (data.status == 4) {
                    this.$router.push({ name: 'register_complete' })
                }
            } catch (error) {
            }
        }
    }
}
</script>