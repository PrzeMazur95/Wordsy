<template>
    <form>
        <div class="form-group text-center mt-2 mx-4">
            <label for="exampleFormControlInput1">Enter new word !</label>
            <input class="form-control text-center" id="exampleFormControlInput1" placeholder="what have you learned today?">
        </div>
        <div class="form-group text-center m-4">
            <label for="exampleFormControlInput1">polish translation</label>
            <input class="form-control text-center" id="exampleFormControlInput1" placeholder="what have you learned today?">
        </div>
        <div class="form-group text-center m-4">
            <label for="exampleFormControlTextarea1">Description - type some hint</label>
            <textarea class="form-control text-center font-light" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="text-center">
            <button class="btn btn-dark">
                Save new Word
            </button>
        </div>
    </form>
</template>

<script>
export default {
    name: "addWordForm",
}
</script>
