<template>
    <div class="row">
        <div class="card col-4">
            <img class="card-img-top" src="https://picsum.photos/id/237/800/1200" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title text-center">Add new Word!</h5>
                <p class="card-text text-center">Do you have some new word which you should remember? Don't wait, save it!</p>
            </div>
            <a href="/addWord" class="btn btn-primary">Add new!</a>
        </div>
        <div class="card col-4" @click="logtext">
            <img class="card-img-top" src="https://picsum.photos/id/227/800/1200" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title text-center">All words</h5>
                <p class="card-text text-center">Do you want to see all stored words? It would be a long list... but that is great! Let's go !</p>
            </div>
            <a href="#" class="btn btn-primary">Check all!</a>
        </div>
        <div class="card col-4">
            <img class="card-img-top" src="https://picsum.photos/id/217/800/1200" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title text-center">Challenge!</h5>
                <p class="card-text text-center">Do you want to chellenge yourself? Go on and check, if you remember all your stored words</p>
            </div>
            <a href="#" class="btn btn-primary">Try yourself!</a>
        </div>
    </div>
</template>

<script>
export default {
    name: "Content",
    methods: {
        logtext() {
            console.log('test text');
        },
        fetchWords() {
            fetch('api/Words')
                .then(result => result.json())
                .then(result => {
                    this.words = result.data;
                });
        }
    },
    data() {
        return {
            count: 0,
            words: []
        }
    },
    created() {
        this.fetchWords();
    }
}
</script>
