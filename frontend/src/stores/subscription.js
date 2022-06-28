import { defineStore } from 'pinia'
import { sendRequest } from '../helpers/apiHelper'

export const subscriptionStore = defineStore({
  id: 'subscription',
  state: () => ({
    subscriptions: []
  }),
  getters: {
    getSubscriptions: ({ subscriptions }) => {
      return subscriptions
    }
  },
  actions: {
    getAllSubscriptions(state) {
      sendRequest('get', 'subscriptions').then(response => {
        const subscriptions = response.data.data.data
        console.log(subscriptions)
        this.subscriptions = subscriptions
      });
    },

    storeSubscription(data) {
      sendRequest('post', 'subscriptions', data).then(response => {
        this.getAllSubscriptions()
      });
    }
  }
})
