<template>
  <div class="p-4 mb-4 bg-red-50 border border-red-200 text-red-700 rounded-lg">
    <div class="flex items-center">
      <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
        <path
          fill-rule="evenodd"
          d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
          clip-rule="evenodd"
        />
      </svg>
      <span class="font-medium">Ошибка:</span>
    </div>
    <p class="mt-1 ml-7">{{ error }}</p>
    <button
      @click="$emit('retry')"
      class="mt-2 ml-7 px-4 py-2 bg-red-100 hover:bg-red-200 text-red-700 rounded text-sm font-medium transition-colors"
    >
      Повторить попытку
    </button>
  </div>
</template>

<script setup>
defineProps({
  error: String,
});

defineEmits(["retry"]);
</script>
