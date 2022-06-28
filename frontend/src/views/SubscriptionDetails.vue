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
            <tr>
                <th>State</th>
                <td>
                    <div v-if="!editing">
                        {{ subscription.state }}
                    </div>
                    <div v-else>
                        <select name="status" id="status" v-model="status">
                            <option value="active">active</option>
                            <option value="junk">junk</option>
                            <option value="bounced">bounced</option>
                            <option value="unsubscribed">unsubscribed</option>
                            <option value="unconfirmed">unconfirmed</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr v-for="field in subscription.fields" :key="field.id">
                <th>{{ field.title }}</th>
                <td>{{ field.pivot.value }}</td>
            </tr>
        </table>
        <div v-if="!editing">
            <button @click="() => editing=true">Update Status</button>
        </div>
        <div v-else>
            <button @click="saveStatus">Save</button>
        </div>
    </div>
</template>

<script>
import { mapActions, mapState } from 'pinia'
import { subscriptionStore } from '../stores/subscription'
import { useRoute } from 'vue-router'
export default {
    data() {
        return {
            editing: false,
            status: ''
        }
    },
    methods: {
        ...mapActions(subscriptionStore, {
            getSubscriptionDetails: 'getSubscriptionDetails',
            updateStatus: 'updateSubscriptionStatus'
        }),
        createSubscription(e) {
            e.preventDefault()
            const data = {
                name: this.name,
                email: this.email
            }
            this.storeSubscription(data)
            this.$router.push('/')
        },
        saveStatus() {
            const data = {
                id: this.subscription.id,
                status: this.status
            }
            this.updateStatus(data)
            this.editing = false
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