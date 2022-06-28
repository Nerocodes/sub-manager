<script setup>
import SubscriptionTable from '@/components/SubscriptionTable.vue'

</script>

<template>
  <main>
    <button @click="() => this.$router.push('/create-subscription')">Create Subscription</button>
    <SubscriptionTable />
  </main>
</template>
