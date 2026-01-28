import { onUnmounted, watch } from "vue";

export function useCategoryWatcher(selectedCategory, loadProducts) {
  let timeoutId = null;

  const setupWatcher = () => {
    watch(
      selectedCategory,
      (newCategory) => {
        if (timeoutId) {
          clearTimeout(timeoutId);
        }

        timeoutId = setTimeout(() => {
          loadProducts(newCategory);
        }, 300);
      },
      { immediate: true }
    );
  };

  const cleanup = () => {
    if (timeoutId) {
      clearTimeout(timeoutId);
    }
  };

  onUnmounted(cleanup);

  return {
    setupWatcher,
    cleanup,
  };
}
