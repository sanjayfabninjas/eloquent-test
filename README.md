
# eloquent-test

1. Create tables:
    - countries (id, name, created_at, updated_at)
        India,
        Sri Lanka,
        Pakistan,
        New Zealand,
        France
    - users (id, name, email, password, country_id, is_active, created_at, updated_at )
        - 1. Gopal  is_active = 1                   Active      Inactive
        - 2. Sid  is_active = 1                     Gopal       Sanjay
        - 3. Sanjay  is_active = 0                  Sid         Ajay
        - 4. Rakesh  is_active = 1                  Rakesh      Kalpesh
        - 5. Ajay  is_active = 0                    Divyesh
        - 6. Kalpesh  is_active = 0                 
        - 7. Divyesh  is_active = 1                 
    - posts (id, user_id, title, content, is_active, created_at, updated_at)
        - 1.              Post A001  (Gopal) is_active = 0           Active      Inactive
        - 2. Post A002  (Kalpesh) is_active = 1
        - 3. Post A003  (Sanjay) is_active = 1
        - 4. Post A004  (Sanjay) is_active = 0
        - 5. Post A005  (Kalpesh) is_active = 0
        - 6. Post A006  (Divyesh) is_active = 0
        - 7. Post A007  (Gopal) is_active = 1
        - 8. Post A008  (Divyesh) is_active = 0
        - 9. Post A009  (Gopal) is_active = 1
        - 10. Post A010  (Kalpesh) is_active = 1
    - comments (id, post_id, comment, marked_as_deleted, created_at, updated_at)
        Post A001(post_id = 1) - bla bla sdfsdfbla bla bla sdfsdfbla Tada bla bla bla Post A001 (marked_as_deleted = 1)
        Post A001(post_id = 1) - bla bla sdfsdfblabla bla sdfsdfbla Tada bla bla sdfsdfbla Post A001 (marked_as_deleted = 0)
        Post A001(post_id = 1) - bla bla sdfsdfbla Tada bla bla bla Post A001 (marked_as_deleted = 1)
        Post A002(post_id = 2) - bla bla sdfsdfbla Tada bla bla blasdfsdf  Post A002 (marked_as_deleted = 0)
        Post A004(post_id = 4) - bla bla sdfsdfbla Tada bla bla sdfsdfbla Post A004 (marked_as_deleted = 0)
        Post A005(post_id = 5) - Tada bla bla bla Post A005 (marked_as_deleted = 1)
        Post A005(post_id = 5) - Tada bla bla blasdfsdf  Post A005 (marked_as_deleted = 0)
        Post A006(post_id = 6) - Tada bla bla sdfsdfbla Post A006 (marked_as_deleted = 0)
        Post A006(post_id = 6) - Tada bla bla bla Post A006 (marked_as_deleted = 0)
        Post A006(post_id = 6) - Tada bla bla blasdfsdf  Post A006 (marked_as_deleted = 0)
        Post A009(post_id = 9) - Tada bla bla sdfsdfbla Post A009 (marked_as_deleted = 0)
    - roles (id, name, is_active, created_at, updated_at)
        1 administrator 
        2 author
        3 designer
        4 tester
        5 manager
    - role_user (id, role_id, user_id, is_active)
        role_id = 1 -> user_id = 1
        role_id = 2 -> user_id = 1
        role_id = 1 -> user_id = 2
        role_id = 3 -> user_id = 1
        role_id = 2 -> user_id = 3
        role_id = 4 -> user_id = 3
        role_id = 4 -> user_id = 4
        role_id = 5 -> user_id = 2
        role_id = 5 -> user_id = 7
        role_id = 1 -> user_id = 7
        role_id = 3 -> user_id = 6
        role_id = 2 -> user_id = 4
2. Make migrations for all tables.
    - Foreign key, index, and data types should be as per requirement for all tables.
    - Rollback should work properly.
3. Create dummy records for all tables direct from phpmyadmin.
    e.g. roles [5 records only] [e.g. administrator, author, designer, tester, manager ]
4. Create Laravel models for required tables.
5. Prepare Eloquent Queries to get following results.
    - Get all users.(id,name, email)
    - Get users with countries 
    - Get all countries. (id, name)
    - Get only countries who have active users.
    - Get only posts who have deleted comments (marked_as_deleted = 1)
    - Get all active posts with comments (comments which are not deleted)(marked_as_deleted = 0)
    - Get users with roles
    - Get roles with users
    - Get users who have active roles
    - Get active posts from all countries
    - Get inactive users from all countries
    - Get posts with country
    - Get inactive posts with comments
    - Get active users only with any one active role
=======
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
>>>>>>> 4d4d6a23cd27a1cd9f990842bb6ada41e4d806bf
