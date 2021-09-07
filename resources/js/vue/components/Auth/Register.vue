<template>
    <div  class="w-4/5 mx-auto mt-8 max-w-7xl">

        <h2 class="text-xl mb-4">Register new subject</h2>

        <div>
            <label for="subject_id" class="block font-medium text-sm text-gray-700">
                Subject ID
            </label>
            <input
                id="subject_id"
                type="text"
                name="subject_id"
                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                required
                autofocus
                v-model="subjectId"
            >
            <span
                v-if="subjectIdError"
                class="text-xs text-red-600"
            >
            {{ subjectIdError }}
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

        <!-- Confirm Password -->
        <div class="mt-4">
            <label for="confirm_password" class="block font-medium text-sm text-gray-700">
               Confirm Password
            </label>
            <input
                id="confirm_password"
                type="password"
                name="confirm_password"
                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                required
                autofocus
                v-model="confirmPassword"
            >
            <span
                v-if="passwordError"
                class="text-xs text-red-600"
            >
                {{ passwordError }}
            </span>
        </div>

        <div class="flex items-center justify-end mt-4">
            <p v-if="message">{{ message }}</p>

            <button
                v-if="message"
                class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                @click="clearForm"
            >
                Clear Form
            </button>

            <button
                class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                @click="register"
            >
                Register
            </button>
        </div>

    </div>
</template>

<script>
import LogInForm from './LogInForm.vue'
import axios from "axios";
import _ from "lodash";

export default {
    name: 'Register',
    components: {
        LogInForm,
    },
    props: {
        registerUrl: {
            type: String,
        },
    },
    data() {
        return {
            subjectId: null,
            password: null,
            confirmPassword: null,
            errors: {},
            message: null,
        }
    },
    computed: {
        subjectIdError() {
            return _.get(this.errors, 'subject_id.0')
        },
        passwordError() {
            return _.get(this.errors, 'password.0')
        }
    },
    methods: {
        register() {
            this.errors = {}
            const data = {
                subject_id: this.subjectId,
                password: this.password,
                password_confirmation: this.confirmPassword,
            }
            axios.post(this.registerUrl, data)
                .then(({ data }) => {
                    this.message = data.success
                })
                .catch((error) => {
                    this.errors = _.get(error, 'response.data.errors', {})
                })
        },
        clearForm() {
            this.subjectId = null
            this.password = null
            this.confirmPassword = null
            this.errors = {}
            this.message = null
        }
    },
}
</script>
