<template>
    <div>
        <h2>Subscription Details</h2>
        <table>
            <tr>
                <th>Name</th>
                <td>{{ subscription.name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ subscription.email }}</td>
            </tr>
        </table>
    </div>
</template>

<script>
import { mapActions, mapState } from 'pinia'
import { subscriptionStore } from '../stores/subscription'
import { useRoute } from 'vue-router'
export default {
    methods: {
        ...mapActions(subscriptionStore, {
            getSubscriptionDetails: 'getSubscriptionDetails'
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
    },
    created() {
        const route = useRoute()
        this.getSubscriptionDetails(route.params.id)
    },
    computed: {
        ...mapState(subscriptionStore, {
            subscription: 'getSubscription'
        })
    }
}
</script>