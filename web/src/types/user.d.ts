export interface User {
  id: number,
  kana: string,
  name: string,
  email: string,
  slack_user_name?: string,
  deleted_at?: string,
  updated_at: string,
  created_at: string
}

export interface Form {
  id?: number,
  kana?: string,
  name?: string,
  email?: string,
  slack_user_name?: string,
  password?: string,
}
