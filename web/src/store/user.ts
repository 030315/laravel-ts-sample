import { Mutation, Action, VuexModule, getModule, Module, MutationAction } from 'vuex-module-decorators'
import api from '../plugins/api'
import store from './index'
import { Form } from '../types/user'

@Module({ dynamic: true, store, name: 'user', namespaced: true })
class User extends VuexModule {
  public isLoading: boolean = false

  /**
   * フォームデータ
   */
  public form: Form = {
    id: undefined,
    name: undefined,
    kana: undefined,
    password: undefined,
    email: undefined,
    slack_user_name: undefined
  }

  /**
   * フォームの値をStateにセット
   * @param form
   */
  @Mutation
  private setForm (form: Form) {
    this.form = form
  }

  /**
   * ローディングの切替
   */
  @Mutation
  private toggleLoading (loading: boolean) {
    this.isLoading = loading
  }

  /**
   * データの取得
   * @param id
   */
  @Action
  public fetch (id: number) {
    this.toggleLoading(true)

    api.get('users/' + id).then((response: any) => {
      this.form = response.data
    }).catch((error: any) => {
      throw error
    }).finally(() => {
      this.toggleLoading(false)
    })
  }

  /**
   * 新規作成
   */
  @Mutation
  public async create () : Promise<any> {
    this.toggleLoading(true)

    await api.post('users', this.form).then((response: any) => {

    }).catch((error: any) => {
      throw error
    }).finally(() => {
      this.toggleLoading(false)
    })
  }

  /**
   * 更新
   */
  @Action
  public modify () {
    this.toggleLoading(true)
    this.toggleLoading(false)
  }

  /**
   * フォームデータをMutationに送る
   * @param form
   */
  @Action
  public setFormData (form: Form) {
    this.setForm(form)
  }

  /**
   * フォームの初期化
   */
  @Action
  public initializeForm () {
    const form: Form = {
      name: undefined,
      kana: undefined,
      email: undefined,
      password: undefined,
      slack_user_name: undefined
    }

    this.setForm(form)
  }
}

export const userModule = getModule(User)
