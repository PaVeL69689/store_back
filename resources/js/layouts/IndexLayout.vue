<template>
    <div class="w-1/2 mx-auto p-10">
        <div
            class="mb-4 p-4 bg-sky-400 border border-sky-200 rounded-sm flex justify-center"
        >
            <h1 class="text-center text-lg font-semibold flex items-center">
                Website
            </h1>
        </div>
        <slot></slot>
    </div>
</template>
<script>
export default {
    name: "IndexLayout",
    methods: {},
};
</script>
<style></style>
