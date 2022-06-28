<template>
    <div class="lg:flex lg:items-center lg:justify-between">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 sm:text-3xl sm:truncate">Subscriptions</h2>
            <table class="table-auto">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>State</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(subscription, index) in subscriptions" :key="subscription.id">
                        <td>{{ index + 1 }}</td>
                        <td>{{ subscription.name }}</td>
                        <td>{{ subscription.email }}</td>
                        <td>{{ subscription.state }}</td>
                        <td><RouterLink :to="`/subscriptions/${subscription.id}`">View</RouterLink></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import { mapState } from 'pinia'
import { subscriptionStore } from '@/stores/subscription'
import { RouterLink } from 'vue-router'

export default {
components: {
    RouterLink
},
created() {
    const subStore = subscriptionStore()
    subStore.getAllSubscriptions()
},
computed: {
    ...mapState(subscriptionStore, {
        subscriptions: 'subscriptions',
        getSubscriptions: 'getSubscriptions'
    })
}
}
</script>