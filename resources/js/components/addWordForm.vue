<template>
    <form @submit.prevent>
        <div class='alert text-center' :class="responseDivClass" role="alert">
            <p id="axiosResponse" v-html="axiosResponse"></p>
        </div>
        <div class="form-group text-center mt-2 mx-4 ">
            <p class ="lead">Enter new word !</p>
            <input class="form-control text-center" v-model="word.name" placeholder="what have you learned today?">
        </div>
        <div class="form-group text-center m-4">
            <p class ="lead">Provide a translation !</p>
            <input class="form-control text-center" id="polishTranslation" v-model="word.polishTranslation" placeholder="what it means?">
        </div>
        <div class="form-group text-center mx-4 mb-2">
            <p class ="lead">Give some example !</p>
            <textarea class="form-control text-center font-light" id="example" rows="3" v-model="word.example" placeholder="Describe to better remember..."></textarea>
        </div>
        <div class="text-center">
            <button
                :class="[ word.name && word.example  && word.polishTranslation? 'btn-success' : 'btn-dark', 'btn']"
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
                example: ""
            },
            axiosResponse: '',
            responseDivClass: ''
        }
    },
    methods: {
        addWord() {
            if( this.word.name === "" || this.word.polishTranslation === "" || this.word.example === "") {
                alert('You have to provide a word, translation and some example');
                return;
            }
            axios.post('api/Words', {
                word: this.word.name,
                polishTranslation: this.word.polishTranslation,
                example: this.word.example
            })
                .then( response => {
                    if( response.status === 200 ){
                        this.axiosResponse = 'Success';
                        this.responseDivClass = 'alert-success';
                        this.word.name = '';
                        this.word.polishTranslation = '';
                        this.word.example = '';
                    }
                })
                .catch( error => {
                    this.axiosResponse = 'Failed';
                    this.responseDivClass = 'alert-danger';
                    console.log( error )
                })
        }
    }
}
</script>
