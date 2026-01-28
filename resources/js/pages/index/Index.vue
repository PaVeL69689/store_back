<template>
    <div>
        <IndexLayout>
            <PostsHeader
                :categories="props.category"
                @category-change="handleCategoryChange"
            />

            <div
                v-for="product in props.products.data"
                :key="product.id"
                class="p-4 mb-4 bg-white border border-gray-200 hover:shadow-lg hover:scale-[1.01] transition-all duration-300 rounded-lg cursor-pointer group"
            >
                <Link :href="`/product/${product.id}`">
                    <PostsList :post="product" />
                </Link>
            </div>
        </IndexLayout>
    </div>
</template>

<script setup>
import IndexLayout from "../../layouts/IndexLayout.vue";
import PostsHeader from "../../components/posts/PostsHeader.vue";
import PostsList from "../../components/posts/PostsList.vue";
import { Link, router } from "@inertiajs/vue3";

const props = defineProps({
    products: Object,
    category: Object,
    currentCategory: String,
});

const handleCategoryChange = (categoryId) => {
    router.get(
        "/products",
        {
            category: categoryId,
        },
        {
            preserveState: true,
            replace: true,
        }
    );
};
</script>
