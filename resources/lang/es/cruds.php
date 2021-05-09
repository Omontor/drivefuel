<?php

return [
    'userManagement' => [
        'title'          => 'Ajustes',
        'title_singular' => 'Ajustes',
    ],
    'permission' => [
        'title'          => 'Permisos',
        'title_singular' => 'Permiso',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Rol',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Usuarios',
        'title_singular' => 'Usuario',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'userAlert' => [
        'title'          => 'Alertas de Usuario',
        'title_singular' => 'Alertas de Usuario',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'alert_text'        => 'Alert Text',
            'alert_text_helper' => ' ',
            'alert_link'        => 'Alert Link',
            'alert_link_helper' => ' ',
            'user'              => 'Users',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
        ],
    ],
    'course' => [
        'title'          => 'Cursos',
        'title_singular' => 'Curso',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'teacher'             => 'Teacher',
            'teacher_helper'      => ' ',
            'title'               => 'Title',
            'title_helper'        => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'price'               => 'Price',
            'price_helper'        => ' ',
            'thumbnail'           => 'Thumbnail',
            'thumbnail_helper'    => ' ',
            'is_published'        => 'Is Published',
            'is_published_helper' => ' ',
            'students'            => 'Students',
            'students_helper'     => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated At',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted At',
            'deleted_at_helper'   => ' ',
        ],
    ],
    'lesson' => [
        'title'          => 'Lecciones',
        'title_singular' => 'Leccione',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'course'              => 'Course',
            'course_helper'       => ' ',
            'title'               => 'Title',
            'title_helper'        => ' ',
            'thumbnail'           => 'Thumbnail',
            'thumbnail_helper'    => ' ',
            'short_text'          => 'Short Text',
            'short_text_helper'   => ' ',
            'long_text'           => 'Long Text',
            'long_text_helper'    => ' ',
            'video'               => 'Video',
            'video_helper'        => ' ',
            'position'            => 'Position',
            'position_helper'     => ' ',
            'is_published'        => 'Is Published',
            'is_published_helper' => ' ',
            'is_free'             => 'Is Free',
            'is_free_helper'      => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated At',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted At',
            'deleted_at_helper'   => ' ',
        ],
    ],
    'test' => [
        'title'          => 'Pruebas',
        'title_singular' => 'Prueba',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'course'              => 'Course',
            'course_helper'       => ' ',
            'lesson'              => 'Lesson',
            'lesson_helper'       => ' ',
            'title'               => 'Title',
            'title_helper'        => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'is_published'        => 'Is Published',
            'is_published_helper' => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated At',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted At',
            'deleted_at_helper'   => ' ',
        ],
    ],
    'question' => [
        'title'          => 'Preguntas',
        'title_singular' => 'Pregunta',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'test'                  => 'Test',
            'test_helper'           => ' ',
            'question_text'         => 'Question Text',
            'question_text_helper'  => ' ',
            'question_image'        => 'Question Image',
            'question_image_helper' => ' ',
            'points'                => 'Points',
            'points_helper'         => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated At',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted At',
            'deleted_at_helper'     => ' ',
        ],
    ],
    'questionOption' => [
        'title'          => 'Respuestas',
        'title_singular' => 'Respuesta',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'question'           => 'Question',
            'question_helper'    => ' ',
            'option_text'        => 'Option text',
            'option_text_helper' => ' ',
            'is_correct'         => 'Is Correct',
            'is_correct_helper'  => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated At',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted At',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'testResult' => [
        'title'          => 'Resultados',
        'title_singular' => 'Resultado',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'test'              => 'Test',
            'test_helper'       => ' ',
            'student'           => 'Student',
            'student_helper'    => ' ',
            'score'             => 'Score',
            'score_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'testAnswer' => [
        'title'          => 'Respuestas',
        'title_singular' => 'Respuesta',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'test_result'        => 'Test Result',
            'test_result_helper' => ' ',
            'question'           => 'Question',
            'question_helper'    => ' ',
            'option'             => 'Option',
            'option_helper'      => ' ',
            'is_correct'         => 'Is Correect',
            'is_correct_helper'  => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated At',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted At',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'capacitacion' => [
        'title'          => 'Capacitacion',
        'title_singular' => 'Capacitacion',
    ],
    'clientManagement' => [
        'title'          => 'Clientes - Proyectos',
        'title_singular' => 'Clientes - Proyecto',
    ],
    'client' => [
        'title'          => 'Clientes',
        'title_singular' => 'Cliente',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Nombre',
            'name_helper'       => ' ',
            'image'             => 'Logotipo',
            'image_helper'      => ' ',
            'url'               => 'Url',
            'url_helper'        => ' ',
            'email'             => 'Email de Contacto',
            'email_helper'      => ' ',
            'phone'             => 'Teléfono',
            'phone_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'brand' => [
        'title'          => 'Marca',
        'title_singular' => 'Marca',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Nombre',
            'name_helper'       => ' ',
            'image'             => 'Logotipo',
            'image_helper'      => ' ',
            'client'            => 'Cliente',
            'client_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'project' => [
        'title'          => 'Proyecto',
        'title_singular' => 'Proyecto',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'brand'             => 'Marca',
            'brand_helper'      => ' ',
            'name'              => 'Nombre',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'eventManagement' => [
        'title'          => 'Eventos',
        'title_singular' => 'Evento',
    ],
    'route' => [
        'title'          => 'Rutas',
        'title_singular' => 'Ruta',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'project'           => 'Proyecto',
            'project_helper'    => ' ',
            'name'              => 'Nombre',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'event' => [
        'title'          => 'Eventos',
        'title_singular' => 'Evento',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'date'              => 'Fecha',
            'date_helper'       => ' ',
            'start'             => 'Inicio',
            'start_helper'      => ' ',
            'end'               => 'Fin',
            'end_helper'        => ' ',
            'route'             => 'Ruta',
            'route_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'users'             => 'Personal',
            'users_helper'      => ' ',
        ],
    ],
    'group' => [
        'title'          => 'Grupos',
        'title_singular' => 'Grupo',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Nombre',
            'name_helper'       => ' ',
            'client'            => 'Client',
            'client_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'users'             => 'Users',
            'users_helper'      => ' ',
        ],
    ],
    'location' => [
        'title'          => 'Ubicaciones',
        'title_singular' => 'Ubicacione',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Nombre',
            'name_helper'       => ' ',
            'event'             => 'Evento',
            'event_helper'      => ' ',
            'lat'               => 'Latitud',
            'lat_helper'        => ' ',
            'lng'               => 'Longitud',
            'lng_helper'        => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'check' => [
        'title'          => 'Checks',
        'title_singular' => 'Check',
    ],
    'checkin' => [
        'title'          => 'Checkins',
        'title_singular' => 'Checkin',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'datetime'          => 'Fecha y Hora',
            'datetime_helper'   => ' ',
            'user'              => 'Usuario',
            'user_helper'       => ' ',
            'location'          => 'Ubicación',
            'location_helper'   => ' ',
            'lat'               => 'Latitud',
            'lat_helper'        => ' ',
            'lng'               => 'Longitud',
            'lng_helper'        => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'checkout' => [
        'title'          => 'Checkouts',
        'title_singular' => 'Checkout',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'datetime'          => 'Fecha y Hora',
            'datetime_helper'   => ' ',
            'user'              => 'Usuario',
            'user_helper'       => ' ',
            'location'          => 'Ubicación',
            'location_helper'   => ' ',
            'lat'               => 'Latitud',
            'lat_helper'        => ' ',
            'lng'               => 'Longitud',
            'lng_helper'        => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'communication' => [
        'title'          => 'Comunicación',
        'title_singular' => 'Comunicación',
    ],
    'blog' => [
        'title'          => 'Noticias',
        'title_singular' => 'Noticia',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'title'               => 'Title',
            'title_helper'        => ' ',
            'excerpt'             => 'Excerpt',
            'excerpt_helper'      => ' ',
            'slug'                => 'Slug',
            'slug_helper'         => ' ',
            'content'             => 'Content',
            'content_helper'      => ' ',
            'thumb_image'         => 'Thumb Image',
            'thumb_image_helper'  => ' ',
            'banner_image'        => 'Banner Image',
            'banner_image_helper' => ' ',
            'gallery'             => 'Gallery',
            'gallery_helper'      => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
        ],
    ],
    'questionarie' => [
        'title'          => 'Cuestionarios',
        'title_singular' => 'Cuestionario',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Nombre',
            'name_helper'       => ' ',
            'project'           => 'Proyecto',
            'project_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'trivia' => [
        'title'          => 'Preguntas',
        'title_singular' => 'Pregunta',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'questionarie'        => 'Cuestionario',
            'questionarie_helper' => ' ',
            'content'             => 'Contenido',
            'content_helper'      => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
        ],
    ],
    'answer' => [
        'title'          => 'Respuestas',
        'title_singular' => 'Respuesta',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'trivia'            => 'Trivia',
            'trivia_helper'     => ' ',
            'event'             => 'Evento',
            'event_helper'      => ' ',
            'content'           => 'Contenido',
            'content_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'witness' => [
        'title'          => 'Testigos',
        'title_singular' => 'Testigo',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'type'              => 'Tipo de Testigo',
            'type_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'witnesspost' => [
        'title'          => 'Testigos Enviados',
        'title_singular' => 'Testigos Enviado',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'witness'           => 'Tipo de Testigp',
            'witness_helper'    => ' ',
            'event'             => 'Event',
            'event_helper'      => ' ',
            'images'            => 'Imagen',
            'images_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'user'              => 'Usuario',
            'user_helper'       => ' ',
        ],
    ],
    'auditLog' => [
        'title'          => 'Actividad Reciente',
        'title_singular' => 'Actividad Reciente',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
];
