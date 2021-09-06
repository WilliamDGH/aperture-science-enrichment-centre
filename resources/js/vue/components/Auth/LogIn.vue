<template>
    <div>
        <div class="flex py-4">
            <div
                class="flex-auto inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs tracking-widest hover:bg-gray-500 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                :class="gladosLogIn ? 'bg-gray-500': 'bg-gray-300'"
                @click="setLogIn(true)"
            >
                <p class="mx-auto">GLaDOS Login</p>
            </div>
            <div
                class="flex-auto ml-3 inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs tracking-widest hover:bg-gray-500 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                :class="gladosLogIn ? 'bg-gray-300': 'bg-gray-500'"
                @click="setLogIn(false)"
            >
                <p class="mx-auto">Subject Login</p>
            </div>
        </div>

        <form>
            <!-- Email Address -->
            <div>
                <label for="email" class="block font-medium text-sm text-gray-700">
                    Email
                </label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    required
                    autofocus
                    :value="email"
                >
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
                    :value="password"
                >
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input
                        id="remember_me"
                        type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        name="remember"
                        :value="rememberMe"
                    >
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <button class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                    Log In
                </button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: 'LogIn',
    data() {
        return {
            email: null,
            password: null,
            rememberMe: false,
            gladosLogIn: true,
        }
    },
    methods: {
        setLogIn(boolean) {
            this.gladosLogIn = boolean
            console.log(this.gladosLogIn)
        },
    },
}
</script>
