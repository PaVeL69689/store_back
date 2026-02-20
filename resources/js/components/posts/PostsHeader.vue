<template>
    <div
        class="mb-2 p-2 bg-sky-400 border border-sky-200 rounded-sm flex justify-center items-center"
    >
        <h1 class="font-bold text-lg">Посты</h1>
        <form class="ml-4">
            <select
                class="rounded-sm border-white-400 text-white bg-green-700 w-[90px] text-center"
                v-model="selectedCategory"
                @change="emitCategoryChange"
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
        </form>
    </div>
</template>

<script setup>
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    categories: Array,
});

const emit = defineEmits(["category-change"]);

const selectedCategory = ref(props.currentCategory || "all");

const emitCategoryChange = () => {
    emit("category-change", selectedCategory.value);
};
</script>
