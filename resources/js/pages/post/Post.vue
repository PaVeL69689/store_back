<template>
    <IndexLayout>
        <div
            class="p-4 mb-4 bg-white border border-gray-200 hover:shadow-lg hover:scale-[1.01] transition-all duration-300 rounded-lg cursor-pointer group"
        >
            <PostsList :post="props.product.data" />
        </div>
    </IndexLayout>
</template>
<script setup>
import { onMounted, ref, watch } from "vue";

import IndexLayout from "../../layouts/IndexLayout.vue";
import PostsList from "../../components/posts/PostsList.vue";

const VITE_BACK_API = import.meta.env.VITE_BACK_API;

const props = defineProps({
    product: Object,
});
</script>
<style></style>
