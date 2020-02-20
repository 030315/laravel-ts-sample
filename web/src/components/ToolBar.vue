<template>
  <v-app-bar app>
    <v-toolbar-title></v-toolbar-title>
    <v-spacer></v-spacer>
    <v-btn
      text
    >
      ログアウト
    </v-btn>
  </v-app-bar>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator'

@Component
export default class ToolBar extends Vue {

}
</script>
