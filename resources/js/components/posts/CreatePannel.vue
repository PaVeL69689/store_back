<template>
    <div class="mb-4 p-4 bg-white border border-gray-200">
        <div class="mb-4">
            <input
                v-model="valueInput.title"
                placeholder="Название"
                type="text"
                class="border border-gray-200 p-4 w-full"
            />
        </div>
        <div class="mb-4">
            <input
                v-model="valueInput.price"
                placeholder="цена"
                type="text"
                class="border border-gray-200 p-4 w-full"
            />
        </div>
        <div class="mb-4">
            <select
                v-model="valueInput.category"
                class="rounded-sm border-white-400 text-white bg-green-700 w-[90px] text-center"
            >
                <option value="all">Все</option>
                <option
                    v-for="category in categories"
                    :key="category.id"
                    :value="category.id"
                >
                    {{ category.name }}
                </option>
            </select>
        </div>

        <div class="mb-4">
            <textarea
                v-model="valueInput.content"
                placeholder="Описание"
                class="border border-gray-200 p-4 w-full"
            ></textarea>
        </div>
        <a
            @click.prevent="event"
            href="#"
            class="inline-block px-4 py-2 bg-green-700 border border-white-400 text-white"
            >Добавить товар</a
        >
    </div>
</template>
<script setup>
import { onMounted, reactive, ref } from "vue";

const VITE_BACK_API = import.meta.env.VITE_BACK_API;
const valueInput = reactive({
    title: "",
    content: "",
    category: "all",
    price: "",
});
const categories = ref([]);

onMounted(() => {});
function event() {}
</script>
<style></style>
