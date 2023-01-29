<template >
<Head>
    <title>{{ $page.props.title }} - Envybox test</title>
</Head>
<div class="w-screen h-screen bg-zinc-800">
    <div class="m-auto mt-8 rounded-md bg-zinc-700 w-1/3 p-1 text-yellow-50">
        <h2>
            Database for exporting feedback
        </h2>
        <div class="flex flex-col p-1">
            <form @submit.prevent="postForm()">
            <div class="flex flex-col mx-auto mt-8 items-center p-2">

                    <div class="w-full justify-between flex gap-4 p-2">
                        <label class="w-10" for="driver">driver</label>
                        <input type="text" id="driver" class="text-zinc-900" v-model="dbForm.driver">
                    </div>

                    <div class="w-full justify-between flex gap-4 p-2">
                        <label class="w-10" for="host">host</label>
                        <input type="text" id="host" class="text-zinc-900" v-model="dbForm.host">
                    </div>

                    <div class="w-full justify-between flex gap-4 p-2">
                        <label class="w-10" for="database">database</label>
                        <input type="text" id="database" class="text-zinc-900" v-model="dbForm.database">
                    </div>

                    <div class="w-full justify-between flex gap-4 p-2">
                        <label class="w-10" for="username">username</label>
                        <input type="text" id="username" class="text-zinc-900" v-model="dbForm.username">
                    </div>

                    <div class="w-full justify-between flex gap-4 p-2">
                        <label class="w-10" for="password">password</label>
                        <input type="text" id="password" class="text-zinc-900" v-model="dbForm.password">
                    </div>

                    <div class="w-full justify-between flex gap-4 p-2">
                        <label class="w-10" for="port">port</label>
                        <input type="text" id="port" class="text-zinc-900" v-model="dbForm.port">
                    </div>

                    <div class="w-full justify-between flex gap-4 p-2">
                        <label class="w-10" for="export">export</label>
                        <input type="text" id="export" class="text-zinc-900" v-model="dbForm.export">
                    </div>

                    <div class="w-full flex items-center justify-center">
                        <button type="submit" class="text-white bg-zinc-800 hover:bg-zinc-900 focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                            Отправить
                        </button>
                    </div>

            </div>
        </form>
        </div>
    </div>
</div>
</template>

<script>
import {
    useForm
} from '@inertiajs/inertia-vue3'

export default {
    name: "Home",
    layout: null,
    props:{
        data: Object,
        title: String
    },
    setup(props) {
        const dbForm = useForm({
            driver: props.data.driver,
            host: props.data.host,
            database: props.data.database,
            username: props.data.username,
            password: props.data.password,
            port: props.data.port,
            charset: props.data.charset,
            collation: props.data.collation,

            export: props.data.export
        })
        return {
            dbForm
        }
    },
    methods: {
        postForm() {
            this.dbForm.post('/settings/submit')
        }
    }
}
</script>