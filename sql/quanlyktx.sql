
CREATE TABLE
    role(
        id INTEGER NOT NULL,
        ten VARCHAR(20),
        PRIMARY KEY (id)
    );

CREATE TABLE
    users (
        id INTEGER NOT NULL,
        email VARCHAR(255),
        password VARCHAR(255),
        role_id INTEGER NOT NULL,
        PRIMARY KEY(id),
        KEY role (role_id)
    );

CREATE TABLE
    sinhvien (
        id INTEGER NOT NULL,
        mssv VARCHAR(255),
        email VARCHAR(255),
        ten VARCHAR(255),
        ngaysinh DATE,
        sdt VARCHAR(255),
        gioitinh VARCHAR(20),
        diachi VARCHAR(255),
        lop_id INTEGER,
        khoa_id INTEGER,
        cccd VARCHAR(255),
        user_id INTEGER NOT NULL,
        PRIMARY KEY(id),
        KEY users (user_id),
        KEY lop (lop_id),
        KEY khoa (khoa_id)
    );

CREATE TABLE
    khoa (
        id INTEGER NOT NULL,
        ten VARCHAR(255),
        PRIMARY KEY(id)
    );

CREATE TABLE
    lop (
        id INTEGER NOT NULL,
        ten VARCHAR(255),
        PRIMARY KEY(id)
    );
CREATE TABLE
    quanly (
        id INTEGER NOT NULL,
        email VARCHAR(255),
        ten VARCHAR(255),
        ngaysinh DATE,
        sdt VARCHAR(255),
        gioitinh VARCHAR(20),
        diachi VARCHAR(255),
        user_id INTEGER NOT NULL,
        PRIMARY KEY(id),
        KEY users (user_id)
    );

CREATE TABLE
    thannhan (
        id INTEGER NOT NULL,
        ten VARCHAR(255),
        ngaysinh DATE,
        sdt VARCHAR(255),
        gioitinh VARCHAR(20),
        diachi VARCHAR(255),
        nghenghiep VARCHAR(255),
        sinhvien_id INTEGER NOT NULL,
        PRIMARY KEY (id),
        KEY sinhvien (sinhvien_id)
    );



CREATE TABLE
    phong(
        id INTEGER NOT NULL,
        tenphong VARCHAR(255),
        soluong INTEGER,
        toida INTEGER,
        yeucau VARCHAR(20),
        ghichu VARCHAR(255),
        PRIMARY KEY (id)
    );

CREATE TABLE
    hopdongktx(
        id INTEGER NOT NULL,
        sinhvien_id INTEGER NOT NULL,
        phong_id INTEGER NOT NULL,
        ngaylap DATE,
        ngaybatdau DATE,
        ngayketthuc DATE,
        quanly_id INTEGER NOT NULL,
        tensv VARCHAR(255),
        ngaysinhsv DATE,
        sdtsv VARCHAR(255),
        cccdsv VARCHAR(255),
        gioitinhsv VARCHAR(20),
        diachisv VARCHAR(255),
        tengh VARCHAR(255),
        ngaysinhgh DATE,
        sdtgh VARCHAR(255),
        diachigh VARCHAR(255),

        PRIMARY KEY (id),
        KEY sinhvien (sinhvien_id),
        KEY phong (phong_id),
        KEY quanly (quanly_id)
    );

CREATE TABLE
    hoadondiennuoc(
        id INTEGER NOT NULL,
        phong_id INTEGER NOT NULL,
        thang INTEGER,
        chisodiencu INTEGER,
        chisodienmoi INTEGER,
        tongsodien INTEGER,
        tongtiendien INTEGER,
        chisonuoccu INTEGER,
        chisonuocmoi INTEGER,
        tongsonuoc INTEGER,
        tongtiennuoc INTEGER,
        tongtien INTEGER,
        trangthaithanhtoan BOOLEAN,
        ngaythanhtoan DATE,
        quanly_id INTEGER NOT NULL,
        PRIMARY KEY (id),
        KEY quanly (quanly_id), 
        KEY phong (phong_id)
    );

CREATE TABLE
    dangkyphong(
        id INTEGER NOT NULL,
        sinhvien_id INTEGER NOT NULL,
        phong_id INTEGER NOT NULL,
        ngaydangky DATE,
        trangthaidangky BOOLEAN,
        xacnhan BOOLEAN,
        PRIMARY KEY (id),
        KEY sinhvien (sinhvien_id),
        KEY phong (phong_id)
    );

INSERT INTO role VALUES ('1', 'Admin');

INSERT INTO role VALUES ('2', 'User');

INSERT INTO users VALUES ('1', 'admin@gmail.com', MD5('admin123123'), '1');



ALTER TABLE
    users MODIFY id INTEGER NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 3;
ALTER TABLE
    khoa MODIFY id INTEGER NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 6;
ALTER TABLE
    lop MODIFY id INTEGER NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 4;

ALTER TABLE
    role MODIFY id INTEGER NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 3;

ALTER TABLE
    dangkyphong MODIFY id INTEGER NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 1;


ALTER TABLE
    hoadondiennuoc MODIFY id INTEGER NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 1;

ALTER TABLE
    hopdongktx MODIFY id INTEGER NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 1;

ALTER TABLE
    phong MODIFY id INTEGER NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 1;

ALTER TABLE
    quanly MODIFY id INTEGER NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 1;

ALTER TABLE
    sinhvien MODIFY id INTEGER NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 1;

ALTER TABLE
    thannhan MODIFY id INTEGER NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 1;