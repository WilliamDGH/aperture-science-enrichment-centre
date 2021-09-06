<template>
    <div class="w-4/5 mx-auto mt-8 max-w-7xl">
        <div v-for="question in questions" class="my-4">
            <label class="block font-medium text-sm text-gray-700">
                {{ question.label }}
            </label>
            <div v-if="question.type === '1'">
                <select v-model="entry[question.id]">
                    <option disabled value="">Please select one..</option>
                    <option v-for="option in question.options" :value="option.value">
                        {{ option.label }}
                    </option>
                </select>
            </div>
            <input
                v-else-if="question.type === '2'"
                type="text"
                name="subject_id"
                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                required
                autofocus
                v-model="entry[question.id]"
            >
            <div v-else-if="question.type === '3'">
                <input type="radio" id="one" :value="true" v-model="entry[question.id]">
                <label for="one">True</label>
                <br>
                <input type="radio" id="two" :value="false" v-model="entry[question.id]">
                <label for="two">False</label>
            </div>

        </div>

        <div class="flex items-center justify-end mt-4">
            <button
                class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                @click="submit"
            >
                Submit
            </button>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import _ from "lodash";

export default {
    name: 'Questionnaire',
    props: {
        questions:{ type: Array },
        submitUrl:{ type: String },
    },
    data() {
        return {
            entry: {},
            errors: {},
        }
    },
    methods: {
        submit() {
            this.errors = {}

            axios.post(this.submitUrl, {
                entry: this.entry
            })
                .then(({ data }) => {
                    window.location = data.redirect;
                })
                .catch((error) => {
                    this.errors = _.get(error, 'response.data.errors', {})
                })
        },
    },
    mounted() {
        if (this.questions) {
            const entry = {}
            _.each(this.questions, (question) => {
                entry[question.id] = null
            })

            this.entry = entry
        }

    }
}
</script>
