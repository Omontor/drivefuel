<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/parse-csv-import', 'UsersController@parseCsvImport')->name('users.parseCsvImport');
    Route::post('users/process-csv-import', 'UsersController@processCsvImport')->name('users.processCsvImport');
    Route::resource('users', 'UsersController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Courses
    Route::delete('courses/destroy', 'CoursesController@massDestroy')->name('courses.massDestroy');
    Route::post('courses/media', 'CoursesController@storeMedia')->name('courses.storeMedia');
    Route::post('courses/ckmedia', 'CoursesController@storeCKEditorImages')->name('courses.storeCKEditorImages');
    Route::post('courses/parse-csv-import', 'CoursesController@parseCsvImport')->name('courses.parseCsvImport');
    Route::post('courses/process-csv-import', 'CoursesController@processCsvImport')->name('courses.processCsvImport');
    Route::resource('courses', 'CoursesController');

    // Lessons
    Route::delete('lessons/destroy', 'LessonsController@massDestroy')->name('lessons.massDestroy');
    Route::post('lessons/media', 'LessonsController@storeMedia')->name('lessons.storeMedia');
    Route::post('lessons/ckmedia', 'LessonsController@storeCKEditorImages')->name('lessons.storeCKEditorImages');
    Route::post('lessons/parse-csv-import', 'LessonsController@parseCsvImport')->name('lessons.parseCsvImport');
    Route::post('lessons/process-csv-import', 'LessonsController@processCsvImport')->name('lessons.processCsvImport');
    Route::resource('lessons', 'LessonsController');

    // Tests
    Route::delete('tests/destroy', 'TestsController@massDestroy')->name('tests.massDestroy');
    Route::post('tests/parse-csv-import', 'TestsController@parseCsvImport')->name('tests.parseCsvImport');
    Route::post('tests/process-csv-import', 'TestsController@processCsvImport')->name('tests.processCsvImport');
    Route::resource('tests', 'TestsController');

    // Questions
    Route::delete('questions/destroy', 'QuestionsController@massDestroy')->name('questions.massDestroy');
    Route::post('questions/media', 'QuestionsController@storeMedia')->name('questions.storeMedia');
    Route::post('questions/ckmedia', 'QuestionsController@storeCKEditorImages')->name('questions.storeCKEditorImages');
    Route::post('questions/parse-csv-import', 'QuestionsController@parseCsvImport')->name('questions.parseCsvImport');
    Route::post('questions/process-csv-import', 'QuestionsController@processCsvImport')->name('questions.processCsvImport');
    Route::resource('questions', 'QuestionsController');

    // Question Options
    Route::delete('question-options/destroy', 'QuestionOptionsController@massDestroy')->name('question-options.massDestroy');
    Route::post('question-options/parse-csv-import', 'QuestionOptionsController@parseCsvImport')->name('question-options.parseCsvImport');
    Route::post('question-options/process-csv-import', 'QuestionOptionsController@processCsvImport')->name('question-options.processCsvImport');
    Route::resource('question-options', 'QuestionOptionsController');

    // Test Results
    Route::delete('test-results/destroy', 'TestResultsController@massDestroy')->name('test-results.massDestroy');
    Route::resource('test-results', 'TestResultsController');

    // Test Answers
    Route::delete('test-answers/destroy', 'TestAnswersController@massDestroy')->name('test-answers.massDestroy');
    Route::resource('test-answers', 'TestAnswersController');

    // Client
    Route::delete('clients/destroy', 'ClientController@massDestroy')->name('clients.massDestroy');
    Route::post('clients/media', 'ClientController@storeMedia')->name('clients.storeMedia');
    Route::post('clients/ckmedia', 'ClientController@storeCKEditorImages')->name('clients.storeCKEditorImages');
    Route::post('clients/parse-csv-import', 'ClientController@parseCsvImport')->name('clients.parseCsvImport');
    Route::post('clients/process-csv-import', 'ClientController@processCsvImport')->name('clients.processCsvImport');
    Route::resource('clients', 'ClientController');

    // Brand
    Route::delete('brands/destroy', 'BrandController@massDestroy')->name('brands.massDestroy');
    Route::post('brands/media', 'BrandController@storeMedia')->name('brands.storeMedia');
    Route::post('brands/ckmedia', 'BrandController@storeCKEditorImages')->name('brands.storeCKEditorImages');
    Route::post('brands/parse-csv-import', 'BrandController@parseCsvImport')->name('brands.parseCsvImport');
    Route::post('brands/process-csv-import', 'BrandController@processCsvImport')->name('brands.processCsvImport');
    Route::resource('brands', 'BrandController');

    // Project
    Route::delete('projects/destroy', 'ProjectController@massDestroy')->name('projects.massDestroy');
    Route::post('projects/parse-csv-import', 'ProjectController@parseCsvImport')->name('projects.parseCsvImport');
    Route::post('projects/process-csv-import', 'ProjectController@processCsvImport')->name('projects.processCsvImport');
    Route::resource('projects', 'ProjectController');

    // Route
    Route::delete('routes/destroy', 'RouteController@massDestroy')->name('routes.massDestroy');
    Route::post('routes/parse-csv-import', 'RouteController@parseCsvImport')->name('routes.parseCsvImport');
    Route::post('routes/process-csv-import', 'RouteController@processCsvImport')->name('routes.processCsvImport');
    Route::resource('routes', 'RouteController');

    // Event
    Route::delete('events/destroy', 'EventController@massDestroy')->name('events.massDestroy');
    Route::post('events/parse-csv-import', 'EventController@parseCsvImport')->name('events.parseCsvImport');
    Route::post('events/process-csv-import', 'EventController@processCsvImport')->name('events.processCsvImport');
    Route::resource('events', 'EventController');

    // Group
    Route::delete('groups/destroy', 'GroupController@massDestroy')->name('groups.massDestroy');
    Route::post('groups/parse-csv-import', 'GroupController@parseCsvImport')->name('groups.parseCsvImport');
    Route::post('groups/process-csv-import', 'GroupController@processCsvImport')->name('groups.processCsvImport');
    Route::resource('groups', 'GroupController');

    // Location
    Route::delete('locations/destroy', 'LocationController@massDestroy')->name('locations.massDestroy');
    Route::post('locations/parse-csv-import', 'LocationController@parseCsvImport')->name('locations.parseCsvImport');
    Route::post('locations/process-csv-import', 'LocationController@processCsvImport')->name('locations.processCsvImport');
    Route::resource('locations', 'LocationController');

    // Checkin
    Route::delete('checkins/destroy', 'CheckinController@massDestroy')->name('checkins.massDestroy');
    Route::post('checkins/parse-csv-import', 'CheckinController@parseCsvImport')->name('checkins.parseCsvImport');
    Route::post('checkins/process-csv-import', 'CheckinController@processCsvImport')->name('checkins.processCsvImport');
    Route::resource('checkins', 'CheckinController');

    // Checkout
    Route::delete('checkouts/destroy', 'CheckoutController@massDestroy')->name('checkouts.massDestroy');
    Route::post('checkouts/parse-csv-import', 'CheckoutController@parseCsvImport')->name('checkouts.parseCsvImport');
    Route::post('checkouts/process-csv-import', 'CheckoutController@processCsvImport')->name('checkouts.processCsvImport');
    Route::resource('checkouts', 'CheckoutController');

    // Blog
    Route::delete('blogs/destroy', 'BlogController@massDestroy')->name('blogs.massDestroy');
    Route::post('blogs/media', 'BlogController@storeMedia')->name('blogs.storeMedia');
    Route::post('blogs/ckmedia', 'BlogController@storeCKEditorImages')->name('blogs.storeCKEditorImages');
    Route::post('blogs/parse-csv-import', 'BlogController@parseCsvImport')->name('blogs.parseCsvImport');
    Route::post('blogs/process-csv-import', 'BlogController@processCsvImport')->name('blogs.processCsvImport');
    Route::resource('blogs', 'BlogController');

    // Questionarie
    Route::delete('questionaries/destroy', 'QuestionarieController@massDestroy')->name('questionaries.massDestroy');
    Route::post('questionaries/parse-csv-import', 'QuestionarieController@parseCsvImport')->name('questionaries.parseCsvImport');
    Route::post('questionaries/process-csv-import', 'QuestionarieController@processCsvImport')->name('questionaries.processCsvImport');
    Route::resource('questionaries', 'QuestionarieController');

    // Trivia
    Route::delete('trivia/destroy', 'TriviaController@massDestroy')->name('trivia.massDestroy');
    Route::post('trivia/parse-csv-import', 'TriviaController@parseCsvImport')->name('trivia.parseCsvImport');
    Route::post('trivia/process-csv-import', 'TriviaController@processCsvImport')->name('trivia.processCsvImport');
    Route::resource('trivia', 'TriviaController');

    // Answer
    Route::delete('answers/destroy', 'AnswerController@massDestroy')->name('answers.massDestroy');
    Route::post('answers/parse-csv-import', 'AnswerController@parseCsvImport')->name('answers.parseCsvImport');
    Route::post('answers/process-csv-import', 'AnswerController@processCsvImport')->name('answers.processCsvImport');
    Route::resource('answers', 'AnswerController');

    // Witness
    Route::delete('witnesses/destroy', 'WitnessController@massDestroy')->name('witnesses.massDestroy');
    Route::resource('witnesses', 'WitnessController');

    // Witnesspost
    Route::delete('witnessposts/destroy', 'WitnesspostController@massDestroy')->name('witnessposts.massDestroy');
    Route::post('witnessposts/media', 'WitnesspostController@storeMedia')->name('witnessposts.storeMedia');
    Route::post('witnessposts/ckmedia', 'WitnesspostController@storeCKEditorImages')->name('witnessposts.storeCKEditorImages');
    Route::post('witnessposts/parse-csv-import', 'WitnesspostController@parseCsvImport')->name('witnessposts.parseCsvImport');
    Route::post('witnessposts/process-csv-import', 'WitnesspostController@processCsvImport')->name('witnessposts.processCsvImport');
    Route::resource('witnessposts', 'WitnesspostController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
