create sequence "Address_id_seq"
    as integer;

alter sequence "Address_id_seq" owner to mmslzkkoanrbkg;

create sequence "PersonalData_id_seq"
    as integer;

alter sequence "PersonalData_id_seq" owner to mmslzkkoanrbkg;

create sequence "UserAccount_id_seq"
    as integer;

alter sequence "UserAccount_id_seq" owner to mmslzkkoanrbkg;

create table address
(
    id              integer      default nextval('"Address_id_seq"'::regclass) not null
        constraint address_pk
            primary key,
    street          varchar(100) default ''::character varying,
    city            varchar(100),
    postal_code     varchar(50),
    building_number varchar(50)
);

alter table address
    owner to mmslzkkoanrbkg;

alter sequence "Address_id_seq" owned by address.id;

create unique index address_id_uindex
    on address (id);

create table farm
(
    id         serial
        constraint farm_pk
            primary key,
    name       varchar(100) not null,
    token      varchar(300) not null,
    image      varchar(255),
    address_id integer      not null
        constraint address
            references address
            on update cascade on delete cascade
);

alter table farm
    owner to mmslzkkoanrbkg;

create table personal_data
(
    id         integer default nextval('"PersonalData_id_seq"'::regclass) not null
        constraint personaldata_pk
            primary key,
    first_name varchar(100)                                               not null,
    last_name  varchar(100)                                               not null,
    address_id integer                                                    not null
        constraint address_id
            references address
            on update cascade on delete cascade,
    farm_id    integer
        constraint farm
            references farm
            on update cascade on delete cascade,
    is_owner   boolean default false                                      not null
);

alter table personal_data
    owner to mmslzkkoanrbkg;

alter sequence "PersonalData_id_seq" owned by personal_data.id;

create unique index personaldata_id_uindex
    on personal_data (id);

create unique index personal_data_address_id_uindex
    on personal_data (address_id);

create table user_account
(
    id               integer default nextval('"UserAccount_id_seq"'::regclass) not null
        constraint useraccount_pk
            primary key,
    email            varchar(255)                                              not null,
    password         varchar(255)                                              not null,
    personal_data_id integer                                                   not null
        constraint personal_data_id
            references personal_data
            on update cascade on delete cascade
);

alter table user_account
    owner to mmslzkkoanrbkg;

alter sequence "UserAccount_id_seq" owned by user_account.id;

create unique index useraccount_email_uindex
    on user_account (email);

create unique index useraccount_id_uindex
    on user_account (id);

create unique index user_account_personal_data_id_uindex
    on user_account (personal_data_id);

create unique index farm_id_uindex
    on farm (id);

create unique index farm_token_uindex
    on farm (token);

create unique index farm_address_id_uindex
    on farm (address_id);

create table field
(
    id            serial
        constraint field_pk
            primary key,
    name          varchar(100)                                                 not null,
    description   varchar(1024)    default 'no description'::character varying not null,
    area          double precision                                             not null,
    extra_payment double precision default 0,
    block_number  varchar(100)                                                 not null,
    is_property   boolean                                                      not null,
    farm_id       integer                                                      not null
        constraint farm_id
            references farm
            on update cascade on delete cascade,
    image         varchar(255)
);

alter table field
    owner to mmslzkkoanrbkg;

create unique index field_id_uindex
    on field (id);

create table field_action
(
    id               serial
        constraint field_action_pk
            primary key,
    field_id         integer not null
        constraint field_id
            references field
            on update cascade on delete cascade,
    personal_data_id integer not null
        constraint personal_data_id
            references personal_data
            on update cascade on delete cascade,
    is_completed     boolean                  default false,
    created_at       timestamp with time zone default CURRENT_TIMESTAMP,
    description      varchar(2048),
    action_name      varchar(255)
);

alter table field_action
    owner to mmslzkkoanrbkg;

create unique index field_action_id_uindex
    on field_action (id);

create table param_value
(
    id              serial
        constraint param_value_pk
            primary key,
    value           varchar(255) not null,
    field_action_id integer      not null
        constraint field_action_id
            references field_action
            on update cascade on delete cascade,
    param_name      varchar(255) not null
);

alter table param_value
    owner to mmslzkkoanrbkg;

create unique index param_value_id_uindex
    on param_value (id);

create table task
(
    id               serial
        constraint task_pk
            primary key,
    description      varchar(2048)                                      not null,
    is_completed     boolean                  default false,
    created_at       timestamp with time zone default CURRENT_TIMESTAMP not null,
    farm_id          integer                                            not null
        constraint farm_id
            references farm
            on update cascade on delete cascade,
    personal_data_id integer                                            not null
        constraint personal_data_id
            references personal_data
            on update cascade on delete cascade
);

alter table task
    owner to mmslzkkoanrbkg;

create unique index task_id_uindex
    on task (id);


