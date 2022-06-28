<template>
    <main>
        <form action="" @submit="createSubscription">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" v-model="name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" v-model="email">
            </div>
            <div class="form-group" v-for="field in fields" :key="field.id">
                <label :for="field.id">{{ field.title }}</label>
                <input type="text" name="custom" :id="field.id" v-model="fieldValues[field.id]">
            </div>
            <input type="submit" value="Create Subscription">
        </form>
    </main>
</template>

<script>
import { mapActions, mapState } from 'pinia'
import { useFieldStore } from '../stores/field'
import { subscriptionStore } from '../stores/subscription'
export default {
    data() {
        return {
            name: '',
            email: '',
            fieldValues: {}
        }
    },
    created() {
        this.getAllFields()
    },
    methods: {
        ...mapActions(subscriptionStore, {
            storeSubscription: 'storeSubscription'
        }),
         ...mapActions(useFieldStore, {
            getAllFields: 'getAllFields'
        }),
        createSubscription(e) {
            e.preventDefault()
            const data = {
                name: this.name,
                email: this.email
            }
            const fieldData = []
            for(const fieldId in this.fieldValues) {
                const format = {
                    field_id: fieldId,
                    value: this.fieldValues[fieldId]
                }
                fieldData.push(format)
            }
            data['fields'] = fieldData
            this.storeSubscription(data)
            this.$router.push('/')
        }
    },
    computed: {
        ...mapState(useFieldStore, {
            fields: 'getFields'
        })
    }
}
</script>