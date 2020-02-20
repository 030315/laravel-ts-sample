<template>
  <v-dialog v-model="show" max-width="500px">
    <!-- メッセージの表示 -->
    <v-snackbar
      v-model="isSnackbar"
      :color="snackbarColor"
    >
      {{ message }}
    </v-snackbar>
    <v-card>
      <v-card-title>
        <span class="headline">{{ title }}</span>
      </v-card-title>
      <v-card-text>
        <v-row>
          <v-col>
            <v-text-field
              label="名前"
              v-model="form.name"
            >
            </v-text-field>
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            <v-text-field
              label="かな"
              v-model="form.kana"
            ></v-text-field>
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            <v-text-field
              label="メールアドレス"
              v-model="form.email"
            ></v-text-field>
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            <v-text-field
              type="password"
              label="パスワード"
              v-model="form.password"
            ></v-text-field>
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            <v-text-field
              label="Slack ユーザ名"
              v-model="form.slack_user_name"
              prefix="@"
            >
            </v-text-field>
          </v-col>
        </v-row>
      </v-card-text>
      <v-card-actions>
        <v-spacer>
        </v-spacer>
        <v-btn
          color="primary"
          @click="save"
          :loading="isLoading"
        >
          保存
        </v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator'
import { userModule } from '../../store/user'

import { Form } from '../../types/user'

@Component
export default class UserForm extends Vue {
  private show: boolean = false

  private title: string = '新規作成'

  private form: Form = userModule.form

  private isSnackbar: boolean = false

  private snackbarColor: string = 'success'

  private message?: string

  public get isLoading () : boolean {
    return userModule.isLoading
  }

  /**
   * モーダルのオープン
   */
  public open (id?: number) :void {
    userModule.initializeForm()
    if (id !== undefined) {
      this.title = '編集'
      userModule.fetch(id)
    }
    this.show = true
  }

  /**
   * 保存処理
   */
  private save () {
    userModule.setFormData(this.form)
    userModule.create().then(() => {
      this.hide()
    }).catch((error: any) => {
      this.message = error.message
      this.snackbarColor = 'error'
      this.isSnackbar = true
    })
  }

  /**
   * モーダルのクローズ
   */
  private hide () {
    this.show = false
  }
}
</script>
