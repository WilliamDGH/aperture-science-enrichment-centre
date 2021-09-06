<template>
    <div>
        <div>
            <!-- Username/Subject ID -->
            <div>
                <label for="username" class="block font-medium text-sm text-gray-700">
                    {{ userNameType }}
                </label>
                <input
                    id="username"
                    type="text"
                    name="username"
                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    required
                    autofocus
                    v-model="username"
                >
                <span
                    v-if="userNameError"
                    class="text-xs text-red-600"
                >
                    {{ userNameError }}
                </span>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password" class="block font-medium text-sm text-gray-700">
                    Password
                </label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    required
                    autofocus
                    v-model="password"
                >
                <span
                    v-if="passwordError"
                    class="text-xs text-red-600"
                >
                    {{ passwordError }}
                </span>
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input
                        id="remember_me"
                        type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        name="remember"
                        v-model="rememberMe"
                    >
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <button
                    class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                    @click="logIn"
                >
                    Log In as {{ userType }}
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    name: 'LogInForm',
    props: {
        logInUrl: {
            type: String,
        },
        isAdmin: {
            type: Boolean,
            default: true,
        },
    },
    data() {
        return {
            username: null,
            password: null,
            rememberMe: false,
            errors: {}
        }
    },
    computed: {
        userNameType() {
            return this.isAdmin ? 'User name' : 'Subject ID'
        },
        userType() {
            return this.isAdmin ? 'GLaDOS' : 'Subject'
        },
        userNameError() {
            return _.get(this.errors, 'username.0', _.get(this.errors, 'subject_id.0'))
        },
        passwordError() {
            return _.get(this.errors, 'password.0')
        }
    },
    methods: {
        logIn() {
            this.errors = {}
            const userNameType = this.isAdmin ? 'username' : 'subject_id'
            const data = {
                is_admin: this.isAdmin,
                [userNameType]: this.username,
                password: this.password,
                remember: this.rememberMe,
            }
            axios.post(this.logInUrl, data)
                .then(({ data }) => {
                    window.location = data.redirect;
                })
                .catch((error) => {
                    this.errors = _.get(error, 'response.data.errors', {})
                })
        }
    },
    watch: {
        isAdmin: {
            handler(value, oldValue) {
                if (value !== oldValue) {
                    this.username = null
                    this.password = null
                    this.rememberMe = false
                }
            },
            immediate: true,
        },
    },
}
</script>
