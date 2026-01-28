<template>
  <div class="text-center p-4">
    <div class="inline-flex flex-col items-center">
      <div
        class="h-2 bg-gradient-to-r from-blue-200 to-blue-400 rounded w-32 mb-2"
      ></div>
      <div class="text-sm text-gray-500">{{ message }}</div>
    </div>
  </div>
</template>

<script setup>
defineProps({
  message: {
    type: String,
    default: "Загрузка...",
  },
});
</script>
