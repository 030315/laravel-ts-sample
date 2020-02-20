<template>
  <v-container fluid>
    <receive-form ref="receiveForm"></receive-form>
    <v-row>
      <v-col>
        <v-btn color="primary" @click="openAddHusen">新規作成</v-btn>
      </v-col>
    </v-row>
    <v-row>
      <v-col>
        <v-card color="#FFCDD2">
          <v-card-title>
            <span class="title font-weight-light">
              折返しお電話お願いします
            </span>
          </v-card-title>
          <v-card-text>
            <!-- <husen @click="openPrev"></husen> -->
          </v-card-text>
        </v-card>
      </v-col>
      <v-col>
        <v-card color="#C4E1A4">
          <v-card-title>
            また掛け直します
          </v-card-title>
        </v-card>
      </v-col>
      <v-col>
        <v-card color="#D1C4E9">
          <v-card-title>
            電話があった事をお伝え下さい
          </v-card-title>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator'
import ReceiveForm from '../Form.vue'

@Component({
  components: {
    'receive-form': ReceiveForm
  }
})

export default class ReceiveTable extends Vue {
  $refs!: {
    receiveForm: ReceiveForm
  }
  /**
   * 付箋新規追加画面
   */
  public openAddHusen () :void {
    this.$refs.receiveForm.open()
  }

  /**
   * プレビュー画面のオープン
   */
  public openPrev () :void {

  }
}
</script>
