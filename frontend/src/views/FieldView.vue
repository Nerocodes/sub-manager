<template>
    <div class="lg:flex lg:items-center lg:justify-between">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 sm:text-3xl sm:truncate">Fields</h2>
            <table class="table-auto">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Title</th>
                        <th>Type</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(field, index) in fields" :key="field.id">
                        <td>{{ index + 1 }}</td>
                        <td>{{ field.title }}</td>
                        <td>{{ field.type }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import { mapState } from 'pinia'
import { useFieldStore } from '@/stores/field'

export default {
data() {
    return {
        
    }
},
created() {
    const fieldStore = useFieldStore()
    fieldStore.getAllFields()
},
computed: {
    ...mapState(useFieldStore, {
        fields: 'fields'
    })
}
}
</script>