<template>
  <div class="mb-4 p-4 bg-white border border-gray-200">
    <div class="mb-4">
      <input
        v-model="valueInput.title"
        placeholder="Название"
        type="text"
        class="border border-gray-200 p-4 w-full"
      />
    </div>
    <div class="mb-4">
      <input
        v-model="valueInput.price"
        placeholder="цена"
        type="text"
        class="border border-gray-200 p-4 w-full"
      />
    </div>
    <div class="mb-4">
      <select
        v-model="valueInput.category"
        class="rounded-sm border-white-400 text-white bg-green-700 w-[90px] text-center"
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
    </div>

    <div class="mb-4">
      <textarea
        v-model="valueInput.content"
        placeholder="Описание"
        class="border border-gray-200 p-4 w-full"
      ></textarea>
    </div>
    <a
      @click.prevent="event"
      href="#"
      class="inline-block px-4 py-2 bg-green-700 border border-white-400 text-white"
      >Обновить товар</a
    >
  </div>
</template>
<script setup>
import api from "@/composables/api";
import { onMounted, reactive, ref } from "vue";
import { useRouter } from "vue-router";

const VITE_BACK_API = import.meta.env.VITE_BACK_API;
const valueInput = reactive({
  id: "",
  title: "",
  content: "",
  category: "all",
  price: "",
});
const categories = ref([]);
const router = useRouter();

onMounted(() => {
  api({
    method: "GET",
    url: VITE_BACK_API + "/products/" + router.currentRoute.value.params.id,
    callback: (res) => {
      valueInput.id = router.currentRoute.value.params.id;
      valueInput.content = res.product_description;
      valueInput.title = res.product_name;
      valueInput.price = res.product_price;
      valueInput.category = res.category_id;
    },
    error: (err) => {
      console.log(err);
    },
  });
  api({
    method: "GET",
    url: VITE_BACK_API + "/categories",
    callback: (res) => {
      categories.value = res;
    },
    error: (err) => {
      console.log(err);
    },
  });
});
function event() {
  api({
    method: "patch",
    url: VITE_BACK_API + "/products/" + router.currentRoute.value.params.id,
    data: valueInput,
    headers: `Authorization: Bearer ${sessionStorage.getItem("token")}`,
    callback: (res) => {
      if (res == 200) {
        router.push("/admin");
      }
    },
    error: (err) => {
      sessionStorage.removeItem("token");
      router.push("/auth");
    },
  });
}
</script>
<style></style>
