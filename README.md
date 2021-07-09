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
