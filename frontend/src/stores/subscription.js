import { defineStore } from 'pinia'
import { sendRequest } from '../helpers/apiHelper'

export const subscriptionStore = defineStore({
  id: 'subscription',
  state: () => ({
    subscriptions: [],
    subscription: {}
  }),
  getters: {
    getSubscriptions: ({ subscriptions }) => {
      return subscriptions
    },
    getSubscription: ({ subscription }) => {
      return subscription
    }
  },
  actions: {
    getAllSubscriptions(state) {
      sendRequest('get', 'subscriptions').then(response => {
        const subscriptions = response.data.data.data
        this.subscriptions = subscriptions
      });
    },

    storeSubscription(data) {
      sendRequest('post', 'subscriptions', data).then(response => {
        this.getAllSubscriptions()
      });
    },

    getSubscriptionDetails(id) {
      sendRequest('get', `subscriptions/${id}`).then(response => {
        const subscription = response.data.data
        this.subscription = subscription
      });
    }
  }
})
