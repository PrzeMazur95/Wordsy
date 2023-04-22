<template>
    <form @submit.prevent>
        <div class="form-group text-center mt-2 mx-4">
            <label for="word">Enter new word !</label>
            <input class="form-control text-center" v-model="word.name" placeholder="what have you learned today?">
        </div>
        <div class="form-group text-center m-4">
            <label for="polishTranslation">polish translation</label>
            <input class="form-control text-center" id="polishTranslation" v-model="word.polishTranslation" placeholder="what have you learned today?">
        </div>
        <div class="form-group text-center m-4">
            <label for="description">Description</label>
            <textarea class="form-control text-center font-light" id="description" rows="3" v-model="word.description"></textarea>
        </div>
        <div class="text-center">
            <button
                :class="[ word.name ? 'btn-success' : 'btn-dark', 'btn']"
                @click="addWord()"
            >
                Save new Word
            </button>
        </div>
    </form>
</template>

<script>
export default {
    name: "addWordForm",
    data: function () {
        return {
            word: {
                name: "",
                polishTranslation: "",
                description: ""
            }
        }
    },
    methods: {
        addWord() {
            if( this.word.name === "") {
                alert('You have to provide a word');
                return;
            }
            axios.post('api/Words', {
                word: this.word.name,
                example: this.word.description
            })
                .then( response => {
                    if( response.status === 200 ){
                        alert('Word has been added!');
                    }
                })
                .catch( error => {
                    console.log( error )
                })
        }
    }
}
</script>
