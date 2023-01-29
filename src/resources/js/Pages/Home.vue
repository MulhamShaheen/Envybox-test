<template>
<Head>
    <title>{{ $page.props.title }} - Envybox test</title>
</Head>
<div class="w-screen h-screen bg-zinc-800 pt-8">
    <a href="/settings" class=" no-underline">
        <span class=" absolute top-1 right-1 cursor-pointer">
            Settings
        </span>
    </a>
    <div class="m-auto mt-8 rounded-md bg-zinc-700 w-1/3 p-1 text-yellow-50">
        <form @submit.prevent="postForm()">
            <div class="flex flex-col mx-auto mt-8 items-center p-2">
                <div class="w-5/6">
                    <label for="name" class="block mb-2 text-sm font-medium">Имя
                    </label>
                    <input type="text" id="name" v-model="form.name" class="bg-gray-50 border  border-gray-300 text-zinc-900 text-sm rounded-lg focus:outline-none block w-full p-2.5">
                    <span class=" text-red-400">
                        {{ $page.props.errors.name }}
                    </span>
                    <label for="phone" class="block mb-2 text-sm font-medium  ">Телефон
                    </label>
                    <input type="text" id="phone" v-model="form.phone" class="bg-gray-50 border border-gray-300 text-zinc-900 text-sm rounded-lg  block w-full p-2.5 focus:outline-none">
                    <span class=" text-red-400">
                        {{ $page.props.errors.phone }}
                    </span>
                    <label for="text" class="block mb-2 text-sm font-medium  ">Сообщение
                    </label>
                    <textarea id="description" rows="8" v-model="form.text" class="block px-0 w-full text-sm text-gray-800 bg-white rounded-lg border-0 focus:outline-none" placeholder="Напишите текст обращения..."></textarea>
                    <div class="w-full flex items-center justify-center">
                        <button type="submit" class="text-white bg-zinc-800 hover:bg-zinc-900 focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                            Отправить
                        </button>
                    </div>
                </div>
            </div>
        </form>
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
