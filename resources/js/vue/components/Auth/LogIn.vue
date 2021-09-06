<template>
    <div>
        <div class="flex py-4">
            <div
                class="flex-auto inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs tracking-widest hover:bg-gray-500 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                :class="isAdmin ? 'bg-gray-500': 'bg-gray-300'"
                @click="setLogIn(true)"
            >
                <p class="mx-auto">GLaDOS Login</p>
            </div>
            <div
                class="flex-auto ml-3 inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs tracking-widest hover:bg-gray-500 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                :class="isAdmin ? 'bg-gray-300': 'bg-gray-500'"
                @click="setLogIn(false)"
            >
                <p class="mx-auto">Subject Login</p>
            </div>
        </div>

        <LogInForm
            :is-admin="isAdmin"
            :log-in-url="logInUrl"
        ></LogInForm>
    </div>
</template>

<script>
import LogInForm from './LogInForm.vue'

export default {
    name: 'LogIn',
    components: {
        LogInForm,
    },
    props: {
        logInUrl: {
            type: String,
        },
    },
    data() {
        return {
            isAdmin: true,
        }
    },
    methods: {
        setLogIn(boolean) {
            this.isAdmin = boolean
        },
    },
}
</script>
