<template>
  <div class="text-center p-8">
    <div
      class="inline-block animate-spin rounded-full h-12 w-12 border-4 border-blue-200 border-t-blue-500"
    ></div>
    <p class="mt-4 text-gray-600">{{ message }}</p>
  </div>
</template>

<script setup>
defineProps({
  message: {
    type: String,
    default: "Загружаем...",
  },
});
</script>
