<template>
  <button
    class="inline-block px-4 py-2 bg-green-700 border border-white-400 text-white rounded-sm mt-5 hover:scale-[1.01] transition-all duration-300 rounded-lg cursor-pointer group"
  >
    <slot class="mr-2"></slot>
  </button>
</template>
<script setup>
// const props = defineProps({
//   clickBtn: {
//     type: Function,
//     default: null,

//   },
// });

// function event(evt) {
//   props.clickBtn(evt);
// }
</script>
<style></style>
