<template>
    <IndexLayout>
        <div
            class="mb-2 p-2 bg-sky-400 border border-sky-200 rounded-sm flex justify-center flex-wrap"
        >
            <h1 class="font-bold text-lg w-1/1 flex justify-center">
                Управление товарами
            </h1>

            <MainButton>Создать товар</MainButton>
        </div>

        <div
            v-for="product in products.data"
            :key="product.id"
            class="p-4 mb-4 bg-white border border-gray-200 hover:shadow-lg hover:scale-[1.01] transition-all duration-300 rounded-lg cursor-pointer group"
        >
            <PostsList :post="product" />
            <div class="flex justify-end">
                <svg
                    @click="deletePost(product.id)"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="size-6"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"
                    />
                </svg>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="size-6"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 0 0-3.7-3.7 48.678 48.678 0 0 0-7.324 0 4.006 4.006 0 0 0-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 0 0 3.7 3.7 48.656 48.656 0 0 0 7.324 0 4.006 4.006 0 0 0 3.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3-3 3"
                    />
                </svg>
            </div>
        </div>
    </IndexLayout>
</template>
<script setup>
import IndexLayout from "../../layouts/IndexLayout.vue";
import { onMounted, onUnmounted } from "vue";

import PostsList from "@/components/posts/PostsList.vue";

import MainButton from "@/components/ui/MainButton.vue";

import { router } from "@inertiajs/vue3";

onMounted(() => {});

const props = defineProps({
    products: Object,
});

onUnmounted(() => {
    if (abortController.value) {
        abortController.value.abort();
    }
});

function deletePost(id) {
    console.log(id);

    if (confirm("Вы уверены?")) {
        router.delete(`/products/${id}`, {
            headers: {
                Authorization: `Bearer ${sessionStorage.getItem("token")}`,
            },
        });
    }
}
</script>
<style></style>
