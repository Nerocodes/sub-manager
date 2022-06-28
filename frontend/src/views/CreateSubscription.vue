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
            <input type="submit" value="Create Subscription">
        </form>
    </main>
</template>

<script>
import { mapActions } from 'pinia'
import { subscriptionStore } from '../stores/subscription'
export default {
    data() {
        return {
            name: '',
            email: ''
        }
    },
    methods: {
        ...mapActions(subscriptionStore, {
            storeSubscription: 'storeSubscription'
        }),
        createSubscription(e) {
            e.preventDefault()
            const data = {
                name: this.name,
                email: this.email
            }
            this.storeSubscription(data)
            this.$router.push('/')
        }
    }
}
</script>