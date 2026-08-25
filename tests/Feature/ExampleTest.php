<?php

test('guests visiting the root route are redirected to the login page', function () {
    $response = $this->get('/');

    $response->assertRedirect('/login');
});
