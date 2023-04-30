<template>
    <div class="text-center mt-3">
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
        <tr v-for="(word, index) in playlist" :key="index">
            <th scope="row">{{index}}</th>
            <td>{{word}}</td>
            <td>{{word}}</td>
        </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    name: "fewNewestWordlist",
    data() {
        return {
            playlist: [
                'word 1',
                'word 2'
            ]
        }
    }
}
</script>
