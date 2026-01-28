<template>
    <div>
        <h2
            class="text-lg text-gray-800 mb-2 border-b border-gray-200 pb-2 font-semibold group-hover:text-blue-600"
        >
            {{ post.product_name }}
        </h2>
        <div class="flex justify-between items-center">
            <p class="text-gray-600 text-sm flex-1 mr-4">
                {{ post.product_description.substring(0, 30) }}
                {{ post.product_description.length > 30 ? "..." : "" }}
            </p>
            <span class="text-green-600 font-bold whitespace-nowrap">
                {{ post.product_price }} ₽
            </span>
        </div>
        <div class="mt-2 flex justify-between text-xs text-gray-400">
            <span>ID: {{ post.id }}</span>
            <span>{{ post.category_name }}</span>
        </div>
    </div>
</template>

<script setup>
defineProps({
    post: {
        type: Object,
        required: true,
    },
});
</script>
