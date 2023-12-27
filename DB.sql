CREATE TABLE user (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(50),
    email VARCHAR(50),
    pwd VARCHAR(255),
    user_role ENUM('admin', 'patient'), 
    CONSTRAINT user_role_ck CHECK (user_role IN ('admin', 'patient'))
);

CREATE TABLE medicine (
    med_id INT AUTO_INCREMENT PRIMARY KEY ,
    med_name VARCHAR(50),
    type VARCHAR(50),
    description VARCHAR(500),
    price FLOAT, 
    img VARCHAR(255)
);

CREATE TABLE sale_raport (
    sale_raport_id INT AUTO_INCREMENT PRIMARY KEY,
    raport_number INT UNIQUE , 
    description VARCHAR(500),
    total FLOAT
);

CREATE TABLE sale (
    sale_id INT AUTO_INCREMENT PRIMARY KEY , 
    sale_number INT UNIQUE,
    sale_date DATE, 
    sale_plat ENUM('online', 'store'),
    user_id INT,
    med_id INT,
    sale_report_id INT,
    CONSTRAINT sale_plat_ck CHECK (sale_plat IN ('online', 'store')),
    CONSTRAINT sale_user_id_fk FOREIGN KEY (user_id) REFERENCES user(user_id),
    CONSTRAINT sale_med_id_fk FOREIGN KEY (med_id) REFERENCES medicine(med_id),
    CONSTRAINT sale_sale_raport_id_fk FOREIGN KEY (sale_report_id) REFERENCES sale_raport(sale_raport_id)
);

CREATE TABLE stock_raport (
    stock_raport_id INT AUTO_INCREMENT PRIMARY KEY,
    raport_number INT UNIQUE,
    description VARCHAR(500)
);

CREATE TABLE stock (
    stock_id INT AUTO_INCREMENT PRIMARY KEY,
    qte_stock INT ,
    stock_raport_id INT , 
    CONSTRAINT stock_stock_raport_id_fk FOREIGN KEY (stock_raport_id) REFERENCES stock_raport(stock_raport_id)
);