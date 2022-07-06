DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS jawaban;
DROP TABLE IF EXISTS jabatan;


CREATE TABLE `2540699_pencucianmaster`.`user` (
`id_user` VARCHAR(16) NOT NULL PRIMARY KEY,
`nama` VARCHAR(50) NOT NULL,
`password` VARCHAR(30) NOT NULL,
`id_jabatan` INT NOT NULL);

CREATE TABLE `2540699_pencucianmaster`. `jawaban` (
`id_pertanyaan` INT(3) AUTO_INCREMENT NOT NULL PRIMARY KEY,
`id_user` VARCHAR(16) NOT NULL,
`q_1` VARCHAR(150) NOT NULL,
`j_1` VARCHAR(25) NOT NULL,
`q_2` VARCHAR(150) NOT NULL,
`j_2` VARCHAR(25) NOT NULL);

CREATE TABLE `2540699_pencucianmaster`.`jabatan` (
`id_jabatan` INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
`nama_jabatan` VARCHAR(45) NOT NULL DEFAULT 25);

ALTER TABLE user ADD CONSTRAINT user_id_jabatan_jabatan_id_jabatan FOREIGN KEY (id_jabatan) REFERENCES jabatan(id_jabatan);
ALTER TABLE jawaban ADD CONSTRAINT jawaban_id_user_user_id_user FOREIGN KEY (id_user) REFERENCES user(id_user);