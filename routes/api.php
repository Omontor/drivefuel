<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Courses
    Route::post('courses/media', 'CoursesApiController@storeMedia')->name('courses.storeMedia');
    Route::apiResource('courses', 'CoursesApiController');

    // Lessons
    Route::post('lessons/media', 'LessonsApiController@storeMedia')->name('lessons.storeMedia');
    Route::apiResource('lessons', 'LessonsApiController');

    // Tests
    Route::apiResource('tests', 'TestsApiController');

    // Questions
    Route::post('questions/media', 'QuestionsApiController@storeMedia')->name('questions.storeMedia');
    Route::apiResource('questions', 'QuestionsApiController');

    // Question Options
    Route::apiResource('question-options', 'QuestionOptionsApiController');

    // Test Results
    Route::apiResource('test-results', 'TestResultsApiController');

    // Test Answers
    Route::apiResource('test-answers', 'TestAnswersApiController');

    // Client
    Route::post('clients/media', 'ClientApiController@storeMedia')->name('clients.storeMedia');
    Route::apiResource('clients', 'ClientApiController');

    // Brand
    Route::post('brands/media', 'BrandApiController@storeMedia')->name('brands.storeMedia');
    Route::apiResource('brands', 'BrandApiController');

    // Project
    Route::apiResource('projects', 'ProjectApiController');

    // Route
    Route::apiResource('routes', 'RouteApiController');

    // Event
    Route::apiResource('events', 'EventApiController');

    // Group
    Route::apiResource('groups', 'GroupApiController');

    // Location
    Route::apiResource('locations', 'LocationApiController');

    // Checkin
    Route::apiResource('checkins', 'CheckinApiController');

    // Checkout
    Route::apiResource('checkouts', 'CheckoutApiController');

    // Blog
    Route::post('blogs/media', 'BlogApiController@storeMedia')->name('blogs.storeMedia');
    Route::apiResource('blogs', 'BlogApiController');

    // Questionarie
    Route::apiResource('questionaries', 'QuestionarieApiController');

    // Trivia
    Route::apiResource('trivia', 'TriviaApiController');

    // Answer
    Route::apiResource('answers', 'AnswerApiController');

    // Witness
    Route::apiResource('witnesses', 'WitnessApiController');

    // Witnesspost
    Route::post('witnessposts/media', 'WitnesspostApiController@storeMedia')->name('witnessposts.storeMedia');
    Route::apiResource('witnessposts', 'WitnesspostApiController');
});
