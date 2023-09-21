import { ref, computed } from "vue";

export default function useAuthStore() {
    const tab = ref(0);
    const email = ref("");
    const password = ref("");
    const emailErrorMessage = ref("");
    const passwordErrorMessage = ref("");
    const passwordVisible = ref(false);

    function setTab(value) {
        tab.value = value;
    }

    // Define computed properties for form validation rules
    const emailRules = computed(() => [
        (value) => {
            if (value) return true;
            emailErrorMessage.value = "Email is required.";
            return false;
        },
        (value) => {
            if (/^[a-z.-]+@[a-z.-]+\.[a-z]+$/i.test(value)) return true;
            emailErrorMessage.value = "Must be a valid e-mail.";
            return false;
        },
    ]);

    const passwordRules = computed(() => [
        (value) => {
            if (value) return true;
            passwordErrorMessage.value = "Password is required.";
            return false;
        },
        (value) => {
            if (value?.length >= 6) return true;
            passwordErrorMessage.value =
                "Password needs to be at least 6 characters.";
            return false;
        },
    ]);

    // Define the login method
    function login() {
        // Perform login logic here
        console.log("login");
    }

    return {
        tab,
        setTab,
        email,
        password,
        emailRules,
        passwordRules,
        emailErrorMessage,
        passwordErrorMessage,
        passwordVisible,
        login,
    };
}
