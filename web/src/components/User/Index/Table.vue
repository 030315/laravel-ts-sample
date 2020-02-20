<template>
  <v-data-table
    :headers="headers"
    :items="users"
  >
    <template v-slot:top>
      <v-toolbar flat color="white">
        <v-toolber-title>ユーザ</v-toolber-title>
        <v-divider
          class="mx-4"
          inset
          vertical
        ></v-divider>
      </v-toolbar>
    </template>
    <template v-slot:item.action="{ item }">
      <v-btn color="success">
        <v-icon>
          mdi-pencil
        </v-icon>
      </v-btn>
      <v-btn color="error">
        <v-icon>
          mdi-delete
        </v-icon>
      </v-btn>
    </template>
  </v-data-table>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator'

import { User } from '../../../types/user'

interface Header {
  text: string,
  align?: string,
  sortable?: boolean,
  value: string
}

@Component
export default class UserTable extends Vue {
  /**
   * ヘッダー
   */
  private headers: Header[] = [
    {
      text: '名前',
      value: 'name'
    },
    {
      text: 'メールアドレス',
      value: 'email'
    },
    {
      text: 'Slack ユーザ名',
      value: 'slack_user_name'
    },
    {
      text: '操作',
      value: 'action',
      sortable: false
    }
  ]
  /**
   * 実データ
   */
  private users: User[] = [
    {
      name: '苑田',
      kana: 'そのだ',
      id: 1,
      email: 's-sonoda@k-useful.jp',
      slack_user_name: '@s-sonoda',
      updated_at: '2019/11/12',
      created_at: '2019/11/12'
    }
  ]
}
</script>
