<template>
    <tr class="text-center">
        <th>{{word.id}}</th>
        <td>{{ word.word }}</td>
        <td>{{word.translation}}</td>
        <td>
            <button type="button" class="btn btn-outline-primary btn-sm mx-1">Primary</button>
            <button type="button" class="btn btn-outline-danger btn-sm">Danger</button>
        </td>
    </tr>
</template>

<script>
export default {
    name: "listItem",
    props: ['word']
}
</script>
