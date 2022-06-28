import { defineStore } from 'pinia'
import { sendRequest } from '../helpers/apiHelper'

export const useFieldStore = defineStore({
  id: 'field',
  state: () => ({
    fields: []
  }),
  getters: {
    getFields: ({ fields }) => {
      return fields
    }
  },
  actions: {
    getAllFields() {
      sendRequest('get', 'fields').then(response => {
        const fields = response.data.data.data
        this.fields = fields
      });
    },
  }
})
