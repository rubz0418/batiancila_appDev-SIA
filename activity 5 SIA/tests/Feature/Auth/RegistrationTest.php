<?php

test('registration screen can be rendered', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

test('new users can register', function () {
    $response = $this->post('/register', [
        'full_name' => 'Test User',
        'email' => 'test@example.com',
        'role' => 'user',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('user.dashboard', absolute: false));
});

test('new admin users are redirected to the admin dashboard', function () {
    $response = $this->post('/register', [
        'full_name' => 'Admin User',
        'email' => 'admin@example.com',
        'role' => 'admin',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);

    $this->assertAuthenticated();
    $this->assertDatabaseHas('users', [
        'email' => 'admin@example.com',
        'role' => 'admin',
    ]);
    $response->assertRedirect(route('admin.dashboard', absolute: false));
});
