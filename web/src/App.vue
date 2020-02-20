<template>
  <v-app>
    <bs-navigation></bs-navigation>
    <bs-tool-bar></bs-tool-bar>
    <v-content>
      <router-view></router-view>
    </v-content>
  </v-app>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator'

import Navigation from './components/Navigation.vue'
import ToolBar from './components/ToolBar.vue'

@Component({
  components: {
    'bs-navigation': Navigation,
    'bs-tool-bar': ToolBar
  }
})

export default class App extends Vue {

}
</script>
