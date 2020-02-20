<template>
  <v-container fluid>
    <main-table ref="mainTable"></main-table>
  </v-container>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator'

import Table from '../../components/Receive/Index/Table.vue'

@Component({
  components: {
    'main-table': Table
  }
})
export default class ReceiveIndex extends Vue {
}
</script>
