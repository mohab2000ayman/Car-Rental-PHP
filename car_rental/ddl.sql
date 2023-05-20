CREATE DATABASE car_rental;

use car_rental;
    CREATE TABLE admin(
   admin_id int not null auto_increment,
    email varchar(225) not null,
    adminname varchar(225) not null,
    password varchar(225) not null,
	PRIMARY KEY (admin_id)
);
    CREATE TABLE client(
    client_id int not null auto_increment,
    clientname varchar(225) not null,
    email varchar(225) not null,
    password varchar(225) not null,
    license_num int not null,
    DOB DATE not null,
    phonenum int not null,
    country varchar(225) not null,
	PRIMARY KEY (client_id)
);
CREATE TABLE office(
    office_id int not null auto_increment,
    country varchar(225) not null,
    PRIMARY KEY (office_id)
    );

CREATE TABLE car(
    car_id int not null auto_increment,
    plate_num varchar(225) not null,
    price int not null,
    brand varchar(225) not null,
    car_year year not null,
    type varchar(225) not null,
    rented boolean not null,
    active boolean not null,
    outofservice boolean not null,
    image LONGBLOB NOT NULL,
    office_id int not null,
    FOREIGN key (office_id) REFERENCES office (office_id) on delete cascade on update cascade,
    PRIMARY KEY (car_id)
    );
   CREATE TABLE car_status (
   carid INT NOT NULL,
   status VARCHAR(20) NOT NULL,
   start_date DATE NOT NULL,
   end_date DATE NOT NULL,
   PRIMARY KEY (carid, start_date, status),
   FOREIGN KEY (carid) REFERENCES car(car_id)
);


CREATE TABLE reservation(
    reserve_id int not null auto_increment,
    car_id int not null,
    client_id int not null,
    reservDate date DEFAULT CURRENT_DATE NOT NULL,
  	pickupDate date NOT NULL,
  	returnDate date NOT NULL,
  	totalPrice float NOT NULL,
  	Pickedup boolean not null,
  	Returned boolean not null,
  	Paid boolean not null, 
    PRIMARY key (reserve_id,car_id,client_id),
    FOREIGN key (car_id) REFERENCES car (car_id) on delete cascade on update cascade,
    FOREIGN key (client_id) REFERENCES client (client_id) on delete cascade on update cascade
    );
CREATE TABLE payment(
    payment_id int not null auto_increment,
    payment_date date DEFAULT CURRENT_DATE NOT NULL,
    reserve_id int not null,
    totalPrice float NOT NULL,
    PRIMARY KEY (payment_id),
    FOREIGN key (reserve_id) REFERENCES reservation (reserve_id) on delete cascade on update cascade
    FOREIGN key (totalPrice) REFERENCES reservation (totalPrice) on delete cascade on update cascade

    
    );


