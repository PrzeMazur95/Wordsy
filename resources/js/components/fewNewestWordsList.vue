<template>
    <div class="text-center mt-4">
        <p class="lead">Last added words </p>
    </div>
    <table class="table text-center mt-2">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Word</th>
            <th scope="col">Translation</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(word, index) in words" :key="index">
            <th scope="row">{{word.id}}</th>
            <td>{{word.word}}</td>
            <td>{{word.translation}}</td>
        </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    name: "fewNewestWordlist",
    data() {
        return {
            words: []
        }
    },
    methods: {
        getSmallList () {
            axios.get('api/Words/amountOfWords/3')
                .then ( response => {
                    this.words = response.data.data
                })
                .catch( error => {
                    console.log( error);
                })
        }
    },
    created() {
        this.getSmallList();
    }
}
</script>
