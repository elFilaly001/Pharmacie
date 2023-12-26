create table user(
    user_id int AUTO_INCREMENT primary key,
    full_name varchar(50),
    email varchar(50),
    password varchar(255),
    user_role enum('admin' , 'patient online'), 
    Constraint user_role_ck check (user_role in ('admin' , 'patient online'))
);

create table sale (
    sale_id int AUTO_INCREMENT primary key , 
    sale_number int ,
    product varchar(255),
    price float , 
    sale_plat enum('online' , 'on_site'),
    Constraint sale_plat_ck check sale_plat in ('online' , 'on_site')
);

create table user_sale (
    user_id int ,
    sale_id int , 
    primary key (user_id,sale_id),
    constraint user_sale_sale_id_fk foreign key (sale_id) references sale(sale_id),
    constraint user_sale_user_id_fk foreign key (user_id) references user(user_id),
);

create table stock (
    stock_id int AUTO_INCREMENT primary key,
    product varchar(50),
    price float , 
    qte_stock int , 
    sale_id int,
    constraint user_sale_sale_id_fk foreign key (sale_id) references sale(sale_id),
);

create table raport (
    report_id int AUTO_INCREMENT primary key,
    raport_number int , 
    description varchar(500),
    total float , 
    sale_id int,
    constraint raport_sale_id_fk foreign key sale_id references sale(sale_id),
);

