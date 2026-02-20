<template>
    <div>
        <IndexLayout>
            <div
                class="mb-2 p-11 bg-sky-400 border border-sky-200 rounded-sm flex justify-center flex-wrap"
            >
                <h1 class="font-bold text-lg w-[100%] flex justify-center">
                    Вход
                </h1>
                <form
                    @submit.prevent="true"
                    class="flex justify-center flex-wrap"
                >
                    <span class="w-1/1 text-left">email</span>
                    <input
                        v-model="valueInput.email"
                        type="text"
                        class="w-1/1 bg-white rounded-sm p-2"
                    />
                    <span class="w-1/1 text-left">password</span>
                    <input
                        v-model="valueInput.password"
                        type="text"
                        class="w-1/1 bg-white rounded-sm p-2"
                    />
                    <button
                        @click="login"
                        class="inline-block px-4 py-2 bg-green-700 border border-white-400 text-white rounded-sm mt-5"
                    >
                        Войти
                    </button>
                </form>
                <div class="flex flex-col" v-if="errors">
                    <p v-for="error in errors">{{ error }}</p>
                </div>
            </div>
        </IndexLayout>
    </div>
</template>
<script setup>
import { onMounted, reactive, ref, watch } from "vue";
import IndexLayout from "../../layouts/IndexLayout.vue";
import useValidateAuth from "../../composables/useValidateAuth";
import { router } from "@inertiajs/vue3";

const valueInput = reactive({ email: "", password: "" });
const errors = ref(null);

watch(valueInput, (newValue) => {
    valueInput.email = newValue.email;
    valueInput.password = newValue.password;
    errors.value = null;
});

const props = defineProps({
    status: String,
});
onMounted(() => {
    // errors.value = props.status ? props.status : null;

    if (props.status) {
        sessionStorage.setItem("token", props.status);
        router.get("/admin", props.status, {
            headers: {
                Authorization: `Bearer ${sessionStorage.getItem("token")}`,
            },
        });
    }
});

const login = () => {
    console.log(props.status);

    errors.value = useValidateAuth(valueInput);

    if (errors.value.length == 0) {
        router.post(
            "/login",
            {
                data: valueInput,
            },
            {
                preserveState: true,
                replace: true,
            }
        );
    }
};
</script>
<style></style>
