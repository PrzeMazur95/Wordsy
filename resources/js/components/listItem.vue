<template>
    <tr>
        <th>{{word.id}}</th>
        <td>{{ word.word }}</td>
        <td>{{word.translation}}</td>
        <td>buttons</td>
    </tr>
</template>

<script>
export default {
    name: "listItem",
    props: ['word']
}
</script>
