CREATE OR REPLACE TABLE user(
    id int not null AUTO_INCREMENT,
    username varchar(30) not null,
    PASSWORD varchar(30) not null,
    email varchar(50) not null,
    description varchar(100),
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    primary key (id)
)

//udelano primo v phpadmin