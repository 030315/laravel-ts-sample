<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    private $attributes;

    public function setUp() :void
    {
        parent::setUp();

        $this->attributes = [
            'name' => 'テスト テス男',
            'kana' => 'てすと てすお',
            'slack_user_name' => null,
            'email' => 'test@testing.com',
            'password' => 'testing...'
        ];
    }

    /**
     * 一覧の取得
     */
    public function testIndex()
    {
        User::create($this->attributes);

        $response = $this->get(route('users.index'));

        $response->assertStatus(200)
            ->assertJsonStructure([
                'message',
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'kana',
                        'slack_user_name',
                        'email',
                        'updated_at',
                        'created_at',
                        'deleted_at'
                    ]
                ],
                'status'
            ]);
    }

    /**
     * 新規登録
     */
    public function testStore()
    {
        $response = $this->post(route('users.store'), $this->attributes);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'message',
                'data' => [
                    'id',
                    'name',
                    'kana',
                    'slack_user_name',
                    'email',
                    'created_at',
                ],
                'status'
            ])
            ->assertJson([
                'data' => [
                    'name' => 'テスト テス男'
                ]
            ]);
    }

    /**
     * 更新
     */
    public function testUpdate()
    {
        $user = User::create($this->attributes);

        $response = $this->put(route('users.update', $user->id), [
            'name' => 'テスト テス男2',
            'email' => 'test@example.com',
            'slack_user_name' => 'test',
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'message',
                'data',
                'status'
            ])
            ->assertJson([
                'data' => [
                    'name' => 'テスト テス男2',
                    'slack_user_name' => 'test',
                ]
            ]);
    }

    /**
     * 編集
     */
    public function testEdit()
    {
        $user = User::create($this->attributes);

        $response = $this->get(route('users.edit', $user->id));

        $response->assertStatus(200)
            ->assertJsonStructure([
                'message',
                'data',
                'status'
            ])
            ->assertJson([
                'data' => [
                    'name' => 'テスト テス男',
                    'email' => 'test@testing.com'
                ]
            ]);
    }


    /**
     * 表示
     */
    public function testShow()
    {
        $user = User::create($this->attributes);

        $response = $this->get(route('users.show', $user->id));

        $response->assertStatus(200)
            ->assertJsonStructure([
                'message',
                'data',
                'status'
            ])
            ->assertJson([
                'data' => [
                    'name' => 'テスト テス男',
                    'email' => 'test@testing.com'
                ]
            ]);
    }

    /**
     * 削除
     */
    public function testDestroy()
    {
        $user = User::create($this->attributes);

        $response = $this->delete(route('users.destroy', $user->id));

        $response->assertStatus(200)
            ->assertJsonStructure([
                'message',
                'data',
                'status'
            ]);
    }

    /**
     * 復帰
     */
    public function testRestore()
    {
        $user = User::create($this->attributes);

        $this->delete(route('users.destroy', $user->id));

        $response = $this->put(route('users.restore', $user->id));

        $response->assertStatus(200)
            ->assertJsonStructure([
                'message',
                'data',
                'status'
            ]);
    }

    /**
     * 完全削除
     */
    public function testForceDelete()
    {
        $user = User::create($this->attributes);

        $this->delete(route('users.destroy', $user->id));

        $response = $this->delete(route('users.force-delete', $user->id));

        $response->assertStatus(200);
    }
}
