<template>
    <div class="row">
        <div class="card col-3">
            <img class="card-img-top" src="https://picsum.photos/id/237/800/1200" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card col-3" @click="logtext">
            <img class="card-img-top" src="https://picsum.photos/id/227/800/1200" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card col-3" @click="count++">
            <img class="card-img-top" src="https://picsum.photos/id/217/800/1200" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{ count }}</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card col-3">
            <img class="card-img-top" src="https://picsum.photos/id/247/800/1200" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
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
                    console.log(result.data);
                });
        }
    },
    data() {
        return {
            count: 0
        }
    },
    created() {
        this.fetchWords();
    }
}
</script>
