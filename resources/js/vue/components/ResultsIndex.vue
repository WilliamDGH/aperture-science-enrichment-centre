<template>
        <table class="w-4/5 mx-auto mt-8 max-w-7xl">
            <tr class="grid grid-cols-3 gap-4">
                <th>Entry ID</th>
                <th>Subject ID</th>
            </tr>
            <tr class="grid grid-cols-3 gap-4" v-for="result in results">
                <td class="text-center">{{ result.id }}</td>
                <td class="text-center">{{ result.user.subject_id || result.user.username }}</td>
            </tr>
        </table>
</template>

<script>
import axios from "axios";
import _ from "lodash";

export default {
    name: 'ResultsIndex',
    props: {
        results:{ type: Array },
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
}
</script>
