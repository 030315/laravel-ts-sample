<template>
  <v-container>
    <!-- ユーザ新規登録モーダル -->
    <user-form ref="userForm"></user-form>
    <v-row>
      <v-col>
        <v-btn color="primary" @click="addUser">新規作成</v-btn>
      </v-col>
    </v-row>
    <v-row>
      <v-col>
        <user-table></user-table>
      </v-col>
    </v-row>
  </v-container>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator'

import UserForm from '../../components/User/Form.vue'
import UserTable from '../../components/User/Index/Table.vue'

@Component({
  components: {
    'user-table': UserTable,
    'user-form': UserForm
  }
})
export default class UserIndex extends Vue {
  $refs!: {
    'userForm': UserForm
  }

  /**
   * ユーザの新規追加
   */
  private addUser () :void {
    this.$refs.userForm.open()
  }
}
</script>
