import { ref, onUnmounted, watch } from "vue";
import api from "@/composables/api";

export function usePosts() {
  const VITE_BACK_API = import.meta.env.VITE_BACK_API;
  const posts = ref([]);
  const categories = ref([]);
  const selectedCategory = ref("all");
  const loading = ref(false);
  const error = ref(null);
  const abortController = ref(null);

  const getUniqueCategories = (data) => {
    const categoryMap = new Map();

    data.forEach((item) => {
      if (!categoryMap.has(item.category_id)) {
        categoryMap.set(item.category_id, {
          id: item.category_id,
          name: item.category_name,
        });
      }
    });

    return Array.from(categoryMap.values());
  };

  const loadProducts = async (category = "all") => {
    if (abortController.value) {
      abortController.value.abort();
    }
    abortController.value = new AbortController();
    loading.value = true;
    error.value = null;
    try {
      const response = await new Promise((resolve, reject) => {
        api({
          method: "GET",
          url: VITE_BACK_API + "/products?category=" + category,
          signal: abortController.value?.signal,
          callback: (res) => resolve(res),
          error: (err) => reject(err),
        });
      });

      posts.value = response;
      if (category === "all" && categories.value.length === 0) {
        categories.value = getUniqueCategories(response);
      }
    } catch (err) {
      if (err.name === "AbortError") {
        return;
      }
      error.value = err.message || "Не удалось загрузить посты";

      setTimeout(() => {
        error.value = null;
      }, 5000);
    } finally {
      loading.value = false;
    }
  };

  const retryLoad = () => {
    error.value = null;
    loadProducts(selectedCategory.value);
  };

  return {
    posts,
    categories,
    selectedCategory,
    loading,
    error,
    loadProducts,
    retryLoad,
    abortController,
  };
}
