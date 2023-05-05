<template>
    <div class="text-center mt-4">
        <p class="lead">Last added words </p>
    </div>
    <table class="table table-sm text-center mt-2">
        <thead>
        <tr>
            <th scope="col">Word</th>
            <th scope="col">Translation</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(word, index) in words" :key="index">
            <td>{{word.word}}</td>
            <td>{{word.translation}}</td>
        </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    name: "fewNewestWordlist",
    props: ['words']
}
</script>
