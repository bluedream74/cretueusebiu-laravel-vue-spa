<template>
    <div class="header">
        <h1>
            <router-link :to="{ name: 'admin.users' }">
                <img src="/asset/nizimari__logo.png" />
            </router-link>
        </h1>
        <h2>
            <span>管理ページ</span>
        </h2>
        <button @click="logout"><i class="fas fa-sign-out-alt"></i>ログアウト</button>
    </div>
</template>
<script>
export default {
    methods: {
        async logout() {
            await this.$store.dispatch('admin_auth/logout')
            this.$router.push({ name: 'admin.login' })
        }
    }
}
</script>
<style lang="scss" scoped>
    .header {
        height: 80px;
        display: flex;
        align-items: center;
        padding-left: 20px;
        padding-right: 20px;
        box-shadow: 0 3px 4px 0 rgba($color: #000000, $alpha: 0.25);
        position: relative;
        z-index: 200;
        h1 {
            margin-right: 20px;
            a {
                display: block;
                img {
                    width: 55px;
                }
            }
        }
        h2 {
            display: flex;
            span {
                font-size: 18px;
                font-weight: bold;
                color: #333;
                margin-right: 10px;
            }
        }
        button {
            &:first-of-type {
                background-color: #37ACDD;
                width: 240px;
                height: 48px;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 6px;
                border: 0;
                color: white;
                font-size: 14px;
                font-weight: bold;
                margin-left: auto;
                margin-right: 12px;
            }
            &:last-of-type {
                background-color: #fff;
                width: 240px;
                height: 48px;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 6px;
                border: 1px solid #C0C0C0;
                color: #585858;
                font-size: 14px;
                font-weight: bold;
                margin-right: 12px;
                img {
                    width: 20px;
                    margin-right: 12px;
                }
            }
        }
     }
</style>