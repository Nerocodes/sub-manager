<template>
    <div class="lg:flex lg:items-center lg:justify-between">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">Subscriptions</h2>
            <ol>
                <li v-for="subscription in subscriptions" :key="subscription.id" class="flex-1">
                    <p>{{ subscription.name }}</p>
                    <p>{{ subscription.email }}</p>
                </li>
            </ol>
        </div>
    </div>
</template>

<script>
import { mapStores, mapState } from 'pinia'
import { subscriptionStore } from '@/stores/subscription'

export default {
data() {
    return {
        
    }
},
created() {
    const subStore = subscriptionStore()
    subStore.getAllSubscriptions()
},
computed: {
    ...mapStores(subscriptionStore),
    ...mapState(subscriptionStore, {
        subscriptions: 'subscriptions',
        getSubscriptions: 'getSubscriptions'
    })
}
}
</script>