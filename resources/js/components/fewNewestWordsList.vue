<template>
    <div class="text-center mt-3">
        <div v-for="(word, index) in playlist" :key="index">
            {{index}} - {{word}}
        </div>
    </div>
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
