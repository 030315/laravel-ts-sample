<template>
  <v-card>
    <v-navigation-drawer app>
      <v-list-item>
        <v-list-item-content>
          <v-list-item-title class="title">
            アプリケーション
          </v-list-item-title>
          <v-list-item-subtitle>
            subtext
          </v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item>
      <v-divider></v-divider>
      <v-list
        dense
        nav
      >
        <!-- 受信トレイ -->
        <v-list-item link :to="{name: 'Receive'}">
          <v-list-item-icon>
            <v-badge>
              <template v-slot:badge>10</template>
              <v-icon>mdi-email</v-icon>
            </v-badge>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>受信トレイ</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <!-- 送信トレイ -->
        <v-list-item link>
          <v-list-item-icon>
            <v-icon>mdi-publish</v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>送信トレイ</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <!-- 設定 -->
        <v-list-group
          prepend-icon="mdi-settings"
        >
          <template v-slot:activator>
            <v-list-item-content>
              <v-list-item-title>設定</v-list-item-title>
            </v-list-item-content>
          </template>
          <!-- ユーザ -->
          <v-list-item link :to="{name: 'User'}">
            <v-list-item-icon>
              <v-icon>mdi-account</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title>ユーザ</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
          <!-- その他 -->
          <v-list-item link>
            <v-list-item-icon>
              <v-icon>mdi-more</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title>その他</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-list-group>

      </v-list>
    </v-navigation-drawer>
  </v-card>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator'

@Component
export default class Navigation extends Vue {

}
</script>
