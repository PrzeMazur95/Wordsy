<template>
    <tr class="text-center">
        <th>{{word.id}}</th>
        <td>{{ word.word }}</td>
        <td>{{word.translation}}</td>
        <td>
            <button type="button" class="btn btn-outline-primary btn-sm mx-1">Edit</button>
            <button type="button" class="btn btn-outline-danger btn-sm">Delete</button>
        </td>
    </tr>
</template>

<script>
export default {
    name: "listItem",
    props: ['word']
}
</script>
