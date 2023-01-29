<template>
<Head>
    <title>{{ $page.props.title }} - Envybox test</title>
</Head>
<div class="m-auto rounded-md bg-slate-400 w-1/3 p-1">
    <form @submit.prevent="postForm()">
        <div class="flex flex-col mx-auto mt-8 items-center p-2">
            <div class="w-5/6">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Имя
                    Проекта</label>
                <input type="text" id="name" v-model="form.name" class="bg-gray-50 border  border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-none block w-full p-2.5">

                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 ">Телефон
                    Проекта</label>
                <input type="text" id="phone" v-model="form.phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  block w-full p-2.5 focus:outline-none">

                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 ">Сообщение
                </label>
                <textarea id="description" rows="8" v-model="form.text" class="block px-0 w-full text-sm text-gray-800 bg-white border-0 focus:outline-none" placeholder="Напишите текст обращения..."></textarea>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                    Отправить
                </button>
            </div>
        </div>
    </form>
</div>
</template>

<script>
import {
    useForm
} from '@inertiajs/inertia-vue3'

export default {
    name: "Home",
    layout: null,

    setup() {
        const form = useForm({
            name: null,
            phone: null,
            text: null,
        })
        return {
            form
        }
    },
    methods: {
        postForm() {
            this.form.post('/feedback/submit')
        }
    }
}
</script>
