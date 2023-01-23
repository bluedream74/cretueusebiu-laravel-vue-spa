<template>
    <div class="side_bar">
        <ul>
            <li>
                <router-link :to="{ name: 'admin.users' }" :class="{ active: !!$route.name ? $route.name.includes('admin.users') : false }">
                    <i class="fas fa-user menu_icon"></i>ユーザー管理<i class="fas fa-chevron-right"></i>
                </router-link>
            </li>
            <li>
                <router-link :to="{ name: 'admin.deleted_users' }" :class="{ active: !!$route.name ? $route.name.includes('admin.deleted_users') : false }">
                    <i class="fas fa-user menu_icon"></i>強制削除ユーザー管理<i class="fas fa-chevron-right"></i>
                </router-link>
            </li>
            <li>
                <router-link :to="{ name: 'admin.contacts' }" :class="{ active: !!$route.name ? $route.name.includes('admin.contacts') : false }">
                    <i class="far fa-envelope menu_icon"></i>お問い合わせ一覧<i class="fas fa-chevron-right"></i>
                </router-link>
            </li>
            <li>
                <router-link :to="{ name: 'admin.chatrooms' }" :class="{ active: !!$route.name ? $route.name.includes('admin.chatrooms') : false }">
                    <i class="far fa-envelope menu_icon"></i>メッセージ管理<i class="fas fa-chevron-right"></i>
                </router-link>
            </li>
            <li>
                <router-link :to="{ name: 'admin.news' }" :class="{ active: !!$route.name ? $route.name.includes('admin.news') : false }">
                    <i class="fas fa-rss-square menu_icon"></i>お知らせ管理<i class="fas fa-chevron-right"></i>
                </router-link>
            </li>
        </ul>
    </div>
</template>
<script>
export default {
    
}
</script>
<style lang="scss" scoped>
.side_bar {
    width: 300px;
    min-height: calc(100vh - 80px);
    background-color: #37ACDD;
    ul {
        padding-left: 0;
        margin-bottom: 0;
        margin: 0;
        li {
            height: 50px;
            a {
                width: 100%;
                box-sizing: border-box;
                padding-left: 30px;
                align-items: center;
                padding-right: 30px;
                display: flex;
                font-feature-settings: 18px;
                color: white;
                height: 50px;
                text-decoration: none !important;
                img {
                    margin-right: 20px;
                    width: 24px;
                }
                .menu_icon {
                    margin-right: 20px;
                    font-size: 24px;
                }
                i {
                    font-size: 18px;
                    color: white;
                    margin-left: auto;
                }
                &.active {
                    background-color: #13455A;
                }
            }
        }
    }
}
</style>