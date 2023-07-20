// useToggleDatatable.js
import { ref } from "vue";
import { useToast } from "vue-toast-notification";
import "vue-toast-notification/dist/theme-sugar.css";
import {useLoading} from 'vue-loading-overlay'
const $loading = useLoading({
    // options
    });
export const useCustomLoader = () => {
  const initializeLoader = (successMessage) => {
    return new Promise((resolve, reject) => {
      const currentComponent = ref(null); // Define currentComponent if needed
      const loader = $loading.show({
        // Optional parameters
        loader: "spinner",
        color: "#00FF00",
        width: 94,
        height: 94,
        backgroundColor: "#808080",
        opacity: 0.5,
        zIndex: 999,
      });
      // simulate AJAX
      setTimeout(() => {
        loader.hide();
        const $toast = useToast();
        let instance = $toast.success(successMessage, {
          position: "top-right",
        });
        currentComponent.value = "Datatable";
        resolve(true); // Resolve the Promise after loading and showing success
      }, 500);
    });
  };

  return {
    initializeLoader,
  };
};
